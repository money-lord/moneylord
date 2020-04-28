<?php

$bdd = new PDO('mysql:host=legrimoiregalant.fr:3307/;dbname=money_lord; charset=utf8', 'user', 'Moneylord1*');

function createAccount($bdd){

	$pseudo = htmlspecialchars($_POST['pseudo']);
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
/*
function chat($bdd){

	if (isset($_POST['message']) AND !empty($_POST['message'])) {
		$pseudo = htmlspecialchars($_SESSION['pseudo']);
		$message = htmlspecialchars($_POST['message']);
		$data = $bdd ->prepare('INSERT INTO Chat VALUES(NULL,:pseudo,:message)');
		$data->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
		$data->bindParam(':message', $message, PDO::PARAM_STR);
		$data->execute();
	}
}*/
function displayChat($bdd){

	$displayMessage = $bdd->query('SELECT * FROM Chat ORDER BY Message desc');

	while($message = $displayMessage->fetch()){
		echo ''.$message['Pseudo'].' :'.$message['Message'].'';
	}

}

function displayBalance($bdd){

	$displayBalance = $bdd->query('SELECT Solde FROM Clients');

		while($display = $displayBalance->fetch()){
			//if ($client['Pseudo'] == $_POST['login'] && $client['MotDePasse'] == $_POST['password']) {
				echo 'Solde :'.$display["Solde"];
			//}
		}

}

function chat($bdd){
	echo '<div class="chat"><div class="messagesborder"><div class="messages">';
	$data1 = $bdd->query('SELECT Pseudo,Message FROM Chat ORDER BY ID DESC LIMIT 10');
	while ($save = $data1 ->fetch()){
		echo '<p>'.$save['Pseudo'].' : '.$save['Message'].'<p>';
	}
	echo'</div></div>';
	echo '<br><center><form class="formulaire" action="" method ="POST">
		<input type="text" name="Message" placeholder="Ton message" size="58"><br><br>
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

?>

