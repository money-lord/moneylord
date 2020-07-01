<?php
session_start();
include('Function/function.php');

// rouge #c50326
// bleu #0d6af7
// vert #13c924
// gris #81827d
// jaune #EDD602
// violet #bc04a6


$_SESSION['playerColor'] = NULL;
$_SESSION['ColorMise'] = NULL ;

 

if(!empty($_POST['mise'])){
  $_SESSION['ColorMise'] = $_POST['mise'];
  resetColor($bdd);
}
?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" href="./css/styleprojet.css" type="text/css" media="screen" />
          <title>MoneyLord Color Game</title>
      </head>
      <body>
        <br>
          <center>
            <h1>Choisi ta Mise !</h1>

            <form action="" method="post">
              <input type="number" name="mise">
              <input type="submit" value="Miser">
            </form>

          </center>



      </body>
  </html>
