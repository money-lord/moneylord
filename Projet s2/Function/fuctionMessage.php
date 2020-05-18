<?php
session_start();
include('function.php');

?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <link rel="stylesheet" href="../css/styleprojet.css" type="text/css" media="screen" />
          <title></title>
          <script src="../js/jquery.min.js"></script>
      </head>
      <body>
				<?php
					echo '<div class="messages">';
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
					echo'</div>';
		  	?>

				<script>
					setInterval('load_messages()',500);
					function load_messages(){
						$('.messages').load('Message.php');
					}
				</script>

      </body>
  </html>
