
<?php

//appel de la bdd
$bdd = new PDO('mysql:host=176.191.21.84:3307/;dbname=money_lord; charset=utf8', 'user', 'Moneylord1*');
include('functionCache.php');

function createAccount($bdd)
{ // creation de compte

    $stat = stat('C:\wamp64\www\GitHub\moneylord\Projet s2');

    $ip = $_SERVER['REMOTE_ADDR'];
    $dateToday = date("Y-m-d");

    if ($_POST['password'] != null) {
        $_SESSION['password'] = $_POST['password'];
    }
    // on evite les surprise avec htmlspecialchars

    if ($_POST['pseudo']) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
    }
    if ($_POST['email']) {
        $email = htmlspecialchars($_POST['email']);
    }
    if ($_POST['lastName']) {
        $nom = htmlspecialchars($_POST['lastName']);
    }
    if ($_POST['firstName']) {
        $prenom = htmlspecialchars($_POST['firstName']);
    }
    if ($_POST['age']) {
        $age = htmlspecialchars($_POST['age']);
    }
    if ($_POST['password']) {
        $mdp = $_SESSION['password'];
    }

    //on les rentre dans la bdd


    $file = fopen("./keyOf.txt", "r");
    $key = fread($file, filesize('keyOf.txt'));
    fclose($file);

    $data4 = $bdd->prepare('INSERT INTO Clients(Nom,Prenom,Pseudo,MotDePasse,Solde,Avatar,DateInscription,Email,Age)
							VALUES (:nom,:prenom,:pseudo, AES_ENCRYPT(:mdp, :keyOf), 0,0,:dateToday,:email,:age)');
    $data4->bindValue(':keyOf', $key, PDO::PARAM_STR);
    $data4->bindValue(':nom', $nom, PDO::PARAM_STR);
    $data4->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $data4->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $data4->bindValue(':mdp', $mdp, PDO::PARAM_STR);
    $data4->bindValue(':dateToday', $dateToday, PDO::PARAM_STR);
    $data4->bindValue(':email', $email, PDO::PARAM_STR);
    $data4->bindValue(':age', $age, PDO::PARAM_STR);
    $data4->execute();

    // on recupere son ID pour la creation de la ligne du client dans les Statistiques
    $data1 = $bdd->query('SELECT ID FROM Clients WHERE Pseudo= \''.$_POST['pseudo'].'\'');
    $save = $data1->fetch();
    $idClients = $save['ID'];

    $data2 = $bdd->prepare('INSERT INTO Statistiques VALUES (NULL,0,0,0,0,:idclients)');
    $data2->bindValue(':idclients', $idClients, PDO::PARAM_STR);
    $data2->execute();
}

function verification($bdd)
{ // ici on retourne les erreur, verifie si le client existe deja, et on lance al fonction de creation de compte

    $clientExists = false;

    if (!empty($_POST["pseudo"]) && !empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST["password"])) {
        $data = $bdd->query('SELECT Pseudo FROM Clients');
        while ($client = $data->fetch()) {
            if ($client['Pseudo'] == $_POST['pseudo']) {
                $clientExists = true;
            }
        }
        if ($clientExists == true) {
            return "Cette identifient existe déjà.";
        } else {
            createAccount($bdd);
            echo '<meta http-equiv="Refresh" content="0; URL=index.php" />';
        }
    } else {
        return 'Un ou plusieurs des champs nest pas rempli';
    }
}

function connection($bdd)
{
    $file = fopen("./keyOf.txt", "r");
    $key = fread($file, filesize('keyOf.txt'));
    fclose($file);

    if (!empty($_POST['login']) && !empty($_POST['password'])) { // on verifie si l'id existe et si le mdp correction a l'id
        $data = $bdd->prepare('SELECT ID, Pseudo, MotDePasse, AES_DECRYPT(MotDePasse, :keyOf) As MDP FROM Clients');
        $data->bindValue(':keyOf', $key, PDO::PARAM_STR);
        $data->execute();

        while ($client = $data->fetch()) {
            if ($client['Pseudo'] == $_POST['login'] && $client['MDP'] == $_SESSION['pass2']) {
                $_SESSION['ID'] = htmlspecialchars($_POST['login']);
                $_SESSION['ID'] = $client['ID'];
                $_SESSION['pseudo'] = $client['Pseudo'];
                $_SESSION['pass2'] = htmlspecialchars($_POST['password']);

                echo '<meta http-equiv="Refresh" content="0; URL=home.php" />';
                return ' ';
            }
        }
    }
    return 'identifiant ou mot-de-passe incorrect';
}

