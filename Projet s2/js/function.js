function surligne(champ, erreur){
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}
function verifPseudo(champ){
   
   var regex = new RegExp("[a-z0-9]", "i");
   var valid;  
   for (x = 0; x < chars.value.length; x++) {
      valid = regex.test(chars.value.charAt(x));
      if (valid == false) {
          chars.value = chars.value.substr(0, x) + chars.value.substr(x + 1, chars.value.length - x + 1); x--;
      }
   }   
   if(champ.value.length < 5 || champ.value.length > 25){
      surligne(champ, true);
      return false;
   } else {
      surligne(champ, false);
      return true;
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