
<?php

$bdd = new PDO('mysql:host=176.191.21.84:3307/;dbname=money_lord; charset=utf8', 'user', 'Moneylord1*');

$data2 = $bdd->query('SELECT nbalea AS nb FROM aleatoire WHERE id = 0'); // suppression des messages quand il y en a plus de 100 dans la bdd
$donnees = $data2->fetch();
$save = $donnees['nb'];

$data2 = $bdd->query('SELECT nbalea AS nb, id FROM aleatoire WHERE id >= 1'); // suppression des messages quand il y en a plus de 100 dans la bdd
while($donnees = $data2->fetch()){
  if ($save == $donnees['nb']) {
    echo $donnees['id'];
  }
}








 ?>
