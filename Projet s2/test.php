
<!DOCTYPE html>
<html lang="fr">

<head>
<title>⓵ Pile ou Face 😐 — lancer une pièce en ligne !</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta content="pile ou face" name="keywords" />
<meta content="Vous ne pouvez pas décider ? ➜ Lancer pile ou face !" name="description" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="prefetch prerender" href="/pile1.png" />
<link rel="prefetch prerender" href="/face1.png" />
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
{lang: 'fr'}
</script>
</head>

<style>
body {overflow-x: hidden;background: white;}
h1 {font-family:calibri;font-style:normal; font-weight: 600; font-size:30pt; color: black; margin-top:0px;margin-bottom:2px;}
h2 {font-family:calibri;font-style:normal; font-weight: 600; font-size:15pt; color: black;margin-top:5px;margin-bottom:5px;}
.w {
 transition: 0s;
color:white;
}
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
.social {
	font-size: 1px; text-align:center; padding-left:35px;

}

.social iframe {
	vertical-align: middle;margin-left:-1px;
}

.social span {
	display: inline-block;
	width: 98px;
}

.social .google {
	width: 46px;padding-right:2px;margin-right:-1px;
}
a {color:black;}
</style>

<body style="margin: 0px; padding: 0px;" onkeyup="c()">


