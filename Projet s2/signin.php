<?php
session_start();

include('function.php');

$bdd = new PDO('mysql:host=legrimoiregalant.fr:3307/;dbname=money_lord; charset=utf8', 'user', 'Moneylord1*');

if (!empty($_POST["pseudo"]) && !empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST["password"])){
  $_SESSION['pseudo'] = $_POST['pseudo'];
  $_SESSION['firstName'] = $_POST['firstName'];
  $_SESSION['lastName'] = $_POST['lastName'];
  $_SESSION['password'] = $_POST['password'];
//verif
$data = $bdd->query('SELECT Pseudo FROM Clients');
  while($client = $data->fetch()){
    if ($client['Pseudo'] == $_POST['pseudo']) {

      echo 'erreur, votre pseudo est deja pris';
      echo '<meta http-equiv="Refresh" content="0; URL=createAccount.php" />';
    }else{
      createAccount($bdd);
      echo '<meta http-equiv="Refresh" content="0; URL=index.php" />';
    }
  }
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
