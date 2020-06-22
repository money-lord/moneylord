<?php
session_start();
include('Function/function.php');
chat($bdd); // test
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/styleprojet.css" type="text/css" media="screen" />
    <link rel="icon" type="image/png" href="Images/minilogo.png" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <title>Compte Client MoneyLord</title>
  </head>
  <body>
    <?php include('header.php'); ?>
    <div class="contentstat">
      <center>
        <?php statClient($bdd);?>
        <br> <br>
        <a href="formModificationAccount.php">Modifier son compte</a>
      </center>
    </div>

    <footer>
    <!-- <a href="profil.php">test profil</a>// code pour plus tard, ne concerne pas l'itération 1 !-->
      <center>
        <p>© 2020-2020, moneylord.com, Inc. ou ses filiales</p>
      </center>
    </footer>


  </body>
</html>
