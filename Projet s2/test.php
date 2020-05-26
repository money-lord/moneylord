<?php


  session_start();
  include('Function/function.php');
  if(!empty($_POST['password'])){
    $_SESSION['pass2'] = $_POST['password'];
  }
  $message = connection($bdd);

?>
<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <title>Connexion MoneyLord</title>
      </head>
      <body>
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


      </body>
  </html>
