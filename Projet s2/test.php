<?php

$bdd = new PDO('mysql:host=176.191.21.84:3307/;dbname=money_lord; charset=utf8', 'user', 'Moneylord1*');



$data = $bdd->query('SELECT c.Solde solde,stats.TotalBet bet,
            stats.TotalBetRoulette roulette, stats.TotalBetCoinFlip flip,
            stats.TotalBetCouleur couleur, c.Nom nom, c.Prenom prenom, c.Pseudo pseudo
            FROM Statistiques AS stats
            INNER JOIN Clients AS c
            ON stats.Clients_ID = c.ID
            WHERE c.ID= 79 ');

          $afficher = $data->fetch();

          			echo $afficher['flip'];
