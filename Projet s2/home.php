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
           <div class="tophomeGame">
           <center>
             <h1>Coinflip</h1>
           <p>Viens te confronter avec un autre joueur </p><p> Et tente de gagner le double de la somme </p><p> misée au super jeu du coinflip !</p><p> Tu as 1 chance sur 2 de gagner, à toi de jouer !</p>
           <img class="ImgHomeCoin" src = "Images/coinflip.gif" >
           </div>
           <form method="post" action="GameOne.php">
           <button class="buttonHome" type="submit">Jouer !</button></center>
           </form>

         </div>


         <div class="homeGameRoulette">
           <div class="tophomeGame">
           <center>
             <h1>Roulette</h1>
           <p>Tu peux ici jouer au jeu le plus prisé des casinos, la roulette !</p><p> Tu peux multiplier ta mise jusqu'a 10</p><p> Si tu tombe sur la case Money Lord, Bonne Chance !</p>
           <img class="ImgHomeRoulette" src = "Images/roulette.gif" >
           </div>
           <form method="post" action="GameTwo.php">
           <button class="buttonHome" type="submit">Jouer !</button></center>
           </form>

        </div>

         <div class="homeGameColor">
           <div class="tophomeGame">
           <center>
             <h1>Couleur</h1>
           <p>Choisis ici ta couleur favorite et tente de multiplier ta mise par 5 !</p><p> Le jeu le plus chanceux de notre site, viens remplir tes poches ici !</p>
           <img class="ImgHomeColor" src = "Images/couleur.gif" >
           </div>
           <form method="post" action="GameTree.php">
           <button class="buttonHome" type="submit">Jouer !</button></center>
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
