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
						<?php echo amountBet($bdd); ?>
						<button name="betRoulette" value="Clear" >Clear</button>
						<button name="betRoulette" value="0.01">+0.01</button>
						<button name="betRoulette" value="0.1">+0.1</button>
						<button name="betRoulette" value="1">+1</button>
						<button name="betRoulette" value="10">+10</button>
						<button name="betRoulette" value="100">+100</button>
						<button name="betRoulette" value="1000">+1000</button>
						<button name="betRoulette" value="10000">+10000</button>
						<button name="betRoulette" value="total">ALL-IN</button>
					</div>
				</form>

				<div class="errorMessage"></div>
					<div class="flexButtonRoulette">
						<div class="redTeam">
							<form action="" method="POST">
								<input type="hidden" name="betRed" value="<?php echo $_SESSION['betRoulette'];?>"><button class="Red chatBet ">Miser Sur Le Rouge</button>
							</form>
						</div>
						<div class="blackTeam">
							<form action="" method="POST">
								<input type="hidden" name="betBlack" value="<?php  echo $_SESSION['betRoulette'];?>"><button class="Black chatBet ">Miser Sur Le Noir</button>
							</form>
						</div>
						<div class="mlTeam">
							<form action="" method="POST">
								<input type="hidden" name="betMl" value="<?php echo $_SESSION['betRoulette'];?>"><button class="Yellow chatBet ">Miser Sur MoneyLord</button>
							</form>
						</div>
					</div>
				</body>
			</body>
