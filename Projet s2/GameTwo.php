<?php
session_start();
include('Function/function.php');
chat($bdd);
?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" href="css/styleprojet.css" type="text/css" media="screen" />
          <link rel="icon" type="image/png" href="Images/minilogo.png" />
          <title>MoneyLord Roulette</title>
          <script src="js/jquery.min.js"></script>
      </head>
      <body>
        <header>
          <div class="menu">
            <?php include('menu.php'); ?>
          </div>
          <div class="logoheader">
            <center>
             <a href="home.php"> 
            <img src="Images/logo.png" class="imglogoheader" alt="Logo" />
            </a>
          </center>
          </div>
          <div class="account">
            <a href="account.php">MON COMPTE</a>
            <a href="Index.php">DECONNEXION</a>
          </div>
        </header>

        <div class="content">
        </div>








        <footer>
          <center>
            <p>© 2020-2020, moneylord.com, Inc. ou ses filiales</p>
          </center>
        </footer>


      </body>
  </html>
