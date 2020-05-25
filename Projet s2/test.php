<?php

if ($_POST['pseudo'] != null) {
  echo htmlspecialchars($_POST['pseudo']);
}


?>

<!DOCTYPE html>
  <html>
      <head>
          <meta charset="utf-8" />
          <title>Inscription MoneyLord</title>
      </head>
      <body>
        <section class="sectionindex">


          <div class="signup">
            <center>
            <h1 class="welcome">Inscription</h1>
            <p>
              <form class="formulaire" method="post" onsubmit="return verifForm(this)">
                <input type="text" name="pseudo" placeholder="Nom d'utilisateur" onblur="verifPseudo(this)">
            		<input type="submit" >
            	</form>
            </p>
            </center>
          </div>
        </section>


      <script src="js/function.js"></script>
      </body>
  </html>
