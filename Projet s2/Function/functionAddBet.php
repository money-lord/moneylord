<?php
	echo'<form action="GameTwo.php" method="POST"><input type="number" min="0" value="<?php //calculateBet();?>" placeholder="Entrer votre Mise ici">
		<button name="betRoulette" value="0" >Clear</button>
		<button name="betRoulette" value="0.01">+0.01</button>
		<button name="betRoulette" value="0.1">+0.1</button>
		<button name="betRoulette" value="1">+1</button>
		<button name="betRoulette" value="10">+10</button>
		<button name="betRoulette" value="100">+100</button>
		<button name="betRoulette" value="">ALL-IN</button></form>';
?>
