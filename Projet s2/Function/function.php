
<link rel="icon" type="image/png" href="Images/minilogo.png" />'

<?php


$bdd = new PDO('mysql:host=176.191.21.84:3307/;dbname=money_lord; charset=utf8', 'user', 'Moneylord1*');

function createAccount($bdd){

	if ($_POST['password'] != NULL){
		$_SESSION['password'] = md5($_POST['password']);
	}

	$pseudo = htmlspecialchars($_POST['pseudo']);
	$nom = htmlspecialchars($_POST['lastName']);
	$prenom = htmlspecialchars($_POST['firstName']);
	$mdp = $_SESSION['password'];

	$data4 = $bdd->query('INSERT INTO Clients(Nom,Prenom,Pseudo,MotDePasse,Solde,Avatar) VALUES (\''.$nom.'\',\''.$prenom.'\',\''.$pseudo.'\',\''.$mdp.'\', 0,0)');

	$data1 = $bdd->query('SELECT ID FROM Clients WHERE Pseudo= \''.$_POST['pseudo'].'\'');
	$save = $data1->fetch();
	$idClients = $save['ID'];

	$data2 = $bdd->prepare('INSERT INTO Statistiques VALUES (NULL,0,0,0,0,0,:idclients)');
	$data2->bindValue(':idclients', $idClients, PDO::PARAM_STR);
	$data2->execute();

}

function verification($bdd){

	$clientExists = false;

	if (!empty($_POST["pseudo"]) && !empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST["password"])){

		$data = $bdd->query('SELECT Pseudo FROM Clients');
		while($client = $data->fetch()){
			if ($client['Pseudo'] == $_POST['pseudo']) {
				$clientExists = true;
			}
		}
		if ($clientExists == true) {

			return "Cette identifient existe déjà.";

		}else{
			createAccount($bdd);
			echo '<meta http-equiv="Refresh" content="0; URL=index.php" />';
		}
	}
	else {
		return 'Un ou plusieurs des champs nest pas rempli';
	}
}

function connection($bdd){

	if (!empty($_POST['login']) && !empty($_POST['password'])){
		$data = $bdd->query('SELECT Pseudo, MotDePasse FROM Clients');

		while($client = $data->fetch()){
			if ($client['Pseudo'] == $_POST['login'] && $client['MotDePasse'] == $_SESSION['pass2']) {
				$_SESSION['pseudo'] = htmlspecialchars($_POST['login']);
				$_SESSION['pass2'] = htmlspecialchars($_POST['password']);
        echo '<meta http-equiv="Refresh" content="0; URL=home.php" />';
				return ' ';
			}
		}
	}
		return 'identifiant ou mot-de-passe incorrecte';
}

function displayUserAccount($bdd){

	if (!empty($_POST['userAccount'])) {
		$userAccount = htmlspecialchars($_POST['userAccount']);
	} else {
		$userAccount = false;
	}
	$req = $bdd->query('SELECT * FROM Clients');
	while ($checkAccount = $req->fetch()) {
		if ($_SESSION['pseudo'] == $checkAccount['pseudo'] && $_SESSION['password'] == $checkAccount['password']) { // Vérif correspondance entre compte client et client connecté

			echo '<div><p>Pseudo : '.$checkAccount['Pseudo'].'</p>
					<p>Nom : '.$checkAccount['Nom'].'</p>
					<p>Prénom : '.$checkAccount['Prenom'].'</p></div>';
		}
	}
}

function displayChat($bdd){

	$displayMessage = $bdd->query('SELECT * FROM Chat ORDER BY Message desc');

	while($message = $displayMessage->fetch()){
		echo ''.$message['Pseudo'].' :'.$message['Message'].'';
	}
}

