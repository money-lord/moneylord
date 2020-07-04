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
              <input type="number" min="0" name="mise">
              <input type="submit" value="Miser">
            </form>
          </center>
        <div class="homeGame">

         <div class="homeGameCoinflip">
           <div class="tophomeGame">
           <center>
             <h1>Step 1</h1>
           <p>Choisi ta mise !</p><br><br><br>
           <img class="ImgHomeCoin" src = "Images/img1presentationcoinflip.jpg" >
           </div>

         </div>


         <div class="homeGameRoulette">
           <div class="tophomeGame">
           <center>
             <h1>Step 2</h1>
           <p>Choisi la couleur sur laquelle tu souhaites miser !</p><br><br>
           <img class="ImgHomeRoulette" src = "Images/img1presentationcolor.jpg" >
           </div>

        </div>

         <div class="homeGameColor">
           <div class="tophomeGame">
           <center>
             <h1>Step 3</h1>
           <p>Gagne jusqu'à 16 fois ta mise !</p><p>C'est simple non ? À toi de jouer ! </p>
            <img class="ImgHomeCoin" src = "Images/couleur.gif" >
           </div>

        </div>
      </div>
      </body>
  </html>
