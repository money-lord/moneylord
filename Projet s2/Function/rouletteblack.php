<div class="messagesBlack">
<?php
$bdd = new PDO('mysql:host=legrimoiregalant.fr:3307/;dbname=money_lord; charset=utf8', 'user', 'Moneylord1*');
$data1 = $bdd->query('	SELECT Pseudo c.pseudo, Mise Rblack.mise 
						FROM roulletteBlack AS Rblack
						INNER JOIN Clients AS c
						ON Rblack.IDClient = c.ID
						WHERE c.ID= \''.$_SESSION['ID'].'\' 
						ORDER BY ID 
						LIMIT 10');
$i = 14;
var_dump($data1['c.pseudo']);
var_dump($data1['Rblack.mise']);
while ($save = $data1 ->fetch()){
	if(isset($save['Rblack.mise']) && isset($save['c.pseudo'])){
		$tableChat[$i][0] = $save['c.pseudo'];
		$tableChat[$i][1] = $save['Rblack.mise'];
		$i--;
		if ($i < 1 ) {
			break;
		}
	}
}
for($j=0; $j < 15 ;$j++){
	if(!empty($tableChat[$j][0])){
		echo '<p>'.$tableChat[$j][0].' : '.$tableChat[$j][1].'<p>';
	}
}
echo'</div>'; ?>
