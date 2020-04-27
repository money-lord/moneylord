<?php

$bdd = new PDO('mysql:host=legrimoiregalant.fr:3307/;dbname=money_lord; charset=utf8', 'user', 'Moneylord1*');

function createAccount($bdd){

	$data = $bdd->prepare('INSERT INTO Clients VALUES (NULL, :Nom, :Prenom, :Pseudo, :MotDePasse, 0)');
	$data->bindValue(':Pseudo', $_POST['pseudo'], PDO::PARAM_STR);
	$data->bindValue(':Prenom', $_POST['firstName'], PDO::PARAM_STR);
	$data->bindValue(':Nom', $_POST['lastName'], PDO::PARAM_STR);
	$data->bindValue(':MotDePasse', $_POST['password'], PDO::PARAM_STR);
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
				$_SESSION['pseudo'] = $_POST['login'];
				$_SESSION['password'] = $_POST['password'];
        		echo '<meta http-equiv="Refresh" content="0; URL=home.php" />';
			}
		}

	}

}

function displayUserAccount($bdd){

	if (!empty($_POST['userAccount'])) {
		$userAccount = $_POST['userAccount'];
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


	
?>
