<div class="messagesBlack">
<?php
$bdd = new PDO('mysql:host=legrimoiregalant.fr:3307/;dbname=money_lord; charset=utf8', 'user', 'Moneylord1*');

$data1 = $bdd->query('SELECT c.Pseudo pseudo, rb.Mise mise FROM Clients AS c

    INNER JOIN  RoulletteBlack AS rb ON rb.IDClient = c.ID ');

while ($save = $data1 ->fetch()){
        echo '<p>'.$save['pseudo'].' : '.$save['mise'].'</p>';
    }
echo'</div>'; ?>

