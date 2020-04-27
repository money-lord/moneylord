<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" type="text/css" href="css/style.css" />
          <link rel="stylesheet" href="css/styleIndex.css" type="text/css" media="screen" />
          <link rel="icon" type="image/png" href="Images/minilogo.png" />
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
              <a href="createAccount.php">Vous n'avez pas de compte ?</a>
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

<?php
session_start();

try{
  $bdd = new PDO('mysql:host=legrimoiregalant.fr:3307/;dbname=money_lord; charset=utf8', 'test', 'Moneylord1*');
}
catch(Exception $e){
  die('Erreur :'.$e->getMessage());
}

if (!empty($_POST['login']) && !empty($_POST['password'])) {
  $data = $bdd->query('SELECT Pseudo, MotDePasse FROM Clients');
  while($client = $data->fetch()){
      if ($client['Pseudo'] == $_POST['pseudo'] && $client['MotDePasse'] == $_POST['password']) {
        echo '<a href="home.php">';
    }
  }

}
?>