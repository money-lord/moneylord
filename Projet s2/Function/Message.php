<div class="clear"><div class="messages"><div class="mask"></div>
<?php
$bdd = new PDO('mysql:host=legrimoiregalant.fr:3307/;dbname=money_lord; charset=utf8', 'user', 'Moneylord1*');
$data1 = $bdd->query('SELECT Pseudo,Message FROM Chat ORDER BY ID DESC LIMIT 10');
$i = 14;
while ($save = $data1 ->fetch()){
	if(isset($save['Pseudo']) && isset($save['Message'])){
		$tableChat[$i][0] = $save['Pseudo'];
		$tableChat[$i][1] = $save['Message'];
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
echo'</div></div>'; ?>
