<?php
session_start();
include('function.php');
$bdd = new PDO('mysql:host=legrimoiregalant.fr:3307/;dbname=money_lord; charset=utf8', 'user', 'Moneylord1*');

$userCheck = displayUserAccount($bdd);
?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" type="text/css" href="css/style.css" /> 
          <link rel="stylesheet" href="css/styleprojet.css" type="text/css" media="screen" />
          <link rel="icon" type="image/png" href="Images/minilogo.png" />
          <title>Page Vierge</title>
      </head>
      <body>

        <header>

          <div class="menu">
            <?php include('menu.php'); ?>
          </div>
          <div class="logoheader">
            <center>
            <img src="Images/logo.png" class="imglogoheader" alt="Logo" />
          </center>
          </div>
          <div class="acount">
            <a href="Acount.php">MON COMPTE</a>
            <a href="Index.php">DECONEXION</a>

          </div>
        </header>








        <footer>
          <center>
            <p>© 2020-2020, moneylord.com, Inc. ou ses filiales</p>
          </center>
        </footer>


      </body>
  </html>
