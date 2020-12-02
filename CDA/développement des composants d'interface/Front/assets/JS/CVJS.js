let form=document.querySelector('#inscription');

form.addEventListener('onsubmit', function(e){
    e.preventDefault();
    if (validcontenu==true && validsujet==true && validemail==true && validnom==true){
        form.submit();
    }
});


var contenu=document.getElementById('contenu');
var contenu_m=document.getElementById('erreur4');
var contenu_v=/^[a-zA-Zéèàùîïâäêëüû0-9,.-_()'"^\/*-+:;=\[\]{}&#°@%¨$£¤§!<>²]+/
contenu.addEventListener('focusout', validcontenu);
function validcontenu(e){

if ((contenu.validity.valueMissing) || (contenu_v.test(contenu.value) == false )){
    e.preventDefault();
    contenu_m.innerHTML='Contenu du mail manquant ou invalide';
    contenu_m.style.color='red';
    contenu.style.borderColor='red';
    return false
}


else{
    contenu_m.innerHTML="Contenu du mail valide";
    contenu_m.style.color='green';
    contenu.style.borderColor='green';
    return true;
}
}

var sujet=document.getElementById('sujet');
var sujet_m=document.getElementById('erreur3');
var sujet_v=/^[a-zA-Zéèàùîïâäêëüû0-9,.-_()'"^\/*-+:;=\[\]{}&#°@%¨$£¤§!<>²]+/
sujet.addEventListener('focusout', validsujet);
function validsujet(e){

if ((sujet.validity.valueMissing) || (sujet_v.test(sujet.value) == false )){
    e.preventDefault();
    sujet_m.innerHTML='Sujet manquant ou invalide';
    sujet_m.style.color='red';
    sujet.style.borderColor='red';
    return false
}


else{
    sujet_m.innerHTML="Sujet valide";
    sujet_m.style.color='green';
    sujet.style.borderColor='green';
    return true;
}
}

var email=document.getElementById('email');
var email_m=document.getElementById('erreur2');
var email_v=/^[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,5}$/;
email.addEventListener('focusout', validemail);
function validemail(e){

if ((email.validity.valueMissing) || (email_v.test(email.value) == false )){
    e.preventDefault();
    email_m.innerHTML='Courriel manquant ou invalide';
    email_m.style.color='red';
    email.style.borderColor='red';
    return false
}


else{
    email_m.innerHTML="Courriel valide";
    email_m.style.color='green';
    email.style.borderColor='green';
    return true;
}
}

var nom=document.getElementById('nom');
var nom_m=document.getElementById('erreur1');
var nom_v=/^[A-Z][a-zéèêëàïîç]+([-'\s][A-Z][a-zéèêëàïîç])?/;
nom.addEventListener('focusout', validnom);
function validnom(e){

if ((nom.validity.valueMissing) || (nom_v.test(nom.value) == false )){
    e.preventDefault();
    nom_m.innerHTML='Nom manquant ou invalide';
    nom_m.style.color='red';
    nom.style.borderColor='red';
    return false;
}


else{
    nom_m.innerHTML="Nom valide";
    nom_m.style.color='green';
    nom.style.borderColor='green';
    return true;
}
}