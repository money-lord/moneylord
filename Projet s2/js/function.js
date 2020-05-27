function surligne(champ, erreur){
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}
function verifPseudo(champ){

   //var regex = new RegExp("\\w+[-|\\s]+\\w", "i");
   var regex1 = /^[a-zéèàùûêâôë][a-zéèàùûêâôë \'-]+[a-zéèàùûêâôë]$/i;
   var regex2 = /[A-Za-z0-9]/;

   if(champ.value.length < 6 || champ.value.length > 14 || !regex1.test(champ.value) && !regex2.test(champ.value)){
      surligne(champ, true);
      return false;
   } else {
      surligne(champ, false);
      return true;
   }



}
function verifname(champ){
  if(champ.value.length < 2 || champ.value.length > 35){
     surligne(champ, true);
     return false;
  } else {
     surligne(champ, false);
     return true;
  }

}
function veriflastname(champ){
  if(champ.value.length < 2 || champ.value.length > 35){
     surligne(champ, true);
     return false;
  } else {
     surligne(champ, false);
  }

}
function verifMail(champ){

   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value)){
      surligne(champ, true);
      return false;
   } else {
      surligne(champ, false);
      return true;
   }
}
function verifAge(champ){
   var age = parseInt(champ.value);
   if(isNaN(age) || age < 18 || age > 111){
      surligne(champ, true);
      return false;
   } else {
      surligne(champ, false);
      return true;
   }
}
function verifForm(f){
   var pseudoOk = verifPseudo(f.pseudo);
   var mailOk = verifMail(f.email);
   var ageOk = verifAge(f.age);

   if(pseudoOk && mailOk && ageOk){
      return true;
   } else {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}

function roulette() {

          var timerElt = document.getElementById('compte');
          var timer = setInterval(function(){
            var now = new Date();
            var counter = now.getSeconds();
            if (counter === 0 | counter === 30) {
              time();
            }
            /*
            if (counter >= 11){
             counter = Math.abs(counter-60);
             timerElt.innerText = "ca tourne";
              timerElt.innerText = counter;
            }*/
          },1000);
}

function time() {

          var counter = 20;

          var timerElt = document.getElementById('compte');
          var timer1 = setInterval(function(){

            timerElt.innerText = counter;
            counter--;
            if (counter == 0) {
              setTimeout(function(){
                theWheel.startAnimation();
                clearInterval(timer1);

                

              },1000);
            }

          },1000);
}
