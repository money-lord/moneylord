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
          <script src='./js/Winwheel.js'></script>
          <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
      </head>
      <body>
        <?php include('header.php'); ?>

        <div class="content">

            <div class="topRoulette">
              <div id="compte">Chargement</div>

              <div class="canvasContainer">
                <canvas id='canvas' width='600' height='300'></canvas>
              </div>
            </div>

            <div class="addBet">
              <form action="GameTwo.php" method="POST">
                  <div class="iframeAddBet">
                    <iframe src=Function/functionAddBet.php width=100% height=100% frameBorder="0"; scrolling="yes"></iframe>
                  </div>
              </form>
            </div>

            <div class="botRoulette">
              
              <div class="redTeamNames">
                <div class="redTeam">
                  <form action="GameTwo.php" method="POST">
                    <button class="chatBet">Miser Sur Le Rouge</button>
                  </form>
                </div> 
                <?php include('Function/roulettered.php'); ?>
              </div>

              <div class="blackTeamNames">
                <div class="blackTeam">
                  <form action="GameTwo.php" method="POST">
                    <button class="chatBet">Miser Sur Le Noir</button>
                  </form>
                </div>
                <?php include('Function/rouletteblack.php'); ?>
              </div>

              <div class="mlTeamNames">
                <div class="mlTeam">
                  <form action="GameTwo.php" method="POST">
                    <button class="chatBet">Miser Sur MoneyLord</button>
                  </form>
                </div> 
                <?php include('Function/rouletteml.php'); ?>
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

          let theWheel = new Winwheel({
              'numSegments' : 15,
              'textAlignment' : 'outer',
              'textOrientation' : 'vertical',
              'textFontSize'    : 16,
              'innerRadius'   : 20,
              'outerRadius'   : 270,
              'pointerAngle' : 0,
              'centerY' : 300,
              'textMargin' : 10,
              'lineWidth'   : 1,
              'rotationAngle' : 12,
              'segments'    :
              [
                  {'fillStyle' : '#000000'},
                  {'fillStyle' : '#C30101'},
                  {'fillStyle' : '#000000'},
                  {'fillStyle' : '#C30101'},
                  {'fillStyle' : '#000000'},
                  {'fillStyle' : '#C30101'},
                  {'fillStyle' : '#000000'},
                  {'fillStyle' : '#C30101'},
                  {'fillStyle' : '#000000'},
                  {'fillStyle' : '#C30101'},
                  {'fillStyle' : '#000000'},
                  {'fillStyle' : '#C30101'},
                  {'fillStyle' : '#000000'},
                  {'fillStyle' : '#C30101'},
                  {'fillStyle' : '#ffea00', 'text' : 'Money Lord'},
              ],
              'animation' :
                {
                    'type'     : 'spinToStop',
                    'duration' : 5,
                    'spins'    : 8,
                    'callbackFinished' : 'alertPrize()',
                    'callbackAfter' : 'drawTriangle()',
                    'stopAngle' : <?php angleRoulette($bdd); ?> // degre ou l'on veut que ca s'arrete

                }
          });
          drawTriangle();
          function drawTriangle()
            {
              let ctx = theWheel.ctx;
              ctx.strokeStyle = 'black';
              ctx.fillStyle   = 'black';
              ctx.lineWidth   = 2;
              ctx.beginPath();
              ctx.moveTo(330, 0);
              ctx.lineTo(330, 0);
              ctx.lineTo(300, 35);
              ctx.lineTo(270, 0);
              ctx.stroke();
              ctx.fill();
            }
        </script>

      </body>
  </html>
