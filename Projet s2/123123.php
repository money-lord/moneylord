<?php
session_start();
include('Function/function.php');


echo CouleurReturn($bdd).tirage($bdd);
