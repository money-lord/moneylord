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
          <title>MoneyLord Coinflip</title>
          <script src="js/jquery.min.js"></script>
      </head>
      <body>
        <header>
          <div class="menu">
            <?php include('menu.php'); ?>
          </div>
          <div class="logoheader">
            <center>
            <a href="home.php">
            <img src="Images/logo.png" class="imglogoheader" alt="Logo" />
            </a>
          </center>
          </div>
          <div class="account">
            <a href="account.php">MON COMPTE</a>
            <a href="Index.php">DECONNEXION</a>
            <br><?php displayBalance($bdd); ?>
          </div>
        </header>

        <div class="content">
          <iframe src=moby2.htm width=400 height=250 scrolling=no></iframe>
        </div>

<?php /*
        <section>
// displayChat($bdd);
        <div class="chat">
          <form method="POST" action="">
            <input type="text" name="message" placeholder="Message">
            <input type="submit" name="Envoyer">
          </form>
        </div>
        </section> */
?>

        <footer>
          <center>
            <p>© 2020-2020, moneylord.com, Inc. ou ses filiales</p>
          </center>
        </footer>


      </body>
  </html>