function displayUserAccount($bdd)
{
    if (!empty($_POST['userAccount'])) {
        $userAccount = htmlspecialchars($_POST['userAccount']);
    } else {
        $userAccount = false;
    }
    $req = $bdd->query('SELECT * FROM Clients');
    while ($checkAccount = $req->fetch()) {
        if ($_SESSION['ID'] == $checkAccount['pseudo'] && $_SESSION['password'] == $checkAccount['password']) { // Vérif correspondance entre compte client et client connecté

            echo '<div><p>Pseudo : '.$checkAccount['Pseudo'].'</p>
					<p>Nom : '.$checkAccount['Nom'].'</p>
					<p>Prénom : '.$checkAccount['Prenom'].'</p></div>';
        }
    }
}

function displayChat($bdd)
{
    $displayMessage = $bdd->query('SELECT * FROM Chat ORDER BY Message desc');

    while ($message = $displayMessage->fetch()) {
        echo ''.$message['Pseudo'].' :'.$message['Message'].'';
    }
}

function changeData($bdd)
{
    $file = fopen("./keyOf.txt", "r");
    $key = fread($file, filesize('keyOf.txt'));
    fclose($file);
    // on prepare la requete pour les modification
    $data = $bdd->prepare('UPDATE Clients SET Pseudo=:pseudo, Nom=:nom, Prenom=:prenom, MotDePasse=AES_ENCRYPT(:mdp, :keyOf), WHERE ID=\''.$_SESSION['ID'].'\'');
    $data->bindValue(':keyOf', $key, PDO::PARAM_STR);
    $data->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $data->bindValue(':nom', $_POST['lastName'], PDO::PARAM_STR);
    $data->bindValue(':prenom', $_POST['firstName'], PDO::PARAM_STR);
    $data->bindValue(':mdp', $_POST['password'], PDO::PARAM_STR);

    $ExecuteIsOk = $data->execute();
    // on prepare l'upload de l'image et selectionnant son chemin, la taille maximal, et le format qu'il peut importer
    $target = './ImagesClients/';
    $maxSize = 22097152;
    $tabExt = array('jpg','gif','png','jpeg');// Extensions autorisees
    // verification de l'existance du fichier ou l'on copie l'image
    if (!is_dir($target)) {
        if (!mkdir($target, 0755)) {
            exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
        }
    }

    if (!empty($_POST)) {
        // On verifie si le champ est rempli
        if (!empty($_FILES['fichier']['name'])) {
            // Recuperation de l'extension du fichier
            $extension  = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);

            // On verifie l'extension du fichier
            if (in_array(strtolower($extension), $tabExt)) {

                // On verifie la taille de l'image
                if ((filesize($_FILES['fichier']['tmp_name']) <= $maxSize)) {
                    // Parcours du tableau d'erreurs
                    if (isset($_FILES['fichier']['error']) && UPLOAD_ERR_OK === $_FILES['fichier']['error']) {
                        // On renomme le fichier
                        $nomImage = $_SESSION['ID'].'.'. $extension;

                        // Si c'est OK, on teste l'upload
                        if (move_uploaded_file($_FILES['fichier']['tmp_name'], $target.$nomImage)) {
                            $message = 'Upload réussi !';
                            $updateAvatar = $bdd->prepare('UPDATE Clients SET Avatar = :avatar WHERE ID = :ID');
                            // echo $_SESSION['ID'].".".$extensionsUpload;
                            $updateAvatar->bindParam(':avatar', $nomImage, PDO::PARAM_STR);
                            $updateAvatar->bindParam(':ID', $_SESSION['ID'], PDO::PARAM_STR);
                            $updateAvatar->execute();
                            echo '<meta http-equiv="Refresh" content="0; URL=account.php" />';
                        } else {
                            // Sinon on affiche une erreur systeme
                            $message = 'Problème lors de l\'upload !';
                        }
                    } else {
                        $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
                    }
                } else {  // Sinon erreur sur les dimensions et taille de l'image
                    $message = 'Erreur dans les dimensions de l\'image !';
                }
            } else {
                // Sinon on affiche une erreur pour l'extension
                $message = 'L\'extension du fichier est incorrecte !';
            }
        } else {
            // Sinon on affiche une erreur pour le champ vide
            $message = 'Veuillez remplir le formulaire svp !';
        }
        return $message;
    }
}

function printAvatar($bdd)
{
    //on affiche l'avatar si il en un sinon on affiche l'avatar par defaut
    $req=$bdd->query('SELECT * FROM Clients WHERE ID=\''.$_SESSION['ID'].'\'');
    $verif = $req->fetch();
    if ($verif['Avatar'] == '0') {
        return 'anonyme.jpg';
    } else {
        return $verif['Avatar'];
    }
}

