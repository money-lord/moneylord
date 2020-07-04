<?php
session_start();
include('Function/function.php');



// $_SESSION['sideChoice']
// $_SESSION['CoinFlipMise']

$coin = coinFlipResult($bdd);

$_SESSION['coinMiseResult'] = $coin;

?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" href="./css/styleprojet.css" type="text/css" media="screen" />
      </head>
      <body>
        <br>
          <center>

            <div id="coin-flip-cont">
            <div id="coin">
            <div class="front"></div>
            <div class="back"></div>
            </div>
            </div>


            <meta http-equiv="Refresh" content="5; URL=coinWin.php" />
          </center>
          <script src='./js/jquery.min.js'></script>
          <script  src="./js/function.js"></script>
          <script>
            coinFlipAction(<?php echo  $coin; ?>);
          </script>
      </body>
  </html>
