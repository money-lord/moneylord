<?php
session_start();
include('Function/function.php');
chat($bdd);
changeavatar($bdd);
?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" href="css/styleprojet.css" type="text/css" media="screen" />
          <link rel="icon" type="image/png" href="Images/minilogo.png" />
          <title>Compte Client MoneyLord</title>
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
          <div class="account">

            <a href="account.php"><img src="/ImagesClients/"<?php.$_SESSION['pseudo'].".".$_SESSION['upload'] ?>></a>
            <a href="Index.php">DECONNEXION</a>
            <br><?php displayBalance($bdd); ?>
          </div>
        </header>
        <div class="content">
          <center>
          <?php statClient($bdd); ?>
          <br> <br>
          <a href="formModificationAccount.php">Modifier son compte</a>
          </center>
        </div>
        <footer>

          <center>
            <p>© 2020-2020, moneylord.com, Inc. ou ses filiales</p>
          </center>
        </footer>


      </body>
  </html>