function statClient($bdd)
{
    $data = $bdd->query('SELECT c.Solde solde,stats.TotalBet bet,
							stats.TotalBetRoulette roulette, stats.TotalBetCoinFlip flip,
							stats.TotalBetCouleur couleur, c.Nom nom, c.Prenom prenom, c.Pseudo pseudo
							FROM Statistiques AS stats
							INNER JOIN Clients AS c
							ON stats.Clients_ID = c.ID
							WHERE c.ID= \''.$_SESSION['ID'].'\''); // on recupere les données que lon souhaite dans les deux tables

    $afficher = $data->fetch();
    $max = max($afficher['flip'], $afficher['roulette'], $afficher['couleur']); // on cherche le nom du plus grand des trois sans se soucier d'une egalité quelquonque
    if ($max == $afficher['flip']) {
        $max = 'Coinflip';
    }
    if ($max == $afficher['roulette']) {
        $max = 'Roulette';
    }
    if ($max == $afficher['couleur']) {
        $max = 'Couleur';
    }

    echo ' <center>

			<p> Bienvenue <em class="yellow">'.$afficher['nom'].' '.$afficher['prenom'].'</em></p>
			<p> Votre pseudo est <em class="yellow">'.$afficher['pseudo'].'</em></p> <br> <br>

			<div class="lev2">
				<div class="graphjeu"> <canvas id="myChart"></canvas> </div>
				<div class="statgraphjeu">';
    if ($afficher['flip'] != 0 || $afficher['roulette'] != 0 ||$afficher['couleur'] != 0) {
        echo 'Le jeu le plus joué est <em class="yellow">'.$max.'</em>';
    }
    echo '</div>
			</div>
			<br>
			<p> Vous avez misé au TOTAL : <em class="yellow">'.$afficher['bet'].' </em>€ </p><br><br>
			</center>'; ?>

			<script>
				var ctx = document.getElementById('myChart').getContext('2d');
				var chart = new Chart(ctx, {
						type: 'doughnut',
						data: {
								labels: ['Coinflip', 'Couleurs', 'Roulette'],
								datasets: [{
									backgroundColor: ['#B5B6B6','#ffea00','#4a4949'],
									data: [<?php echo $afficher['flip']; ?>, <?php echo $afficher['couleur']; ?>, <?php echo $afficher['roulette']; ?>]
								}]
						},
						options: {}
				});

			</script>
			<?php
}

function addcoin($bdd)
{
    //Recupération du solde
    $recupSolde = $bdd->query('SELECT * FROM Clients WHERE ID=\''.$_SESSION['ID'].'\'');
    $recupSolde = $recupSolde->fetch();
    //preparation du nouveau solde.
    $nouveauSolde = ($recupSolde['Solde']+$_POST['addcoin']);
    // on réinjecte le nouveau solde dans la bdd
    $modifSolde = $bdd->prepare('UPDATE Clients SET Solde =:solde  WHERE ID=\''.$_SESSION['ID'].'\'');
    $modifSolde->bindParam(':solde', $nouveauSolde, PDO::PARAM_INT);
    $modifSolde = $modifSolde->execute();
    header('Location: home.php');
}



function coinflip($bdd)
{
    $coin = random_int(1, 2);

    if ($coin == 1) {
        echo "Tails";
    } else {
        echo "Heads";
    }


    /*$server_seed = "96f3ea4d221ca1b2048cc3b3b844e479f2bd9c80a870628072ee98fd1aa83cd0";
    $public_seed = "460679512935";

    for($round = 0;$round < 10;$round++) {
        $hash = hash('sha256', $server_seed . "-" . $public_seed . "-" . $round);
        if (hexdec(substr($hash, 0, 8)) % 2) {
            echo 'heads', PHP_EOL;
        } else {
            echo 'tails', PHP_EOL;
        }
    }*/
}



function chat($bdd){
    echo '<div class="chat"><div class="messagesborder">';

    echo '<iframe src=Function/fuctionMessage.php width=100% height=100%; scrolling="yes"></iframe>';

    echo'</div>';
    echo '<div class="messageChat"><iframe src=Function/functionMessageEnvoyer.php width=100% height=100% frameBorder="0"; scrolling="yes"></iframe></div>';



    echo '</div>'; ?>
	<script>
		setInterval('load_messages()',500);
		function load_messages(){
			$('.messages').load('Function/Message.php');
		}
	</script>

<?php

    $data2 = $bdd->query('SELECT COUNT(ID) FROM Chat '); // suppression des messages quand il y en a plus de 100 dans la bdd
    $donnees = $data2->fetch();

    if ($donnees['COUNT(ID)'] > 100) {
        $firstId = $bdd->query('SELECT * FROM Chat ORDER BY ID LIMIT 1');
        $firstId = $firstId->fetch();
        echo 'premiere ID '.$firstId['ID'];
        for ($i=$firstId['ID']; $i < ($firstId['ID']+30); $i++) { // on en supprime 30 pour redescendre a 70 messages pour toujours garder un historique de quelques messages

            $data3 = $bdd->prepare('DELETE FROM Chat WHERE ID= :i');
            $data3->bindParam(':i', $i, PDO::PARAM_STR);
            $data3->execute();
        }
    }
}


