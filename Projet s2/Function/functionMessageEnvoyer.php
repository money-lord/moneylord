<?php
session_start();
include('function.php');

if (!empty($_POST['Message'])) { //ajout de nouveaux messages dans la bdd
    $data2 = $bdd->prepare('INSERT INTO Chat VALUES (NULL,:ID,:Message)');
    $data2->bindValue(':ID', @$_SESSION['pseudo'], PDO::PARAM_STR);
    $data2->bindValue(':Message', $_POST['Message'], PDO::PARAM_STR);
    $data2->execute();
}
?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" href="../css/styleprojet.css" type="text/css" media="screen" />
          <title></title>
          <script src="../js/jquery.min.js"></script>
      </head>
      <body>
      <br>
      <center>
        <form action="" method ="POST">
            <input class="txtZone" type="text" name="Message" placeholder="Message" max="250" ><br><br>
            <button class="buttonChat" type="submit" value="Envoyer" class="button">Envoyer</button>
          </form>
      </center>

      </body>
  </html>