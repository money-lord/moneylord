<div class="messages">
<?php
$bdd = new PDO('mysql:host=legrimoiregalant.fr:3307/;dbname=money_lord; charset=utf8', 'user', 'Moneylord1*');
 $data1 = $bdd->query('SELECT Pseudo,Message FROM Chat ORDER BY ID DESC LIMIT 10');
while ($save = $data1 ->fetch()){
	echo '<p>'.$save['Pseudo'].' : '.$save['Message'].'<p>';
}
echo'</div>'; ?>
