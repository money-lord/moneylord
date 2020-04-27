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

  $data = $bdd->prepare('INSERT INTO Clients VALUES (NULL, :Pseudo, :Prenom, :Nom, :MotDePasse, 0)');

  $data->bindValue(':Pseudo', $_SESSION['pseudo'], PDO::PARAM_STR);
  $data->bindValue(':Prenom', $_SESSION['firstName'], PDO::PARAM_STR);
  $data->bindValue(':Nom', $_SESSION['lastName'], PDO::PARAM_STR);
  $data->bindValue(':MotDePasse', $_SESSION['password'], PDO::PARAM_STR);


  $insertIsOk = $data->execute();

  if($insertIsOk){
         
      echo '<meta http-equiv="Refresh" content="0; URL=index.php" />';
  }

}
?>