function angleRoulette($bdd)
{
    $data2 = $bdd->query('SELECT nbalea AS nb FROM aleatoire WHERE id = 0'); // suppression des messages quand il y en a plus de 100 dans la bdd
    $donnees = $data2->fetch();
    $save = $donnees['nb'];

    $data2 = $bdd->query('SELECT nbalea AS nb, id FROM aleatoire WHERE id >= 1'); // suppression des messages quand il y en a plus de 100 dans la bdd
    while ($donnees = $data2->fetch()) {
        if ($save == $donnees['nb']) {
            $tirage =  $donnees['id'];
        }
    }

    if ($tirage == 1) {
        echo rand(1, 23);
    }
    if ($tirage == 2) {
        echo rand(25, 47);
    }
    if ($tirage == 3) {
        echo rand(49, 71);
    }
    if ($tirage == 4) {
        echo rand(73, 95);
    }
    if ($tirage == 5) {
        echo rand(97, 119);
    }
    if ($tirage == 6) {
        echo rand(121, 143);
    }
    if ($tirage == 7) {
        echo rand(145, 167);
    }
    if ($tirage == 8) {
        echo rand(169, 192);
    }
    if ($tirage == 9) {
        echo rand(194, 215);
    }
    if ($tirage == 10) {
        echo rand(217, 239);
    }
    if ($tirage == 11) {
        echo rand(241, 261);
    }
    if ($tirage == 12) {
        echo rand(263, 287);
    }
    if ($tirage == 13) {
        echo rand(289, 311);
    }
    if ($tirage == 14) {
        echo rand(313, 335);
    }
    if ($tirage == 15) {
        echo rand(337, 359);
    }
}

function tirage($bdd)
{
    $data2 = $bdd->query('SELECT nbalea AS nb FROM aleatoire WHERE id = 0'); // suppression des messages quand il y en a plus de 100 dans la bdd
    $donnees = $data2->fetch();
    $save = $donnees['nb'];

    $data2 = $bdd->query('SELECT nbalea AS nb, id FROM aleatoire WHERE id >= 1'); // suppression des messages quand il y en a plus de 100 dans la bdd
    while ($donnees = $data2->fetch()) {
        if ($save == $donnees['nb']) {
            $tirage =  $donnees['id'];
        }
    }

    return $tirage;

}
function WinRoulette($bdd)
{
    $CoinWin = 0;

    if (CouleurReturn($bdd) == 'black') {
        $dataBlack = $bdd->query('SELECT * FROM RoulletteBlack WHERE IDClient = \''.$_SESSION['ID'].'\' ');
        $data1 = $dataBlack->fetch();
        if ($data1['IDClient'] != null) {
            $CoinWin = $CoinWin + $data1['Mise'] * 2;
        }
    } elseif (CouleurReturn($bdd) == 'red') {
        $dataRed = $bdd->query('SELECT * FROM RouletteRed WHERE IDClient=\''.$_SESSION['ID'].'\' ');
        $data = $dataRed->fetch();
        if ($data['IDClient'] != null) {
            $CoinWin = $CoinWin + $data['Mise'] * 2;
        }
    } elseif (CouleurReturn($bdd) == 'Ml') {
        $dataMl = $bdd->query('SELECT * FROM RouletteMl WHERE IDClient=\''.$_SESSION['ID'].'\' ');
        $data = $dataMl->fetch();
        if ($data['IDClient'] != null) {
            $CoinWin = $CoinWin + $data['Mise'] * 10;
        }
    }
    $dataC = $bdd->query('SELECT Solde FROM Clients WHERE ID =\''.$_SESSION['ID'].'\' ');
    $dataCF = $dataC->fetch();
    $solde = $dataCF['Solde'];
    $finalSolde = $solde + $CoinWin;
    $data = $bdd->prepare('UPDATE Clients SET Solde=:Solde  WHERE ID=\''.$_SESSION['ID'].'\'');
    $data->bindValue(':Solde', $finalSolde, PDO::PARAM_STR);
    $data->execute();
}

