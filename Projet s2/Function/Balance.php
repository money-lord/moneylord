<?php
session_start();
include('function.php'); // test

?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" href="../css/styleprojet.css" type="text/css" media="screen" />
          <title></title>
          <script src="../js/jquery.min.js"></script>
      </head>
      <body>
				<?php
				$bdd = new PDO('mysql:host=legrimoiregalant.fr:3307/;dbname=money_lord; charset=utf8', 'user', 'Moneylord1*');

				$displayBalance = $bdd->query('SELECT Solde FROM Clients WHERE ID=\''.$_SESSION['ID'].'\' ');
				$display = $displayBalance->fetch();
				echo '<a href="AddCoins.php">Solde : '.$display["Solde"].'</a>';
