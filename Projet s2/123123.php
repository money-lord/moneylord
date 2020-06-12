<?php
session_start();
include('Function/function.php');


$dataC = $bdd->query('SELECT TotalBetRoulette FROM Statistiques WHERE Clients_ID =\''.$_SESSION['ID'].'\' ');
$dataCF = $dataC->fetch();
$TotalBetRoulette = $dataCF['TotalBetRoulette'];
echo $dataCF['TotalBetRoulette'];

$finalbelt = $TotalBetRoulette + 1;
echo $finalbelt;
$data = $bdd->prepare('UPDATE Statistiques SET TotalBetRoulette =:TotalBetRoulette  WHERE Clients_ID=\''.$_SESSION['ID'].'\'');
$data->bindValue(':TotalBetRoulette', $finalbelt, PDO::PARAM_STR);
$data->execute();
