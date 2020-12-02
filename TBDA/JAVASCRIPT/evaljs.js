//exercice 1 calcul de personnes en fonction de l'age
var bouton1= document.getElementById("Id_btn1");
bouton1.addEventListener("click",clickbtn1);
function clickbtn1(){
var ageinf20 =0;
var ageinf40 =0;
var agesup40 =0;
var message ="";

do{
var saisie = prompt("Saisir l'age de l'individu" );
if (saisie=="" || saisie==null || saisie==0){
    ageinf20=ageinf20;
    alert('Saisie incorrecte');
}
else if(saisie<20){
    ageinf20++;
}
else if(saisie<=40){
    ageinf40++;
}
else {
    agesup40++;
}
}
while(saisie<100)
message=message+'Le nombre de personnes dont l\'age est inférieur à 20 ans est de '+ageinf20+'\nLe nombre de personnes dont l\'age est entre 20 et 40 ans est de '+ageinf40+'\nLe nombre de personnes dont l\'age est supérieur 40 ans est de '+agesup40;

alert(message);
}



//exercice 2 fonction table de multiplication
function tabledemultiplication (){ 
var X = parseInt(prompt('Veuillez entrer un nombre entier de la table souhaitée'));
var message1 = "";
for (i=0; i<11; i++) {
     resultat = X * i ;
   message1 = message1 + "\n" +X+"*"+i+"="+resultat ;
}

alert(message1);
}
var bouton2= document.getElementById("Id_btn2");
bouton2.addEventListener("click",clickbtn2);

function clickbtn2(){
   tabledemultiplication();
}


 //exercice 3 recherche de prénom
var bouton3= document.getElementById("Id_btn3");
bouton3.addEventListener("click",clickbtn3);
function clickbtn3(){
    var tab = ["Audrey", "Aurélien", "Flavien", "Jérémy", "Laurent", "Melik", "Nouara", "Salem", "Samuel", "Stéphane"];
    
    var find=prompt('Entrez un nom pour trouver les nom de la liste.\nAttention un prénom commence toujours par une majuscule');

    if(tab.includes(find)){
        tab.splice(tab.indexOf(find),1);
        console.log(tab);
        alert('Bravo, vous avez trouver l\'un des prénoms');
        
    }
    else{
        alert("Dommage, try again!");
    }
}


// exercice 4 commande
var bouton4= document.getElementById("Id_btn4");
bouton4.addEventListener("click",clickbtn4);
function clickbtn4(){
    var PU=parseInt(prompt('Veuillez indiquer le prix unitaire de l\'objet'));
    var QTECOM=parseInt(prompt('Veuillez indiquer la quantité souhaité'));
    var TOT=PU*QTECOM;
    if(TOT>=100 && TOT<=200){
        REM='5%';
        PORT='6€';
        TOT=TOT*0.95+PORT;
        
    }
    else if (TOT>200){
        REM='10%';
        TOT=TOT*0.9;
        if(TOT>=500){
            PORT='offert'
            TOT=TOT;
  
        }
        else if(TOT>=300){
            PORT='2%';
            TOT=TOT+TOT*0.02;
        }
        else{
            PORT=6;
            TOT=TOT+6;   
        }
    }
    else{
        REM='0%';
        PORT='6€';
        TOT=TOT+6;
    }
    
    alert('Le prix unitaire de l\'objet est de '+PU+'€\nLa quantité souhaité est de '+QTECOM+'\nVous disposez d\'une remise de '+REM+'\nLes frais de port sont de '+PORT+'\nLe prix à payer est de '+TOT.toFixed(2)+'€');

}
