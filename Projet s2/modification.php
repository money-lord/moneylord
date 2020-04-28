<?php
session_start();
$bdd = new PDO('mysql:host=legrimoiregalant.fr:3307/;dbname=money_lord; charset=utf8', 'user', 'Moneylord1*');
$data = $bdd->prepare('UPDATE CLients SET Pseudo=:pseudo, Nom=:nom, Prenom=:prenom, MotDePasse=:password WHERE Pseudo='.$_SESSION['pseudo'].'');
$data->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
$data->bindValue(':nom', $_POST['lastName'], PDO::PARAM_STR);
$data->bindValue(':prenom', $_POST['firstName'], PDO::PARAM_STR);
$data->bindValue(':password', $_POST['password'], PDO::PARAM_STR);

$ExecuteIsOk = $data->execute();

if($ExecuteIsOk){

    $message = 'Votre profil a ete mis a jour';
}
else {

    $message = 'echec de la mise a jour';
}
?>
<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" type="text/css" href="css/style.css" />
          <link rel="stylesheet" href="css/styleIndex.css" type="text/css" media="screen" />
          <link rel="icon" type="image/png" href="Images/minilogo.png" />
          <title>Confirmation modification</title>
      </head>
      <body>
    <div class="login-box">
    <h1>Confirmation Modification</h1>
    <p><?php  echo $message; ?></p>
    <p><?php echo $_POST['pseudo']; ?></p>
    <p><?php echo $_POST['lastName']; ?></p>
    <p><?php echo $_POST['firstName']; ?></p>
    <p><?php echo $_POST['password']; ?></p>

<form action = "account.php" method = "POST" >
        <p>
        <button>Retour</button>
        </p>
        </form>
</div>
</body>
</html>