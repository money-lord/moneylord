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
          <title>MoneyLord Roulette</title>
          <script src="js/jquery.min.js"></script>
      </head>
      <body>
        <?php include('header.php'); ?>

        <div class="content">

          <div class="top">

            <div id="compte"></div>

            <div class="content">
              <div id="canvasContainer">
                <canvas id='canvas' width='880' height='300'></canvas>
              </div>
            </div>
            <div id="canvasContainer">
              <canvas id='canvas' width='880' height='300'></canvas>
            </div>

          </div>

          <div class="team">
            <div class="teamyellow">

            </div>
            <div class="teamgrey">

            </div>
            <div class="teamml">

            </div>

          </div>

        </div>

        <footer>
          <center>
            <p>© 2020-2020, moneylord.com, Inc. ou ses filiales</p>
          </center>
        </footer>



        <script src="js/function.js"></script>
        <script>
          roulette();
        </script>



      </body>
  </html>
