<?php

function displayUserAccount($bdd){
	$userChek = false;
	if ($userAccount == true) { // Si la personne à cliqué sur le bouton COMPTE CLIENT on vérifie que le compte correspond bien à un compte existant dans la bdd pour afficher les info
		 $req = $bdd->query('SELECT * FROM Clients');
		 while ($checkAccount = $req->fetch()) {
			if ($_SESSION['pseudo'] == $checkAccount['pseudo'] && $_SESSION['firstName'] == $checkAccount['firstName'] && 
				$_SESSION['lastName'] == $checkAccount['lastName'] && $_SESSION['password'] == $checkAccount['password']) { // Vérif correspondance entre compte client et client connecté

				$userCheck = true;
			}
		 }
		 return $userCheck;
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