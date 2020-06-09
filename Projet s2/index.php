<?php

  session_start();

  if(!empty($_POST['password'])){
    $_SESSION['pass2'] = $_POST['password'];
  }
  $message = connection($bdd);
?>
<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" type="text/css" href="css/style.css" />
          <link rel="stylesheet" href="css/styleIndex.css" type="text/css" media="screen" />
          <title>Connexion MoneyLord</title>
      </head>
      <body>
        <section class="sectionindex">
          <div class="imageindex">
            <center>
            <img src="Images/logo.png" class="logo" alt="Logo" />
            </center>
          </div>

          <div class="Connection">
            <center>
            <h1 class="welcome">Bienvenue</h1>
            <p>
              <form class="formulaire" action="" method ="POST">
            		<p class="field"><input type="text" name="login" placeholder="Nom d'utilisateur"><i class="icon-user icon-large"></i></p>
            		<p class="field"><input type="password" name="password" placeholder="Mot de passe"><i class="icon-lock icon-large"></i></p>
            		<p class="submit"><button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button></p>
            	</form>
              <a href="signin.php">Vous n'avez pas de compte ?</a>
            </p>
            <div class="errorred">
            <p> <?php  if(!empty($_POST['password'])){ echo $message;}?> </p>
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
