<?php
session_start();
if (isset($_POST["pseudo"]) && isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["password"])){
$_SESSION['pseudo'] = $_POST['pseudo'];
$_SESSION['firstName'] = $_POST['firstName'];
$_SESSION['lastName'] = $_POST['lastName'];
$_SESSION['password'] = $_POST['password'];

  echo '<meta http-equiv="Refresh" content="0; URL=createInBdd.php" />';
}

?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" type="text/css" href="css/style.css" />
          <link rel="stylesheet" href="css/styleprojet.css" type="text/css" media="screen" />
          <link rel="icon" type="image/png" href="Images/minilogo.png" />
          <title>Inscription</title>
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
              <form class="formulaire">
                <p class="field"><input type="text" name="pseudo" placeholder="Nom d'utilisateur"><i class="icon-user icon-large"></i></p>
            		<p class="field"><input type="text" name="lastName" placeholder="Nom"><i class="icon-user icon-large"></i></p>
                <p class="field"><input type="text" name="firstName" placeholder="Prénom"><i class="icon-user icon-large"></i></p>
            		<p class="field"><input type="password" name="password" placeholder="Mot de passe"><i class="icon-lock icon-large"></i></p><br>
            		<button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>
            	</form>
              <a href="index.php">Vous avez un compte ?</a>
            </p>
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