<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter45218352 = new Ya.Metrika({
                    id:45218352,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/45218352" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


<script>
    var delta =0;
    function rotateBy360Deg(ele){
        ele.style.webkitTransform="rotate("+delta+"deg)";
        delta+=360;
    }
</script>


<script type="text/javascript">
 var delta =0;

function c(e) {
e = e || window.event;
 if (e.keyCode === 13) { document.getElementById("s").click()}
 return false;}

function lancer(ele) {


var q=(Math.floor(Math.random() * 2) === 0);

if (q) document.getElementById("piece").innerHTML = '<img src=\'/pile1.png\' alt=\'Pile\' title=\'Pile\'>';
if (q) document.getElementById("piece").style.width = "175px";
if (q) document.getElementById("piece").style.height = "175px";
if (q) document.getElementById("piece").style.background = "white";
if (q) document.getElementById("piece").style.border = "0px";
if (q) document.getElementById("piece").style.transition = "0.4s";


if (q !=true) document.getElementById("piece").innerHTML = '<img src=\'/face1.png\' alt=\'Face\' title=\'Face\'>';
if (q !=true) document.getElementById("piece").style.width = "175px";
if (q !=true) document.getElementById("piece").style.height = "175px";
if (q !=true) document.getElementById("piece").style.background = "white";
if (q !=true) document.getElementById("piece").style.border = "0px";
if (q !=true) document.getElementById("piece").style.transition = "0.4s";

        ele.style.webkitTransform="rotateX("+delta+"deg)";
        delta+=360;
}


function rot() {
if (document.getElementById("w").style.transform="rotateX(360deg)") document.getElementById("piece").style.transform="rotateX(360deg)";
if (document.getElementById("piece").style.transform="rotateX(360deg)") document.getElementById("w").style.transform="none";
}

lancer(ele);
</script>

<center>
<div style="width:100%;background:white;">
<h1><span style="color:gold;">⓵</span> Pile ou Face <span style="color:gold;">😐</span></h1>
<div style="font-size:14pt;color:grey;margin-top:-5px;margin-bottom:10px;">cela aidera à prendre une décision</div>


<div style="margin-top:25px;margin-bottom:4px;width:100%;">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- pilof-links -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4850158868388479"
     data-ad-slot="9971027516"
     data-ad-format="link"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>


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
		<span class="Facebook">
		<iframe src="https://www.facebook.com/plugins/like.php?locale=fr_FR&href=http://pileouface.org&amp;show_faces=false&amp;layout=button" scrolling="no" frameborder="0" style="height: 21px; width: 100px" allowTransparency="true"></iframe>
	</span>
</div>



<div style="padding:9px;font-size:12pt;width:95%;max-width:710px;text-align:justify;font-family:calibri;color:grey;margin-top:14px;background:#FFFFFF;background:linear-gradient(to right, #FFFFFF, #f9f9f9);border-radius:8px;border:1px solid grey;">
C'est un simulateur en ligne du jeu de hasard pile ou face. En effet, il se joue à l’aide d’une pièce de monnaie. Il suffit de prévoir la face sur laquelle va retomber la pièce une fois qu’elle sera lancée. Lorsque vous jouez avec une pièce réelle, cette dernière peut être lancée et atterrir sur le sol ou sur la paume d’une main. Ainsi, le jeu portant le nom des deux côtés d’une pièce de monnaie est utilisé souvent pour départager des joueurs, pour faire des paris ou encore pour prendre des décisions. Vous n’aurez plus besoin de lancer une pièce sur le sol ou sur votre main. La plateforme vous permet de jouer en ligne. Il vous suffit juste de suivre les instructions afin d’y arriver.
<h2>Les instructions du jeu de pile ou face</h2>
<ol style="margin-left:0;padding-left:30px;"><li>Il est important de pouvoir distinguer les deux côtés de la pièce de monnaie. Ici, nous utilisons une pièce de monnaie française de 1 euro.<ul style="list-style-type:none;padding-left:20px;"><li style="margin-top:10px;"><img src="/pile-mini.png" alt="Pile" style="vertical-align:bottom;margin-top:4px;margin-right:5px;"> Le côté où il y a la valeur de la pièce est appelé le côté <b>pile</b> ⓵.</li><li style="margin-bottom:15px;"><img src="/face-mini.png" alt="Face" style="vertical-align:bottom;margin-top:4px;margin-right:5px;"> Tandis que l’autre côté où se trouve la face d’un personnage ou un symbole est le côté <b>face</b> 😐.</li></li></ul><li>Il vous suffit de choisir un coté de la pièce avant de lancer le processus en moins de quelques secondes vous pourrez découvrir le résultat.</li><li>Donc, après avoir choisi mentalement un côté, vous devez simplement appuyer sur le bouton <i>" Lancer "</i> pour débuter le jeu. Il vous est aussi possible d’appuyer sur la touche <i>Entrée</i> de votre clavier pour lancer la pièce.</li></ol> Le résultat génère au hasard, il n'y a que deux résultats possibles, qui sont également probables. Vous pourrez de ce fait, faire vos paris, vous départager ou prendre une décision grâce à ce jeu. En jouant à pile ou face sur le site vous pourrez faire un gain de temps énorme et faire facilement vos choix difficile. N’hésitez pas à recommencer le nombre de fois que vous voulez. Vous n’avez pas de plafonds d’opérations à faire en ligne. Au fait, si deux faces ne vous suffisent pas, voici un autre bon simulateur en ligne d'un autre jeu populaire de hazard, un jeu de dés : <a href="http://devirtuel.com">devirtuel.com</a> - il crée une jolie animation de lancer, et vous pouvez choisir le nombre de dés ainsi que le nombre de faces.
<h2>Les possibilités d’utilisation</h2>
Que cela soit pour vous départager lors d’un jeu, ou pour prendre une décision importante, vous pouvez laisser le hasard décider pour vous. En effet, vous pouvez avoir recours à pile ou face en accédant sur la plateforme du jeu. Ainsi, vous pourrez jouer de manière optimale avec vos amis ou en solitaire. Le site totalement gratuit vous permettra de jouer où que vous soyez à l’aide de votre ordinateur. De plus, vous pourrez jouer où que vous soyez quel que soit le terminal que vous utilisez : smartphone, pc, ou encore tablette.
</div>
<br>
<div style="font-family:calibri;font-size:11pt;margin-top:20px;">
© 2017 PileOuFace.org | <a href="/contactez/">Contactez nous</a>
</div>
</div>
</center>
</body>
</html>
