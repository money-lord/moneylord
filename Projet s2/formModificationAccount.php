<?php
session_start();
 $bdd = new PDO('mysql:host=legrimoiregalant.fr:3307/;dbname=money_lord; charset=utf8', 'user', 'Moneylord1*');
 $data = $bdd->prepare('SELECT * FROM Clients WHERE Pseudo = :pseudo ');
 $data->bindValue(':pseudo', $_SESSION['pseudo'], PDO::PARAM_STR);
 $data->execute();
 $info = $data->fetch();
 //var_dump($info);
 ?>
<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" type="text/css" href="css/style.css" />
          <link rel="stylesheet" href="css/styleIndex.css" type="text/css" media="screen" />
          <link rel="icon" type="image/png" href="Images/minilogo.png" />
          <title>Modification de compte</title>
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
            <h1 class="welcome">Modification de compte</h1>
            <p>
            <form action = "modification.php" method = "post" >
                <p class="field"><input type="text" name="pseudo" value = <?= $info['Pseudo']; ?> ><i class="icon-user icon-large"></i></p>
            		<p class="field"><input type="text" name="lastName" value = <?= $info['Nom']; ?>><i class="icon-user icon-large"></i></p>
                <p class="field"><input type="text" name="firstName" value = <?= $info['Prenom']; ?>><i class="icon-user icon-large"></i></p>
            		<p class="field"><input type="password" name="password"value = <?= $info['MotDePasse']; ?>><i class="icon-lock icon-large"></i></p><br>
            		<button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>
            	</form>
              <a href="account.php">Vous ne désirez plus le modifier ?</a>
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
