<?php
session_start();
include('Function/function.php');
?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" href="./css/styleprojet.css" type="text/css" media="screen" />
          <title>Color</title>
      </head>
      <body>
        <br>
          <center>
            <?php
              if ($_SESSION['ColorMise'] == $_SESSION['sideChoice']) {
                echo '<h1>Tu as gagné deux fois ta mise ! </h1>';
              }else {
                echo '<h1>Tu as perdu ! </h1>';
              }
            ?>


            <p><a href="coinflipBet.php">Clique ici pour rejouer !</a></p>

          </center>
      </body>
  </html>
