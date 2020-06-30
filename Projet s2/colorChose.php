<?php
session_start();
include('Function/function.php');

// rouge #c50326
// bleu #0d6af7
// vert #13c924
// gris #81827d
// jaune #EDD602
// violet #bc04a6

$_SESSION['ColorMise'] = $_POST['mise'];

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
            <h1>Choisi ta Couleur !!</h1>

            <form action="colorGame.php" method="post">
              <input type="hidden" name="color" value="4">
              <input id="gameColorTag" class="gameColorTagRed" type="submit" value="">
            </form>
            <form action="colorGame.php" method="post">
              <input type="hidden" name="color" value="5">
              <input id="gameColorTag" class="gameColorTagblue" type="submit" value="">
            </form>
            <form action="colorGame.php" method="post">
              <input type="hidden" name="color" value="6">
              <input id="gameColorTag" class="gameColorTaggreen" type="submit" value="">
            </form>
            <form action="colorGame.php" method="post">
              <input type="hidden" name="color" value="1">
              <input id="gameColorTag" class="gameColorTaggrey" type="submit" value="">
            </form>
            <form action="colorGame.php" method="post">
              <input type="hidden" name="color" value="2">
              <input id="gameColorTag" class="gameColorTagyellow" type="submit" value="">
            </form>
            <form action="colorGame.php" method="post">
              <input type="hidden" name="color" value="3">
              <input id="gameColorTag" class="gameColorTagpurpul" type="submit" value="">
            </form>


          </center>



      </body>
  </html>
