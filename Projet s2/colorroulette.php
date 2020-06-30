<?php
session_start();
include('./Function/function.php');
?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <script src="./js/jquery.min.js"></script>
          <script src='./js/Winwheel.js'></script>
          <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
      </head>
      <body>
	<canvas id='canvas' width='260' height='260'></canvas>
<script src="./js/function.js"></script>
<script>
	let theWheel = new Winwheel({
			'numSegments' : 6,
			'pointerAngle' : 0,
			'lineWidth'   : 1,
			'rotationAngle' : 12,
      'rotationAngle'   : -30,
			'segments'    :
			[
					{'fillStyle' : '#c50326'},
					{'fillStyle' : '#0d6af7'},
					{'fillStyle' : '#13c924'},
					{'fillStyle' : '#81827d'},
					{'fillStyle' : '#EDD602'},
					{'fillStyle' : '#bc04a6'},
			],
			'animation' :
				{
						'type'     : 'spinToStop',
						'duration' : 5,
						'spins'    : 3.5,
						'callbackAfter' : 'drawTriangle()',
            'stopAngle' : <?php echo $_GET['deg']; ?>

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
			ctx.moveTo(125, 0);
			ctx.lineTo(125, 0);
			ctx.lineTo(135, 35);
			ctx.lineTo(145, 0);
			ctx.stroke();
			ctx.fill();
		}

    var counter = <?php echo $_GET['time']; ?>;

    var timerElt = document.getElementById('canvas');
    var timer1 = setInterval(function(){

      timerElt.innerText = counter;
      counter--;

      if (counter == 0) {
        setTimeout(function(){
          theWheel.startAnimation();
          clearInterval(timer1);
        },1000);
      }
    },1000);
</script>
</body>
