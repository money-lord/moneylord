<?php

$bdd = new PDO('mysql:host=176.191.21.84:3307/;dbname=money_lord; charset=utf8', 'user', 'Moneylord1*');

function createAccount($bdd){

	$pseudo = htmlspecialchars($_SESSION['pseudo']);
	$nom = htmlspecialchars($_POST['lastName']);
	$prenom = htmlspecialchars($_POST['firstName']);
	$mdp = htmlspecialchars($_POST['password']);

	$data = $bdd->prepare('INSERT INTO Clients VALUES (NULL, :Nom, :Prenom, :Pseudo, :MotDePasse, 0)');
	$data->bindValue(':Pseudo', $pseudo, PDO::PARAM_STR);
	$data->bindValue(':Prenom', $prenom, PDO::PARAM_STR);
	$data->bindValue(':Nom', $nom, PDO::PARAM_STR);
	$data->bindValue(':MotDePasse', $mdp, PDO::PARAM_STR);
	$data->execute();

	$data1 = $bdd->query('SELECT ID FROM Clients WHERE Pseudo= \''.$_POST['pseudo'].'\'');
	$save = $data1 ->fetch();

	$idClients = $save['ID'];

	$data2 = $bdd->prepare('INSERT INTO Statistiques VALUES (NULL,0,0,0,0,0,:idclients)');
	$data2->bindValue(':idclients', $idClients, PDO::PARAM_STR);
	$data2->execute();

}

function verfication($bdd){

	$clientExists = false;

	if (!empty($_POST["pseudo"]) && !empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST["password"])){

		$data = $bdd->query('SELECT Pseudo FROM Clients');
		while($client = $data->fetch()){
			if ($client['Pseudo'] == $_POST['pseudo']) {
				$clientExists = true;
			}
		}
		if ($clientExists == true) {

			return true;

		}else{
			createAccount($bdd);
			echo '<meta http-equiv="Refresh" content="0; URL=index.php" />';
		}
	}
}

function connection($bdd){

	if (!empty($_POST['login']) && !empty($_POST['password'])){
		$data = $bdd->query('SELECT Pseudo, MotDePasse FROM Clients');

		while($client = $data->fetch()){
			if ($client['Pseudo'] == $_POST['login'] && $client['MotDePasse'] == $_POST['password']) {
				$_SESSION['pseudo'] = htmlspecialchars($_POST['login']);
				$_SESSION['password'] = htmlspecialchars($_POST['password']);
        		echo '<meta http-equiv="Refresh" content="0; URL=home.php" />';
			}
		}

	}
}

function addcoin($bdd){
	$_POST['addcoin'];

	$MONEY = $bdd->query('UPDATE Clients SET Solde ='.$_POST['addcoin'].'  WHERE Pseudo=\''.$_SESSION['pseudo'].'\'');
	$MONEY = $MONEY->fetch();
	echo '<meta http-equiv="Refresh" content="0; URL=home.php" />';

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

	$data = $bdd->prepare('UPDATE Clients SET Pseudo=:pseudo, Nom=:nom, Prenom=:prenom, MotDePasse=:password WHERE Pseudo=\''.$_SESSION['pseudo'].'\'');
	$data->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
	$data->bindValue(':nom', $_POST['lastName'], PDO::PARAM_STR);
	$data->bindValue(':prenom', $_POST['firstName'], PDO::PARAM_STR);
	$data->bindValue(':password', $_POST['password'], PDO::PARAM_STR);

	$ExecuteIsOk = $data->execute();
	echo '<meta http-equiv="Refresh" content="0; URL=account.php" />';

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
  echo ' <center>
			<p> Bienvenue '.$afficher['nom'].' '.$afficher['prenom'].'</p>
			<p> Votre pseudo est '.$afficher['pseudo'].'</p> <br> <br>
			<p> Votre solde est actuelement de '.$afficher['solde'].' euros</p> <br>
			<p> Vous avez joué '.$afficher['flip'].' au CoinFlip.</p>
			<p> Vous avez joué '.$afficher['roulette'].' à la Roulette.</p>
			<p> Vous avez joué '.$afficher['couleur'].' au jeu des Couleurs.</p> <br> <br>

			<p> Vous avez misé au TOTAL : '.$afficher['bet'].' € </p><br><br>

			</center>';

	}

function displayBalance($bdd){

	$displayBalance = $bdd->query('SELECT Solde FROM Clients WHERE Pseudo=\''.$_SESSION['pseudo'].'\'');
	$display = $displayBalance->fetch();
	echo '<a href="AddCoins.php">Solde : '.$display["Solde"].'</a>';
}

function chat($bdd){
/*
	$data2 = $bdd->query('SELECT COUNT(ID) AS nbID FROM Chat '); // Début fonction pour supprimer les messages quand il y en a plus de 50 dans la bdd
	$donnees = $data2->fetch();
	$data2->closeCursor();

	if ( $donnees['nbID'] > 50) {
		while ($donnees['nbID'] > 49) {

			$data2 = $bdd->prepare('DELETE FROM CHAT WHERE ID= ');
		}
	}*/
	$data2 = $bdd->query('SELECT COUNT(ID) FROM Chat ');
	echo '<div class="chat"><div class="messagesborder"><div class="messages"><div class="mask"></div>';
	$data1 = $bdd->query('SELECT Pseudo,Message FROM Chat ORDER BY ID DESC LIMIT 10');
	while ($save = $data1 ->fetch()){
		echo '<p>'.$save['Pseudo'].' : '.$save['Message'].'<p>';
	}
	echo'</div></div>';
	echo '<br><center><form action="" method ="POST">
		<input class="txtZone"type="text" name="Message" placeholder="Message"><br><br>
		<button type="submit" value="Envoyer">Envoyer</button>
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
