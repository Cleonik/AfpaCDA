// Exercice 5 le formulaire Jarditou
//nom
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
}


else{
    nom_m.innerHTML="Nom valide";
    nom_m.style.color='green';
    nom.style.borderColor='green';
}
}
//prenom
var prenom=document.getElementById('prenom');
var prenom_m=document.getElementById('erreur2');
var prenom_v=/^[A-Z][a-zéèêëàïîç]+([-'\s][A-Z][a-zéèêëàïîç])?/;
prenom.addEventListener('focusout', validprenom);
function validprenom(e){

if ((prenom.validity.valueMissing) || (prenom_v.test(prenom.value) == false )){
    e.preventDefault();
    prenom_m.innerHTML='Prénom manquant ou invalide';
    prenom_m.style.color='red';
    prenom.style.borderColor='red';
}


else{
    prenom_m.innerHTML="Prénom valide";
    prenom_m.style.color='green';
    prenom.style.borderColor='green';
}
}

//sexe
var sexef=document.getElementById('radio1');
var sexeh=document.getElementById('radio2');
var sexe_m=document.getElementById('erreur3');
sexef.addEventListener('mouseover', validsexe);
sexeh.addEventListener('mouseover', validsexe);
function validsexe(e){

if ((sexef.validity.valueMissing) && (sexeh.validity.valueMissing)){
    e.preventDefault();
    sexe_m.innerHTML='Veuillez choisir choisir un sexe';
    sexe_m.style.color='red';
    sexe_m.style.borderColor='red';
}
else{
    sexe_m.innerHTML=' ';
}
}

    
//date de naissance
var date=document.getElementById('date');
var date_m=document.getElementById('erreur4');
var date_v=/^[1-2][0-9]{3}[\-][0-1][0-9][\-][0-3][0-9]$/; 
date.addEventListener('focusout', validdate);
function validdate(e){

if ((date.validity.valueMissing) || (date_v.test(date.value) == false )){
    e.preventDefault();
    date_m.innerHTML='Date de naissance manquant ou invalide';
    date_m.style.color='red';
    date.style.borderColor='red';
}


else{
    date_m.innerHTML="Date de naissance valide";
    date_m.style.color='green';
    date.style.borderColor='green';
}
}

//code postal
var codepostal=document.getElementById('codepostal');
var codepostal_m=document.getElementById('erreur5');
var codepostal_v=/^[0-9]{5}$/;
codepostal.addEventListener('focusout', validcodepostal);
function validcodepostal(e){

if ((codepostal.validity.valueMissing) || (codepostal_v.test(codepostal.value) == false )){
    e.preventDefault();
    codepostal_m.innerHTML='Code postal manquant ou invalide';
    codepostal_m.style.color='red';
    codepostal.style.borderColor='red';
}


else{
    codepostal_m.innerHTML="Code postal valide";
    codepostal_m.style.color='green';
    codepostal.style.borderColor='green';
}
}

//email
var email=document.getElementById('email');
var email_m=document.getElementById('erreur6');
var email_v=/^[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,5}$/;
email.addEventListener('focusout', validemail);
function validemail(e){

if ((email.validity.valueMissing) || (email_v.test(email.value) == false )){
    e.preventDefault();
    email_m.innerHTML='Courriel manquant ou invalide';
    email_m.style.color='red';
    email.style.borderColor='red';
}


else{
    email_m.innerHTML="Courriel valide";
    email_m.style.color='green';
    email.style.borderColor='green';
}
}


//question
var question=document.getElementById('question');
var question_m=document.getElementById('erreur8');
question.addEventListener('focusout', validquestion);
function validquestion(e){

if (question.validity.valueMissing){
    e.preventDefault();
    question_m.innerHTML='veuillez remplir le champ Votre question';
    question_m.style.color='red';
    question.style.borderColor='red';
}


else{
    question_m.style.color='green';
    question.style.borderColor='green';
}
}

//accepte les coditions g
var acceptation=document.getElementById('acceptation');
var acceptation_m=document.getElementById('erreur9');
acceptation.addEventListener('mouseover', validacceptation);
function validacceptation(e){
    if (acceptation.validity.valueMissing){
        e.preventDefault();
        acceptation_m.innerHTML='Veuillez accepter le traitement informatique de ce formulaire';
        acceptation_m.style.color='red';
        acceptation_m.style.borderColor='red';
    }
    else{
        acceptation_m.innerHTML=' ';
    }
}