function changeData($bdd){

	$password = md5($_POST['password']);

	$data = $bdd->prepare('UPDATE Clients SET Pseudo=:pseudo, Nom=:nom, Prenom=:prenom, MotDePasse=:password WHERE Pseudo=\''.$_SESSION['pseudo'].'\'');

	$data->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
	$data->bindValue(':nom', $_POST['lastName'], PDO::PARAM_STR);
	$data->bindValue(':prenom', $_POST['firstName'], PDO::PARAM_STR);
	$data->bindValue(':password', $password, PDO::PARAM_STR);

	$ExecuteIsOk = $data->execute();

	$target = './ImagesClients/';
	$maxSize = 22097152;
	$tabExt = array('jpg','gif','png','jpeg');// Extensions autorisees

	if( !is_dir($target) ) {
	  if( !mkdir($target, 0755) ) {
	    exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
	  }
	}

	if(!empty($_POST)){
	  // On verifie si le champ est rempli
	    if( !empty($_FILES['fichier']['name']) ){
		    // Recuperation de l'extension du fichier
		    $extension  = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);

		    // On verifie l'extension du fichier
		    if(in_array(strtolower($extension),$tabExt)) {

		        // On verifie la taille de l'image
		        if((filesize($_FILES['fichier']['tmp_name']) <= $maxSize)){
	            // Parcours du tableau d'erreurs
		            if(isset($_FILES['fichier']['error']) && UPLOAD_ERR_OK === $_FILES['fichier']['error']){
		            // On renomme le fichier
		            	$nomImage = $_SESSION['pseudo'].'.'. $extension;

			            // Si c'est OK, on teste l'upload
			            if(move_uploaded_file($_FILES['fichier']['tmp_name'], $target.$nomImage)){
			              	$message = 'Upload réussi !';
			              	$updateAvatar = $bdd->prepare('UPDATE Clients SET Avatar = :avatar WHERE Pseudo = :pseudo');
		                   	// echo $_SESSION['pseudo'].".".$extensionsUpload;
		                    $updateAvatar->bindParam(':avatar', $nomImage, PDO::PARAM_STR);
		                    $updateAvatar->bindParam(':pseudo', $_SESSION['pseudo'], PDO::PARAM_STR);
		                    $updateAvatar->execute();
			              	echo '<meta http-equiv="Refresh" content="0; URL=account.php" />';
			            } else {
			              // Sinon on affiche une erreur systeme
			              $message = 'Problème lors de l\'upload !';
			            }
					}else{
						$message = 'Une erreur interne a empêché l\'uplaod de l\'image';
					}
		        } else {  // Sinon erreur sur les dimensions et taille de l'image
		          $message = 'Erreur dans les dimensions de l\'image !';
		        }

		    }else {
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

function printAvatar($bdd){

	$req=$bdd->query('SELECT Avatar FROM Clients WHERE Pseudo=\''.$_SESSION['pseudo'].'\'');
	while ($verif = $req->fetch()){
		if($verif['Avatar'] == 0){
			return 'anonyme.jpg';
		}else {
			return $verif['Avatar'];
		}
	}
}

function statClient($bdd){
	$data = $bdd->query('SELECT stats.SoldeActuel solde,stats.TotalBet bet,
							stats.TotalBetRoulette roulette, stats.TotalBetCoinFlip flip,
							stats.TotalBetCouleur couleur, c.Nom nom, c.Prenom prenom, c.Pseudo pseudo
							FROM Statistiques AS stats
							INNER JOIN Clients AS c
							ON stats.Clients_ID = c.ID
							WHERE Pseudo= \''.$_SESSION["pseudo"].'\' ');

  $afficher = $data->fetch();
			$max = max($afficher['flip'],$afficher['roulette'],$afficher['couleur']);
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
					if ($afficher['flip'] != 0 || $afficher['roulette'] != 0 ||$afficher['couleur'] != 0 ) {
						echo 'Le jeu le plus jouer est <em class="yellow">'.$max.'</em>';
					}
	echo '</div>
			</div>
			<br>
			<p> Vous avez misé au TOTAL : <em class="yellow">'.$afficher['bet'].' </em>€ </p><br><br>
			</center>';?>

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

function addcoin($bdd){

	$recupSolde = $bdd->query('SELECT * FROM Clients WHERE Pseudo=\''.$_SESSION['pseudo'].'\'');
	$recupSolde = $recupSolde->fetch();

	$nouveauSolde = ($recupSolde['Solde']+$_POST['addcoin']);

	$modifSolde = $bdd->prepare('UPDATE Clients SET Solde =:solde  WHERE Pseudo=\''.$_SESSION['pseudo'].'\'');
	$modifSolde->bindParam(':solde', $nouveauSolde, PDO::PARAM_INT);
	$modifSolde = $modifSolde->execute();
	header('Location: home.php');
	//echo '<meta http-equiv="Refresh" content="0; URL=home.php" />';

}

function displayBalance($bdd){

	$displayBalance = $bdd->query('SELECT Solde FROM Clients WHERE Pseudo=\''.$_SESSION['pseudo'].'\'');
	$display = $displayBalance->fetch();
	echo '<a href="AddCoins.php">Solde : '.$display["Solde"].'</a>';
}

function chat($bdd){

	$data2 = $bdd->query('SELECT COUNT(ID) AS nbID FROM Chat '); // Début fonction pour supprimer les messages quand il y en a plus de 50 dans la bdd
	$donnees = $data2->fetch();

// reflexion sur le chat pour mardi 5 mai : Pour la suppression on compte avec COUNT(ID) Le nombre d'éléments dans la table chat, de supprimer chaque éléments se trouvant avant les 50 derniers messages

	if ($donnees['nbID'] > 10) {
		$i = 0;
		while ($data2->fetch()) {

			$data3 = $bdd->prepare('DELETE FROM CHAT WHERE ID= :i');
			$data3->bindParam(':i', $i, PDO::PARAM_STR);
			$data3->execute();
			$i++;
			if($i == 1){
				break;
			}
		}
	}

	$data2 = $bdd->query('SELECT COUNT(ID) FROM Chat ');
	echo '<div class="chat"><div class="messagesborder">';



	echo '  <iframe src=Function/fuctionMessage.php width=100% height=100%; scrolling="yes"></iframe>';


	echo'</div>';
	echo '<br><center><form action="" method ="POST">
		<input class="txtZone"type="text" name="Message" placeholder="Message" max="250" ><br><br>
		<button type="submit" value="Envoyer" class="button">Envoyer</button>
		</form></center>';
	if (!empty($_POST['Message'])) {
		$data2 = $bdd->prepare('INSERT INTO Chat VALUES (NULL,:Pseudo,:Message)');
		$data2->bindValue(':Pseudo', $_SESSION['pseudo'], PDO::PARAM_STR);
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
}
