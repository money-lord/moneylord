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
            <h1>Tu as gagné : <?php echo $_SESSION['ColorMise']; ?> $</h1>

            <p><a href="GameTree.php">Clique ici pour rejouer !</a></p>
            
          </center>
      </body>
  </html>
