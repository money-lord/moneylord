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
					echo 'test';
					$data1 = $bdd->query('SELECT Pseudo,Message FROM Chat ORDER BY ID DESC LIMIT 10');
	  	  	while ($save = $data1 ->fetch()){
						echo '<p>'.$save['Pseudo'].' : '.$save['Message'].'<p>';
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