function amountBet($bdd)
{

    if (!isset($_POST['betRoulette'])) {
        echo '0';
        $_SESSION['betRoulette'] = 0;
    } elseif (!empty($_POST['betRoulette'])) {
        $data1=$bdd->query('SELECT Solde FROM Clients WHERE ID =\''.$_SESSION['ID'].'\' ');
        $dataCF = $data1->fetch();
        $solde = $dataCF['Solde'];

        if ($_POST['betRoulette'] == "Clear") {
            $_SESSION['betRoulette'] = 0;
        } elseif ($_POST['betRoulette'] == "total") {
            $_SESSION['betRoulette'] = $solde;
        } else {
            $_SESSION['betRoulette'] = $_SESSION['betRoulette'] + $_POST['betRoulette'];
        }

        echo $_SESSION['betRoulette'];
    }
}

function betColor($bdd){

  // FAIRE UN INNER POUR LES DEUX APPELLE SI DESSOUS

    $data1=$bdd->query('SELECT Solde FROM Clients WHERE ID =\''.$_SESSION['ID'].'\' ');
    $dataCF = $data1->fetch();
    $solde = $dataCF['Solde'];

    $data1=$bdd->query('SELECT TotalBet FROM Statistiques WHERE Clients_ID =\''.$_SESSION['ID'].'\' ');
    $dataCF = $data1->fetch();
    $TotalBet = $dataCF['TotalBet'];

    if ($_SESSION['betRoulette'] > $solde) {
        return 'Fond insufisant';
    } else {

        if (!empty($_POST['betRed'])) {
            $data = $bdd ->prepare('INSERT INTO RouletteRed
  								VALUES (Null,:idClient,:mise)');
            $mise = $_SESSION['betRoulette'];
            $data->bindValue(':idClient', $_SESSION['ID'], PDO::PARAM_INT);
            $data->bindValue(':mise', $mise, PDO::PARAM_STR);
            $data->execute();


            $data = $bdd ->prepare('UPDATE Statistiques SET TotalBet=:TotalBet  WHERE Clients_ID=\''.$_SESSION['ID'].'\'');
            $totalbeltfinal = $TotalBet+$_SESSION['betRoulette'];
            $data->bindValue(':TotalBet', $totalbeltfinal, PDO::PARAM_INT);
            $data->execute();

            $dataC = $bdd->query('SELECT TotalBetRoulette FROM Statistiques WHERE Clients_ID =\''.$_SESSION['ID'].'\' ');
            $dataCF = $dataC->fetch();
            $TotalBetRoulette = $dataCF['TotalBetRoulette'];
            $finalbelt = $TotalBetRoulette + 1;
            $data = $bdd->prepare('UPDATE Statistiques SET TotalBetRoulette=:TotalBetRoulette  WHERE Clients_ID=\''.$_SESSION['ID'].'\'');
            $data->bindValue(':TotalBetRoulette', $finalbelt, PDO::PARAM_STR);
            $data->execute();

            $newBalance = $solde-$_SESSION['betRoulette'];

            $data=$bdd->prepare('UPDATE Clients SET Solde=:Solde  WHERE ID=\''.$_SESSION['ID'].'\'');
            $data->bindValue(':Solde', $newBalance, PDO::PARAM_STR);
            $data->execute();

        } elseif (!empty($_POST['betBlack'])) {
            $data = $bdd ->prepare('INSERT INTO RoulletteBlack
  								VALUES (Null,:idClient,:mise)');
            $data->bindValue(':idClient', $_SESSION['ID'], PDO::PARAM_INT);
            $data->bindValue(':mise', $_SESSION['betRoulette'], PDO::PARAM_STR);
            $data->execute();

            $data = $bdd ->prepare('UPDATE Statistiques SET TotalBet=:TotalBet  WHERE Clients_ID=\''.$_SESSION['ID'].'\'');
            $totalbeltfinal = $TotalBet+$_SESSION['betRoulette'];
            $data->bindValue(':TotalBet', $totalbeltfinal, PDO::PARAM_INT);
            $data->execute();

            $dataC = $bdd->query('SELECT TotalBetRoulette FROM Statistiques WHERE Clients_ID =\''.$_SESSION['ID'].'\' ');
            $dataCF = $dataC->fetch();
            $TotalBetRoulette = $dataCF['TotalBetRoulette'];
            $finalbelt = $TotalBetRoulette + 1;
            $data = $bdd->prepare('UPDATE Statistiques SET TotalBetRoulette=:TotalBetRoulette  WHERE Clients_ID=\''.$_SESSION['ID'].'\'');
            $data->bindValue(':TotalBetRoulette', $finalbelt, PDO::PARAM_STR);
            $data->execute();

            $newBalance = $solde-$_SESSION['betRoulette'];

            $data=$bdd->prepare('UPDATE Clients SET Solde=:Solde  WHERE ID=\''.$_SESSION['ID'].'\'');
            $data->bindValue(':Solde', $newBalance, PDO::PARAM_STR);
            $data->execute();
        } elseif (!empty($_POST['betMl'])) {
            $data = $bdd ->prepare('INSERT INTO RouletteMl
  								VALUES (Null,:idClient,:mise)');
            $data->bindValue(':idClient', $_SESSION['ID'], PDO::PARAM_INT);
            $data->bindValue(':mise', $_SESSION['betRoulette'], PDO::PARAM_STR);
            $data->execute();

            $data = $bdd ->prepare('UPDATE Statistiques SET TotalBet=:TotalBet  WHERE Clients_ID=\''.$_SESSION['ID'].'\'');
            $totalbeltfinal = $TotalBet+$_SESSION['betRoulette'];
            $data->bindValue(':TotalBet', $totalbeltfinal, PDO::PARAM_INT);
            $data->execute();

            $dataC = $bdd->query('SELECT TotalBetRoulette FROM Statistiques WHERE Clients_ID =\''.$_SESSION['ID'].'\' ');
            $dataCF = $dataC->fetch();
            $TotalBetRoulette = $dataCF['TotalBetRoulette'];
            $finalbelt = $TotalBetRoulette + 1;
            $data = $bdd->prepare('UPDATE Statistiques SET TotalBetRoulette=:TotalBetRoulette  WHERE Clients_ID=\''.$_SESSION['ID'].'\'');
            $data->bindValue(':TotalBetRoulette', $finalbelt, PDO::PARAM_STR);
            $data->execute();

            $newBalance = $solde-$_SESSION['betRoulette'];

            $data=$bdd->prepare('UPDATE Clients SET Solde=:Solde  WHERE ID=\''.$_SESSION['ID'].'\'');
            $data->bindValue(':Solde', $newBalance, PDO::PARAM_STR);
            $data->execute();
        }
    }
}

function CouleurReturn($bdd)
{
    $data2 = $bdd->query('SELECT nbalea AS nb FROM aleatoire WHERE id = 0');
    $donnees = $data2->fetch();
    $save = $donnees['nb'];

    $data2 = $bdd->query('SELECT nbalea AS nb, id FROM aleatoire WHERE id >= 1');
    while ($donnees = $data2->fetch()) {
        if ($save == $donnees['nb']) {
            $tirage =  $donnees['id'];
        }
    }
    for ($i = 1; $i <14; $i=$i+2) {
        if ($tirage == $i) {
            return 'black';
        }
    }
    for ($i = 2; $i <15; $i=$i+2) {
        if ($tirage == $i) {
            return 'red';
        }
    }
    return 'Ml';
}

function Rblack($bdd)
{
    echo'<div class="messagesBlack">';

    $data1 = $bdd->query('SELECT c.Pseudo pseudo, rb.Mise mise FROM Clients AS c
    INNER JOIN  RoulletteBlack AS rb ON rb.IDClient = c.ID ');

    while ($save = $data1 ->fetch()) {
        echo '<p>'.$save['pseudo'].' : '.$save['mise'].'</p>';
    }
    echo'</div>'; ?>

    <script>
        setInterval('load_messagesBlack()',500);
        function load_messagesBlack(){
            $('.messagesBlack').load('./Function/rouletteblack.php');
        }
    </script>

<?php
}

function RRed($bdd)
{
    echo'<div class="messagesRed">';

    $data1 = $bdd->query('SELECT c.Pseudo pseudo, rb.Mise mise FROM Clients AS c
    INNER JOIN  RouletteRed AS rb ON rb.IDClient = c.ID ');

    while ($save = $data1 ->fetch()) {
        echo '<p>'.$save['pseudo'].' : '.$save['mise'].'</p>';
    }
    echo'</div>'; ?>

    <script>
        setInterval('load_messagesRed()',500);
        function load_messagesRed(){
            $('.messagesRed').load('./Function/roulettered.php');
        }
    </script>

<?php
}

function RMl($bdd)
{
    echo'<div class="messagesMl">';

    $data1 = $bdd->query('SELECT c.Pseudo pseudo, rb.Mise mise FROM Clients AS c
    INNER JOIN  RouletteMl AS rb ON rb.IDClient = c.ID ');

    while ($save = $data1 ->fetch()) {
        echo '<p>'.$save['pseudo'].' : '.$save['mise'].'</p>';
    }
    echo'</div>'; ?>

    <script>
        setInterval('load_messagesMl()',500);
        function load_messagesMl(){
            $('.messagesMl').load('./Function/rouletteml.php');
        }
    </script>

<?php
}
function displayBalance($bdd)
{
    echo '<div class="balanceload">';
    $displayBalance = $bdd->query('SELECT Solde FROM Clients WHERE ID=\''.$_SESSION['ID'].'\' ');
    $display = $displayBalance->fetch();
    echo '<a href="AddCoins.php">Solde : '.$display["Solde"].'</a>';
    echo '</div>'; ?>
    <script>
  		setInterval('load_balance()',500);
  		function load_balance(){
  			$('.balanceload').load('Function/Balance.php');
  		}
  	</script>
    <?php
}

function resetColor($bdd){

    $_SESSION['resultColor1'] = 0;
    $_SESSION['resultColor2'] = 0;
    $_SESSION['resultColor3'] = 0;
    $_SESSION['resultColor4'] = 0;
    $_SESSION['resultColor5'] = 0;
    $_SESSION['resultColor6'] = 0;

    $recupSolde = $bdd->query('SELECT Solde FROM Clients WHERE ID =\''.$_SESSION['ID'].'\' ');
    $recupSolde1 = $recupSolde->fetch();
    $solde = $recupSolde1['Solde'];

    if ($_SESSION['ColorMise'] > $solde) {

        return 'Fond insufisant';
    } else {

        $finalSolde = $solde - $_SESSION['ColorMise'];
        $data = $bdd->prepare('UPDATE Clients SET Solde=:Solde  WHERE ID=\''.$_SESSION['ID'].'\'');
        $data->bindValue(':Solde', $finalSolde, PDO::PARAM_STR);
        $data->execute();

        echo '<meta http-equiv="Refresh" content="0; URL=colorChose.php" />';
    }
}

function setColor($bdd){
    $resultColor1 = rand(1,6);
    $resultColor2 = rand(1,6);
    $resultColor3 = rand(1,6);
    $resultColor4 = rand(1,6);
    $resultColor5 = rand(1,6);
    $resultColor6 = rand(1,6);

    $multiple = 0;
    $_SESSION['StatistiquesBetClient'] = $_SESSION['ColorMise'];
    for ($i=1; $i < 7; $i++) {
        if ($_SESSION['playerColor'] == ${'resultColor'.$i}) {
            $multiple++;
            if ($multiple > 1) {
                $_SESSION['ColorMise'] = 2 * $_SESSION['ColorMise'];
            }
        }

    }
    if ($multiple == 0 ) {
      $_SESSION['ColorMise'] = 0;
    }

    $dataC = $bdd->query('SELECT Solde FROM Clients WHERE ID =\''.$_SESSION['ID'].'\' ');
    $dataCF = $dataC->fetch();
    $solde = $dataCF['Solde'];

    $finalSolde = $solde + $_SESSION['ColorMise'];

    $data = $bdd->prepare('UPDATE Clients SET Solde=:Solde  WHERE ID=\''.$_SESSION['ID'].'\'');
    $data->bindValue(':Solde', $finalSolde, PDO::PARAM_STR);
    $data->execute();

    // Incrémentation du solde de la mise total du joueur sur MoneyLord

    $data1=$bdd->query('SELECT TotalBet FROM Statistiques WHERE Clients_ID =\''.$_SESSION['ID'].'\' ');
    $dataCF = $data1->fetch();
    $TotalBet = $dataCF['TotalBet'];

    $data = $bdd ->prepare('UPDATE Statistiques SET TotalBet=:TotalBet  WHERE Clients_ID=\''.$_SESSION['ID'].'\'');

    $totalbetfinal = $TotalBet + $_SESSION['StatistiquesBetClient'];

    $data->bindValue(':TotalBet', $totalbetfinal, PDO::PARAM_INT);
    $data->execute();

    // incrémentation nombre de fois que le joueur à joué au jeu des couleurs

    $dataC = $bdd->query('SELECT TotalBetCouleur FROM Statistiques WHERE Clients_ID =\''.$_SESSION['ID'].'\' ');
    $dataCF = $dataC->fetch();
    $TotalBetCouleur = $dataCF['TotalBetCouleur'];
    $finalbelt = $TotalBetCouleur + 1;
    $data = $bdd->prepare('UPDATE Statistiques SET TotalBetCouleur=:TotalBetCouleur  WHERE Clients_ID=\''.$_SESSION['ID'].'\'');
    $data->bindValue(':TotalBetCouleur', $finalbelt, PDO::PARAM_STR);
    $data->execute();

    $_SESSION['resultColor1'] = $resultColor1;
    $_SESSION['resultColor2'] = $resultColor2;
    $_SESSION['resultColor3'] = $resultColor3;
    $_SESSION['resultColor4'] = $resultColor4;
    $_SESSION['resultColor5'] = $resultColor5;
    $_SESSION['resultColor6'] = $resultColor6;
}

function calcDegColorGame($num){
  if ($num == 1) {
    return rand(0,56);
  }
  if ($num == 2) {
    return rand(58,114);
  }
  if ($num == 3) {
    return rand(119,175);
  }
  if ($num == 4) {
    return rand(181,235);
  }
  if ($num == 5) {
    return rand(241,295);
  }
  if ($num == 6) {
    return rand(301,355);
  }
}

function coinFlipBet($bdd){

    $recupSolde = $bdd->query('SELECT Solde FROM Clients WHERE ID =\''.$_SESSION['ID'].'\' ');
    $recupSolde1 = $recupSolde->fetch();
    $solde = $recupSolde1['Solde'];

    if ($_SESSION['CoinFlipMise'] > $solde) {

        return 'Fond insufisant';
    }  else{

        $finalSolde = $solde - $_SESSION['CoinFlipMise'];
        $data = $bdd->prepare('UPDATE Clients SET Solde=:Solde  WHERE ID=\''.$_SESSION['ID'].'\'');
        $data->bindValue(':Solde', $finalSolde, PDO::PARAM_STR);
        $data->execute();

        echo '<meta http-equiv="Refresh" content="0; URL=coinflipSide.php" />';
    }
}
function coinFlipSideChoice($bdd){


    if (!empty($_SESSION['sideChoice'])) {

        return 'Veuillez choisir un côté';
    }  else{

        $finalSolde = $solde - $_SESSION['CoinFlipMise'];
        $data = $bdd->prepare('UPDATE Clients SET Solde=:Solde  WHERE ID=\''.$_SESSION['ID'].'\'');
        $data->bindValue(':Solde', $finalSolde, PDO::PARAM_STR);
        $data->execute();

        echo '<meta http-equiv="Refresh" content="0; URL=coinflipSide.php" />';
    }
}

function coinFlipResult($bdd){

    $multiple = 0;
    $_SESSION['StatistiquesBetClient'] = $_SESSION['ColorMise'];
    for ($i=1; $i < 7; $i++) {
        if ($_SESSION['playerColor'] == ${'resultColor'.$i}) {
            $multiple++;
            if ($multiple > 1) {
                $_SESSION['ColorMise'] = 2 * $_SESSION['ColorMise'];
            }
        }

    }
    if ($multiple == 0 ) {
      $_SESSION['ColorMise'] = 0;
    }

    $dataC = $bdd->query('SELECT Solde FROM Clients WHERE ID =\''.$_SESSION['ID'].'\' ');
    $dataCF = $dataC->fetch();
    $solde = $dataCF['Solde'];

    $finalSolde = $solde + $_SESSION['ColorMise'];

    $data = $bdd->prepare('UPDATE Clients SET Solde=:Solde  WHERE ID=\''.$_SESSION['ID'].'\'');
    $data->bindValue(':Solde', $finalSolde, PDO::PARAM_STR);
    $data->execute();

    // Incrémentation du solde de la mise total du joueur sur MoneyLord

    $data1=$bdd->query('SELECT TotalBet FROM Statistiques WHERE Clients_ID =\''.$_SESSION['ID'].'\' ');
    $dataCF = $data1->fetch();
    $TotalBet = $dataCF['TotalBet'];

    $data = $bdd ->prepare('UPDATE Statistiques SET TotalBet=:TotalBet  WHERE Clients_ID=\''.$_SESSION['ID'].'\'');

    $totalbetfinal = $TotalBet + $_SESSION['StatistiquesBetClient'];

    $data->bindValue(':TotalBet', $totalbetfinal, PDO::PARAM_INT);
    $data->execute();

    // incrémentation nombre de fois que le joueur à joué au jeu des couleurs

    $dataC = $bdd->query('SELECT TotalBetCouleur FROM Statistiques WHERE Clients_ID =\''.$_SESSION['ID'].'\' ');
    $dataCF = $dataC->fetch();
    $TotalBetCouleur = $dataCF['TotalBetCouleur'];
    $finalbelt = $TotalBetCouleur + 1;
    $data = $bdd->prepare('UPDATE Statistiques SET TotalBetCouleur=:TotalBetCouleur  WHERE Clients_ID=\''.$_SESSION['ID'].'\'');
    $data->bindValue(':TotalBetCouleur', $finalbelt, PDO::PARAM_STR);
    $data->execute();

}



?>
<!DOCTYPE html>
  <html>
      <head>
					<link rel="icon" type="image/png" href="Images/minilogo.png" />
			</header>
	</html>
