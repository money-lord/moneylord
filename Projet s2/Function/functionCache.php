<?php 
/*
//appel de la bdd
$bdd = new PDO('mysql:host=176.191.21.84:3307/;dbname=money_lord; charset=utf8', 'user', 'Moneylord1*');

function WinRoulette($bdd){
    $CoinWin = 0;

if(CouleurReturn($bdd) == 'black'){
    $dataBlack = $bdd->prepare('SELECT ID, IDClient, Mise FROM RouletteBlack WHERE ID=\''.$_SESSION['ID'].'\' ');
    $data = $dataBlack->fetch();
    if($data['ID'] != empty){
        $CoinWin = $CoinWin + $data['Mise'] * 2;
    }
}
if(CouleurReturn($bdd) == 'red'){
    $dataRed = $bdd->prepare('SELECT ID, IDClient, Mise FROM RouletteRed WHERE ID=\''.$_SESSION['ID'].'\' ');
    $data = $dataRed->fetch();
    if($data['ID'] != empty){
        $CoinWin = $CoinWin + $data['Mise'] * 2;
    }
}
if(CouleurReturn($bdd) == 'Ml'){
    $dataMl = $bdd->prepare('SELECT ID, IDClient, Mise FROM RouletteMl WHERE ID=\''.$_SESSION['ID'].'\' ');
    $data = $dataMl->fetch();
    if($data['ID'] != empty){
        $CoinWin = $CoinWin + $data['Mise'] * 10;
    }
}
$dataC = $bdd->prepare('SELECT Solde FROM CLients WHERE ID=\''.$_SESSION['ID'].'\' ');
$dataCF = $dataC->fetch();
$solde = $dataCF['Solde'];
$finalSolde = $solde + $CoinWin;
$data = $bdd->prepare('UPDATE Clients SET Solde=:Solde  WHERE ID=\''.$_SESSION['ID'].'\'');
$data->bindValue(':Solde', $finalSolde, PDO::PARAM_STR);
}


function CouleurReturn($bdd){

    $data2 = $bdd->query('SELECT nbalea AS nb FROM aleatoire WHERE id = 0'); 
    $donnees = $data2->fetch();
    $save = $donnees['nb'];
    
    $data2 = $bdd->query('SELECT nbalea AS nb, id FROM aleatoire WHERE id >= 1'); 
    while($donnees = $data2->fetch()){
      if ($save == $donnees['nb']) {
        $tirage =  $donnees['id'];
      }
    }
    for($i = 1; $i <14; $i=$i+2 ){
    if($tirage == $i){
        return 'black';
    }
    }
    for($i = 2; $i <15; $i=$i+2 ){
        if($tirage == $i){
            return 'red';
        }
    }
    return 'Ml';
}*/
?>