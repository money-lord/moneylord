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
        <?php include('header.php'); ?>
        <div class="addMoney">
          <center>
            <h1>Déposer de l'argent</h1> <br> <br>
            <form action="" method="post">

              <br><br>
              <input class="addCoinNumber" type="number" name="addcoin" min="5" max="10000" placeholder="Euros"> 
              <input class="addCoinSubmit" type="submit" value="Ajouter">
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
