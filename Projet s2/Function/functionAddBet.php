<?php
session_start();
include('function.php');

betColor($bdd);

?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" href="../css/styleprojet.css" type="text/css" media="screen" />
      </head>

			<body>
				<div class="testBet">
				<form action="" method="POST">
					<div class="bet">
						<input type="text" min="0" value="<?php amountBet(); ?>" placeholder="Entrer votre Mise ici">
						<button name="betRoulette" value="0" >Clear</button>
						<button name="betRoulette" value="0.01">+0.01</button>
						<button name="betRoulette" value="0.1">+0.1</button>
						<button name="betRoulette" value="1">+1</button>
						<button name="betRoulette" value="10">+10</button>
						<button name="betRoulette" value="100">+100</button>
						<button name="betRoulette" value="">ALL-IN</button>
					</div>
				</form>


					<div class="flexButtonRoulette">
						<div class="redTeam">
							<form action="" method="POST">
								<input type="hidden" name="betRed" value="<?php echo $_SESSION['betRoulette'];?>"><button class="chatBet">Miser Sur Le Rouge</button>
							</form>
						</div>
						<div class="blackTeam">
							<form action="" method="POST">
								<input type="hidden" name="betBlack" value="<?php  echo $_SESSION['betRoulette'];?>"><button class="chatBet">Miser Sur Le Noir</button>
							</form>
						</div>
						<div class="mlTeam">
							<form action="" method="POST">
								<input type="hidden" name="betMl" value="<?php echo $_SESSION['betRoulette'];?>"><button class="chatBet">Miser Sur MoneyLord</button>
							</form>
						</div>
					</div>
				</body>
			</body>
