<?php
session_start();
include('Function/function.php');
if (!empty($_POST['addcoin'])) {

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

        <div class="addMoney">
          <center>
            <h1>Déposer de l'argent</h1> <br> <br>
            <form action="" method="post">
              <input type="button" name="addcoin" value="5">
              <input type="button" name="addcoin" value="10">
              <input type="button" name="addcoin" value="20">
              <input type="button" name="addcoin" value="50">
              <input type="button" name="addcoin" value="100">
              <input type="button" name="addcoin" value="200">
              <input type="button" name="addcoin" value="500">
              <input type="button" name="addcoin" value="1000">
              <br><br>
              <input type="number" name="addcoin" value="<?php echo $_POST['addcoin'] ?>">
              <input type="submit" name="Ajouter ce montant à mon solde">
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
