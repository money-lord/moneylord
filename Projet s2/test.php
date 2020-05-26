<?php

// test Roulette
?>

<html>
    <head>
        <script src='./js/Winwheel.js'></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    </head>
    <body>

      <div id="canvasContainer">
        <canvas id='canvas' width='880' height='300'></canvas>
      </div>

          <script>
              let theWheel = new Winwheel({
                  'numSegments' : 10,
                  'textAlignment' : 'outer',
                  'textOrientation' : 'vertical',
                  'textFontSize'    : 11,
                  'innerRadius'   : 20,
                  'pointerAngle' : 0,
                  'centerY' : 300,
                  'textMargin' : 10,
                  'lineWidth'   : 1,
                  'rotationAngle' : 18,
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
                      {'fillStyle' : '#ffea00', 'text' : 'Money Lord'},
                  ],
                  'animation' :
                    {
                        'type'     : 'spinToStop',
                        'duration' : 5,
                        'spins'    : 8,
                        'callbackFinished' : 'alertPrize()',
                        'callbackAfter' : 'drawTriangle()',
                        'stopAngle' : 10 // degre ou l'on veut que ca s'arrete

                    }
              });


              function alertPrize()
                {
                  let winningSegment = theWheel.getIndicatedSegment();
                  alert("la couleur est " + winningSegment.fillStyle + "!");
                }

              drawTriangle();

              function drawTriangle()
                {
                  let ctx = theWheel.ctx;
                  ctx.strokeStyle = 'black';
                  ctx.fillStyle   = 'black';
                  ctx.lineWidth   = 2;
                  ctx.beginPath();
                  ctx.moveTo(170, 5);
                  ctx.lineTo(230, 5);
                  ctx.lineTo(200, 40);
                  ctx.lineTo(171, 5);
                  ctx.stroke();
                  ctx.fill();
                }




          </script>

        <button onClick="theWheel.startAnimation();">tourne la roulette</button>


    </body>
</html>
