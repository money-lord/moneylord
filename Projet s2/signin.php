<?php
session_start();
$_SESSION['password'] = md5($_POST['password']);
$_SESSION['pseudo'] = md5($_POST['pseudo']);
include('Function/function.php');
if ($_POST['verif']!=null) {
  $message = verfication($bdd);
}


?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" type="text/css" href="css/style.css" />
          <link rel="stylesheet" href="css/styleIndex.css" type="text/css" media="screen" />
          <link rel="icon" type="image/png" href="Images/minilogo.png" />
          <title>Inscription MoneyLord</title>
      </head>
      <body>
        <section class="sectionindex">
          <div class="imageindex">
            <center>
            <img src="Images/logo.png" class="logo" alt="Logo" />
            </center>
          </div>

          <div class="signup">
            <center>
            <h1 class="welcome">Inscription</h1>
            <p>
              <form class="formulaire" method="post">
                <p class="field"><input type="text" name="pseudo" placeholder="Nom d'utilisateur"><i class="icon-user icon-large"></i></p>
            		<p class="field"><input type="text" name="lastName" placeholder="Nom"><i class="icon-user icon-large"></i></p>
                <p class="field"><input type="text" name="firstName" placeholder="Prénom"><i class="icon-user icon-large"></i></p>
            		<p class="field"><input type="password" name="password" placeholder="Mot de passe"><i class="icon-lock icon-large"></i></p><br>
                <input type="hidden" name="verif" value="true">
            		<button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>
            	</form>
              <a href="index.php">Vous avez un compte ?</a>
            </p>
            <div class="errorred">
            <p> <?php echo $message; ?> </p>
            </div>
            </center>
          </div>
        </section>

        <footer>
          <center>
            <p>© 2020-2020, moneylord.com, Inc. ou ses filiales</p>
          </center>
        </footer>


      </body>
  </html>
