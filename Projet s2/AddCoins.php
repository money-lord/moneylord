<?php
session_start();
include('Function/function.php');
if ($_POST['addcoin'] != NULL) {
  addcoin($bdd);
}
?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" type="text/css" href="css/style.css" />
          <link rel="stylesheet" href="css/styleprojet.css" type="text/css" media="screen" />
          <link rel="icon" type="image/png" href="Images/minilogo.png" />
          <title>Créditer mon compte</title>
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

            <a href="account.php">MON COMPTE</a>
            <a href="Index.php">DECONNEXION</a>
            <br><?php displayBalance($bdd); ?>
          </div>
        </header>

        <div class="content">
          <center>
            <h1>Ajout d'argent</h1> <br> <br>
            <form action="" method="post">
              Montant : <input type="number" name="addcoin" min="0">
              <br><input type="submit" name="" value="Ajouter">
            </form>
          </center>
        </div>


        <footer>
          <center>
            <p>© 2020-2020, moneylord.com, Inc. ou ses filiales</p>
          </center>
        </footer>


      </body>
  </html>
