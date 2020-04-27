<?php

function displayUserAccount($bdd){

	if (!empty($_POST['userAccount'])) {
		$userAccount = $_POST['userAccount'];
	} else {
		$userAccount = false;
	}
	$req = $bdd->query('SELECT * FROM Clients');
	while ($checkAccount = $req->fetch()) {
		if ($_SESSION['pseudo'] == $checkAccount['pseudo'] && $_SESSION['firstName'] == $checkAccount['firstName'] && 
			$_SESSION['lastName'] == $checkAccount['lastName'] && $_SESSION['password'] == $checkAccount['password']) { // Vérif correspondance entre compte client et client connecté

			echo '<div><p>Pseudo : '.$checkAccount['Pseudo'].'</p>
					<p>Nom : '.$checkAccount['Nom'].'</p>
					<p>Prénom : '.$checkAccount['Prenom'].'</p></div>';
		}	
	}
}

function createAccount($bdd){

  $data = $bdd->prepare('INSERT INTO Clients VALUES (NULL, :Nom, :Prenom, :Pseudo, :MotDePasse, 0)');

  $data->bindValue(':Pseudo', $_SESSION['pseudo'], PDO::PARAM_STR);
  $data->bindValue(':Prenom', $_SESSION['firstName'], PDO::PARAM_STR);
  $data->bindValue(':Nom', $_SESSION['lastName'], PDO::PARAM_STR);
  $data->bindValue(':MotDePasse', $_SESSION['password'], PDO::PARAM_STR);
  $data->execute();
}

function connection($bdd){

	if (!empty($_POST['login']) && !empty($_POST['password'])){
		$data = $bdd->query('SELECT Pseudo, MotDePasse FROM Clients');

		while($client = $data->fetch()){
			if ($client['Pseudo'] == $_POST['pseudo'] && $client['MotDePasse'] == $_POST['password']) {
        		echo '<a href="home.php">';
			}
		}

	}

}
	
?>