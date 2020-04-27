<?php
session_start();
include('function.php');


?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" type="text/css" href="css/style.css" /> 
          <link rel="stylesheet" href="css/styleprojet.css" type="text/css" media="screen" />
          <link rel="icon" type="image/png" href="Images/minilogo.png" />
          <title>MoneyLord</title>
      </head>
      <body>

        <header>

          <div class="menu">
            <a href="GameOne.php">JEU 1</a>
            <a href="GameTwo.php">JEU 2</a>
            <a href="GameTree.php">JEU 3</a>
          </div>
          <div class="logoheader">
            <center>
            <img src="Images/logo.png" class="imglogoheader" alt="Logo" />
          </center>
          </div>
          <div class="acount">
            <a href="account.php">MON COMPTE</a>
            <a href="Index.php">DECONNEXION</a>
          </div>
        </header>








        <footer>
          <center>
            <p>© 2020-2020, moneylord.com, Inc. ou ses filiales</p>
          </center>
        </footer>


      </body>
  </html>
