<?php
session_start();
include('Function/function.php');

?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" href="./css/styleprojet.css" type="text/css" media="screen" />
          <title>MoneyLord Win</title>
      </head>
      <body>
        <br>
          <center>
            <?php
              if ($_SESSION['coinMiseResult'] == $_SESSION['sideChoice']) {

                echo '<h1>Tu as gagné deux fois ta mise ! </h1>';

              } else {

                echo '<h1>Tu as perdu ! </h1>';

              }

              $_SESSION['sideChoice'] = null;
              $_SESSION['CoinFlipMise'] = null; 
            ?>


            <p><a href="coinflipBet.php">Clique ici pour rejouer !</a></p>

          </center>
      </body>
  </html>
