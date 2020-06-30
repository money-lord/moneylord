<?php
session_start();
include('Function/function.php');

$_SESSION['playerColor'] = $_POST['color'];
setColor($bdd);


echo $_SESSION['resultColor1'].
$_SESSION['resultColor2'].
$_SESSION['resultColor3'].
$_SESSION['resultColor4'].
$_SESSION['resultColor5'].
$_SESSION['resultColor6'];

?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" href="./css/styleprojet.css" type="text/css" media="screen" />
          <title>Color</title>
      </head>
      <body>
        <br>
          <center>
            <div class="GameColorDisplaytop">
            <iframe src=colorroulette.php?time=1&deg=<?php echo calcDegColorGame($_SESSION['resultColor1']); ?> width=100% height=270px frameBorder="0" scrolling="no"></iframe>
            <iframe src=colorroulette.php?time=2&deg=<?php echo calcDegColorGame($_SESSION['resultColor2']); ?> width=100% height=270px frameBorder="0" scrolling="no"></iframe>
            <iframe src=colorroulette.php?time=3&deg=<?php echo calcDegColorGame($_SESSION['resultColor3']); ?> width=100% height=270px frameBorder="0" scrolling="no"></iframe>
            </div>
            <br>
            <div class="GameColorDisplaybot">
              <iframe src=colorroulette.php?time=4&deg=<?php echo calcDegColorGame($_SESSION['resultColor4']); ?> width=100% height=270px frameBorder="0" scrolling="no"></iframe>
              <iframe src=colorroulette.php?time=5&deg=<?php echo calcDegColorGame($_SESSION['resultColor5']); ?> width=100% height=270px frameBorder="0" scrolling="no"></iframe>
              <iframe src=colorroulette.php?time=6&deg=<?php echo calcDegColorGame($_SESSION['resultColor6']); ?> width=100% height=270px frameBorder="0" scrolling="no"></iframe>
            </div>
          </center>

          <meta http-equiv="Refresh" content="12; URL=colorWin.php" />
      </body>
  </html>
