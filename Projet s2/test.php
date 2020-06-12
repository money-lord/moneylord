
<!DOCTYPE html>
<html lang="fr">

<style>

.circle {
    width: 175px;
    height: 175px;
    overflow: hidden;
    background: white;
    padding: 0px;
    border-radius: 50%;
color:#C8CAC9;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    font-size:30pt;
 transition: 0.4s;
  font-family:calibri;
transform:rotateX(0deg);
}

</style>

<script type="text/javascript">
 var delta =0;

function c(e) {
e = e || window.event;
 if (e.keyCode === 13) { document.getElementById("s").click()}
 return false;}

function lancer(ele) {


var q=(Math.floor(Math.random() * 2) === 0); // tirage

if (q) document.getElementById("piece").innerHTML = '<img src=\'/pile1.png\' alt=\'Pile\' title=\'Pile\'>'; // affichage pile
if (q) document.getElementById("piece").style.width = "175px";
if (q) document.getElementById("piece").style.height = "175px";
if (q) document.getElementById("piece").style.background = "white";
if (q) document.getElementById("piece").style.border = "0px";
if (q) document.getElementById("piece").style.transition = "0.4s";


if (q !=true) document.getElementById("piece").innerHTML = '<img src=\'/face1.png\' alt=\'Face\' title=\'Face\'>'; // affichage  face
if (q !=true) document.getElementById("piece").style.width = "175px";
if (q !=true) document.getElementById("piece").style.height = "175px";
if (q !=true) document.getElementById("piece").style.background = "white";
if (q !=true) document.getElementById("piece").style.border = "0px";
if (q !=true) document.getElementById("piece").style.transition = "0.4s";

        ele.style.webkitTransform="rotateX("+delta+"deg)";
        delta+=360;
}




lancer(ele);
</script>

<center>

<div id="piece" class="circle" style="margin-top:30px;" onclick="rotateBy360Deg(this)"><img src="/pile_ou_face.png" alt="Pile ou Face ?" title="Pile ou Face ?"></div><br>

<div style="margin-top:15px;margin-bottom:10px;width:100%;">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- pileouface-adapt -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4850158868388479"
     data-ad-slot="3296007835"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>

<button type="button" id="s" title="Lancer une pièce de monnaie" onclick="lancer(piece)" style="font-size:20pt;"><img src="/lancer2.png" style="width:22px;padding-top:2px;"> Lancer</button><br><br>
<div class="social">
		
</div>
</center>
</body>
</html>
