<?php $image = printAvatar($bdd); ?>
<header>
  <div class="menu">
    <?php include('menu.php'); ?>
  </div>
  <div class="logoheader">
    <center>
      <a href="home.php">
        <img src="Images/logo.png" class="imglogoheader" alt="Logo" />
      </a>
    </center>
  </div>

<nav>
  <h2><?php echo '<img src="./ImagesClients/'.$image.'"  class="image-ronde" > '?></h2>
      <input id="toggle" type="checkbox" checked>
   <ul>
      <li><a href="AddCoins.php"><?php displayBalance($bdd); ?></a></li>
      <li><a href="account.php">MON COMPTE</a></li>
      <li><a href="Index.php">DECONNEXION</a></li>

   </ul>
</nav>

</header>