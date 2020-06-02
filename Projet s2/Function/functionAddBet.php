<?php
session_start();
include('function.php');
?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" href="../css/styleprojet.css" type="text/css" media="screen" />
      </head>

			<body>
				<form action="GameTwo.php" method="POST"><input type="number" min="0" value="" placeholder="Entrer votre Mise ici">
						<button name="betRoulette" value="0" >Clear</button>
						<button name="betRoulette" value="0.01">+0.01</button>
						<button name="betRoulette" value="0.1">+0.1</button>
						<button name="betRoulette" value="1">+1</button>
						<button name="betRoulette" value="10">+10</button>
						<button name="betRoulette" value="100">+100</button>
						<button name="betRoulette" value="">ALL-IN</button></form>

						<div class="flexButtonRoulette">
							<div class="redTeam">
								<form action="GameTwo.php" method="POST">
									<button class="chatBet">Miser Sur Le Rouge</button>
								</form>
							</div>
							<div class="blackTeam">
								<form action="GameTwo.php" method="POST">
									<button class="chatBet">Miser Sur Le Noir</button>
								</form>
							</div>
							<div class="mlTeam">
								<form action="GameTwo.php" method="POST">
									<button class="chatBet">Miser Sur MoneyLord</button>
								</form>
							</div>
						</div>

				</body>
