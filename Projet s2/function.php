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

?>