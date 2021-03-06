<?php
  session_start();
  include('Function/function.php');
  verification($bdd);
  

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
              <form class="formulaire" method="post" onsubmit="return verifForm(this)">
                <p class="field"><input type="text" name="pseudo" placeholder="Nom d'utilisateur" onblur="verifPseudo(this)"><i class="icon-user icon-large"></i></p>
                <p class="field"><input type="text" name="email" placeholder="Email" onblur="verifMail(this)"><i class="icon-user icon-large"></i></p>
                <p class="field"><input type="text" name="age" placeholder="Age" onblur="verifAge(this)" min="0" max="111"><i class="icon-user icon-large"></i></p>
            		<p class="field"><input type="text" name="lastName" placeholder="Nom" onblur="veriflastname(this)"><i class="icon-user icon-large"></i></p>
                <p class="field"><input type="text" name="firstName" placeholder="Prénom" onblur="verifname(this)"><i class="icon-user icon-large"></i></p>
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
      <script src="js/function.js"></script>
      </body>
  </html>
