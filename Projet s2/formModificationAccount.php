<?php
session_start();
include('Function/function.php');
if (!empty($_POST['change']) && $_POST['change'] != null) {

  $message = changeData($bdd);

}

$displayBalance = $bdd->query('SELECT * FROM Clients WHERE ID= \''.$_SESSION["ID"].'\' ');
$info = $displayBalance->fetch();

 ?>
<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" href="css/styleprojet.css" type="text/css" media="screen" />
          <link rel="icon" type="image/png" href="Images/minilogo.png" />
          <title>Modification de compte</title>
      </head>
      <body>
        <div class="fade">
           <div class="imageindex">
            <center>
            <img src="Images/logo.png" class="logo" alt="Logo" />
            </center>
          </div>

          <div class="accModif">
            <center>
            <h1>Modification de compte</h1>
            <p>
            <form action="" method="post" enctype="multipart/form-data" >
                <p>Pseudo : <input class="inputAccModif" type="text" name="pseudo" value = "<?= $info['Pseudo']; ?>" ></p>
            		<p>Nom : <input class="inputAccModif" type="text" name="lastName" value = "<?= $info['Nom']; ?>"></p>
                <p>Prénom : <input class="inputAccModif" type="text" name="firstName" value = "<?= $info['Prenom']; ?>"></p>
            		<p>Mot de Passe : <input class="inputAccModif" type="password" name="password"value = ""></p>
                <p>Sélectionnez l'Avatar à télécharger : <input type="file" name="fichier" id="fichier"/>
                <input class="inputAccModif" type="hidden" name="change" value="change"><br><br>
                <input class="inputAccModif" type="submit" name="" value="Modifier">
            	</form>
              <p>
              <a href="account.php">Vous ne désirez plus le modifier ?</a>
            </p>
            <p> <?php  if(!empty($_POST['change'])){ echo $message;}?> </p>
            </center>
          </div>
        <footer class="footerFade">
          <center>
            <p>© 2020-2020, moneylord.com, Inc. ou ses filiales</p>
          </center>
        </footer>

        </div>
      </body>
  </html>
