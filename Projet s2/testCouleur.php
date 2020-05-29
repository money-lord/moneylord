
<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <script src="js/jquery.min.js"></script>
          <script src='./js/Winwheel.js'></script>
          <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
      </head>
      <body>
              <div class="canvasContainer">
                <canvas id='canvas' width='600' height='300'></canvas>
              </div>

        <script src="js/function.js"></script>
        <script>

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
                    'stopAngle' : 30

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
<button onClick="theWheel.startAnimation();">Spin the Wheel</button>


      </body>
  </html>
