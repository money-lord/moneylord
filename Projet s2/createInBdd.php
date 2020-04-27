<?php
session_start();

//ouverture d'une connnexion a la bdd money_lord
$bdd = new PDO('mysql:host=legrimoiregalant.fr:3307/;dbname=money_lord; charset=utf8', 'user', 'Moneylord1*');
//préparation de la requete de création de compte
$data = $bdd->prepare('INSERT INTO Clients VALUES (NULL, :Pseudo, :Prenom, :Nom, :MotDePasse)');
//on lie chaque marqueur a une valeur
$data>bindValue(':Pseudo', $_SESSION['pseudo'], PDO::PARAM_STR);
$data->bindValue(':Prenom', $_SESSION['firstName'], PDO::PARAM_STR);
$data->bindValue(':Nom', $_SESSION['lastName'], PDO::PARAM_STR);
$data->bindValue(':MotDePasse', $_SESSION['password'], PDO::PARAM_STR);
//execution de la requete 
$insertIsOk = $data->execute();
if($insertIsOk){
       
    echo '<meta http-equiv="Refresh" content="0; URL=index.php" />';
}
?>
