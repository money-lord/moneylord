<?php
session_start();
include('Function/function.php');
chat($bdd);


?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" href="css/styleprojet.css" type="text/css" media="screen" />
          <link rel="icon" type="image/png" href="Images/minilogo.png" />
          <script src="js/jquery.min.js"></script>
          <title>MoneyLord</title>
      </head>
      <body>
        <?php include('header.php'); ?>
        <div class="content">
        <div class="homeGame">

         <div class="homeGameCoinflip">
           <center>
             <h1>Coinflip</h1>
           Viens te confronter avec un autre joueur</br> et tente de gagner le double de ta somme</br> misée au super jeu du coinflip !</br> 1 chance sur 2 de gagner, a toi de jouer !</br>
           </br><img class="ImgHomeCoin" src = "Images/coinflip.gif" >
           <form method="post" action="GameOne.php">
           </br><button type="submit">Jouer !</button></center>
           </form>
         </div>


         <div class="homeGameRoulette">
           <center>
             <h1>Roulette</h1>
           Tu peux ici jouer au jeu le plus prisé des casinos, la roulette !</br> Tu peux multiplier ta mise jusqu'a 10</br> si tu tombe sur la case Money Lord, Bonne Chance !</br>
           </br><img class="ImgHomeRoulette" src = "Images/roulette.gif" >
           <form method="post" action="GameTwo.php">
           </br><button type="submit">Jouer !</button></center>
           </form>
        </div>

         <div class="homeGameColor">
           <center>
             <h1>Couleur</h1>
           Choisis ici ta couleur favorite et tente de multiplier ta mise par 5 !</br> Le jeu le plus chanceux de notre site, viens remplir tes poches ici !</br>
           </br><img class="ImgHomeColor" src = "Images/couleur.gif" >
           <form method="post" action="GameTree.php">
           </br><button type="submit">Jouer !</button></center>
          </form>
        </div>
      </div>
        </div>

        <footer>
          <center>
            <p>© 2020-2020, moneylord.com, Inc. ou ses filiales</p>
          </center>
        </footer>


      </body>
  </html>
