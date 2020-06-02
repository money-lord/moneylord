
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
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $nom = htmlspecialchars($_POST['lastName']);
    $prenom = htmlspecialchars($_POST['firstName']);
    $age = htmlspecialchars($_POST['age']);
    $mdp = $_SESSION['password'];
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
									label: 'My First dataset',
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

function displayBalance($bdd)
{
    // affichage du solde.
    $displayBalance = $bdd->query('SELECT Solde FROM Clients WHERE ID=\''.$_SESSION['ID'].'\' ');
    $display = $displayBalance->fetch();
    echo '<a href="AddCoins.php">Solde : '.$display["Solde"].'</a>';
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
    echo '<br><center><form action="" method ="POST">
		<input class="txtZone" type="text" name="Message" placeholder="Message" max="250" ><br><br>
		<button type="submit" value="Envoyer" class="button">Envoyer</button>
		</form></center>';

    if (!empty($_POST['Message'])) { //ajout de nouveaux messages dans la bdd
        $data2 = $bdd->prepare('INSERT INTO Chat VALUES (NULL,:ID,:Message)');
        $data2->bindValue(':ID', $_SESSION['ID'], PDO::PARAM_STR);
        $data2->bindValue(':Message', $_POST['Message'], PDO::PARAM_STR);
        $data2->execute();
    }

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

function angleRoulette($bdd){

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
function WinRoulette($bdd){
    $CoinWin = 0;

    if(CouleurReturn($bdd) == 'black'){
        $dataBlack = $bdd->prepare('SELECT ID, IDClient, Mise FROM RouletteBlack WHERE ID=\''.$_SESSION['ID'].'\' ');
        $data1 = $dataBlack->fetch();
        if($data1['ID'] != NULL){
            $CoinWin = $CoinWin + $data1['Mise'] * 2;
        }
    }
    if(CouleurReturn($bdd) == 'red'){
        $dataRed = $bdd->prepare('SELECT ID, IDClient, Mise FROM RouletteRed WHERE ID=\''.$_SESSION['ID'].'\' ');
        $data = $dataRed->fetch();
        if($data['ID'] != NULL){
            $CoinWin = $CoinWin + $data['Mise'] * 2;
        }
    }
    if(CouleurReturn($bdd) == 'Ml'){
        $dataMl = $bdd->prepare('SELECT ID, IDClient, Mise FROM RouletteMl WHERE ID=\''.$_SESSION['ID'].'\' ');
        $data = $dataMl->fetch();
        if($data['ID'] != NULL){
            $CoinWin = $CoinWin + $data['Mise'] * 10;
        }
    }
    $dataC = $bdd->prepare('SELECT Solde FROM CLients WHERE ID=\''.$_SESSION['ID'].'\' ');
    $dataCF = $dataC->fetch();
    $solde = $dataCF['Solde'];
    $finalSolde = $solde + $CoinWin;
    $data = $bdd->prepare('UPDATE Clients SET Solde=:Solde  WHERE ID=\''.$_SESSION['ID'].'\'');
    $data->bindValue(':Solde', $finalSolde, PDO::PARAM_STR);
}



function verifSolde($bdd){
    $recupSolde = $bdd->query('SELECT Solde FROM Clients WHERE ID=\''.$_SESSION['ID'].'\'');
    $Solde = $recupSolde->fetch();

    if ($_SESSION['betRoulette'] < $Solde) {
        return true;
    } elseif ($_SESSION['betRoulette'] > $Solde) {
       // echo "Vous ne disposez pas du solde suffisant, veuillez ajouter des fonds !";
        //echo "<a href="addcoins.php"></a>";
        return false;
    }
}

function amountBet(){
	if (!isset($_POST['betRoulette'])) {

		echo "0";
		$_SESSION['betRoulette'] = 0;
	} else if (!empty($_POST['betRoulette'])) {
		if ($_POST['betRoulette'] == 0) {
			$_SESSION['betRoulette'] = 0;
		} else {
			$_SESSION['betRoulette'] = $_SESSION['betRoulette'] + $_POST['betRoulette'];
		}

		echo $_SESSION['betRoulette'];
	}
}

function betColor($bdd){

	if (!empty($_POST['betRed'])) {

		$data = $bdd ->prepare('INSERT INTO RouletteRed
								VALUES (Null,:idClient,:mise)');
		$data->bindValue(':idClient', $_SESSION['ID'], PDO::PARAM_INT);
		$data->bindValue(':mise', $_SESSION['betRoulette'], PDO::PARAM_INT);
		$data->execute();

	} else if (!empty($_POST['betBlack'])) {

		$data = $bdd ->prepare('INSERT INTO RoulletteBlack 
								VALUES (Null,:idClient,:mise)');
		$data->bindValue(':idClient', $_SESSION['ID'], PDO::PARAM_INT);
		$data->bindValue(':mise', $_SESSION['betRoulette'], PDO::PARAM_INT);
		$data->execute();
	} else if (!empty($_POST['betMl'])) {

		$data = $bdd ->prepare('INSERT INTO RouletteMl
								VALUES (Null,:idClient,:mise)');
		$data->bindValue(':idClient', $_SESSION['ID'], PDO::PARAM_INT);
		$data->bindValue(':mise', $_SESSION['betRoulette'], PDO::PARAM_INT);
		$data->execute();
	}
}

function CouleurReturn($bdd){
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

?>
<!DOCTYPE html>
  <html>
      <head>
					<link rel="icon" type="image/png" href="Images/minilogo.png" />
			</header>
	</html>
