<?php
session_start();
include('function.php');
WinRoulette($bdd);
?>

<script src="../js/jquery.min.js"></script>
<script src="../js/function.js"></script>
<script>


  var timer2 = setInterval(function(){
    var sec = new Date();
    var counter = sec.getSeconds();
    if (counter === 26 | counter === 56) {
      window.location.reload();
    }
  },1000);

</script>
