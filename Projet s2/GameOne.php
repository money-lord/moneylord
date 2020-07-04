<?php
session_start();
include('Function/function.php'); //ffdd
chat($bdd);

?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" href="css/styleprojet.css" type="text/css" media="screen" />
          <link rel="icon" type="image/png" href="Images/minilogo.png" />
          <title>MoneyLord Coinflip</title>
          <script src="js/jquery.min.js"></script>
      </head>
      <body>
        <?php include('header.php'); ?>

        <div class="content">
           <iframe src=coinflipBet.php width=100% height=650px frameBorder="0" scrolling="no"></iframe>
        </div>
        
        <footer>
          <center>
            <p>© 2020-2020, moneylord.com, Inc. ou ses filiales</p>
          </center>
        </footer>



      </body>
  </html>
