<?php
session_start();
include('Function/function.php');

$data= $bdd->query('SELECT C.Pseudo PS, C.Solde so, S.TotalBet tb, S.ID ID FROM Clients C INNER JOIN  Statistiques S ON S.Clients_ID = C.ID');

while ($client = $data->fetch()) {
  echo $client['PS'].$client['so'].$client['tb'].$client['ID'].'<br>';
}
