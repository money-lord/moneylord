<?php
session_start();
include('Function/function.php');
if (!empty($_POST['change']) && $_POST['change'] != null) {
  if (isset($_FILES['avatar'])) {
    changeavatar($bdd);
  }
  changeData($bdd);

}
$displayBalance = $bdd->query('SELECT * FROM Clients WHERE pseudo = \''.$_SESSION["pseudo"].'\' ');
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
        <section class="sectionindex">
          <div class="imageindex">
            <center>
            <img src="Images/logo.png" class="logo" alt="Logo" />
            </center>
          </div>

          <div>
            <center>
            <h1 >Modification de compte</h1>
            <p>
            <form action = "" method = "post" enctype="multipart/form-data" >
                <p >Pseudo : <input type="text" name="pseudo" value = "<?= $info['Pseudo']; ?>" ></p>
            		<p >Nom : <input type="text" name="lastName" value = "<?= $info['Nom']; ?>"></p>
                <p >Prénom : <input type="text" name="firstName" value = "<?= $info['Prenom']; ?>"></p>
            		<p >Mot de Passe : <input type="password" name="password"value = ""></p><br>
                <input type="hidden" name="MAX_FILE_SIZE" value="22097152" />
                <p >Avatar : <input type="file" name="photo" />
                <input type="hidden" name="change" value = "change" >
                <input type="submit" name="" value="Modifier">
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
