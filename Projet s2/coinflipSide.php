
<?php
session_start();
include('Function/function.php');

if(isset($_POST['sideChoice'])){
  
  $_SESSION['sideChoice'] = $_POST['sideChoice'];  
  coinFlipSideChoice($bdd);

}
?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" href="./css/styleprojet.css" type="text/css" media="screen" />
          <title>MoneyLord CoinFlip</title>
      </head>
      <body>
        <br>
          <center>
            <h1>Choisi ton côté !</h1>
            <div class="coinFlipSide">

              <form action="" method="post">
                
                <input type="hidden" name="sideChoice" value="0"><input id="gameCoinFlipTag" class="gameColorTagGrey" type="submit" value="">
              </form>

              <form action="" method="post">
                <input type="hidden" name="sideChoice" value="1">
                <input id="gameCoinFlipTag" class="gameColorTagYellow" type="submit" value="">
              </form>

            </div>
          </center>
      </body>
  </html>