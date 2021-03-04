var titreok = false;
var artistok = false;
var yearok = false;
var genreok = false;
var labeleok = false;
var priceok = false;
//var imgok = false;
var form=document.querySelector('#add_album');

form.addEventListener('submit', function(e){
    e.preventDefault();
    console.log(priceok);
    if (titreok==true && yearok==true && genreok==true && labelok==true && priceok==true ){
        form.submit();
        alert('Votre message a bien été envoyé')
    }
    else {
        e.preventDefault();
        alert('Attention tous les champs doivent être remplis');
    }
});

// validation de l'image
// var img=document.getElementById('img');
// var img_m=document.getElementById('error7');
// img.addEventListener('focusout', validimg);
// function validimg(e){

// if (img_v.test(img.value) == false ){
//     e.preventDefault();
//     img_m.innerHTML='Image manquant ou invalide';
//     img_m.style.color='red';
//     img.style.borderColor='red';
// }


// else {
//     img_m.innerHTML="Image valide";
//     img_m.style.color='green';
//     img.style.borderColor='green';
//     imgok=true;
// }
// }

// validation du prix
var price=document.getElementById('price');
var price_m=document.getElementById('error6');
var price_v=/[0-9]{1,3}[.][0-9]{2}/;
price.addEventListener('focusout', validprice);
function validprice(e){

if ((price.validity.valueMissing) || (price_v.test(price.value) == false )){
    e.preventDefault();
    price_m.innerHTML='Prix manquant ou invalide';
    price_m.style.color='red';
    price.style.borderColor='red';
}


else {
    price_m.innerHTML="Prix valide";
    price_m.style.color='green';
    price.style.borderColor='green';
    priceok=true;
}
}

// validation du label
var label=document.getElementById('label');
var label_m=document.getElementById('error5');
var label_v=/^[A-Z0-9]{1}[0-9A-Za-zéèà.\s]{1,19}/;
label.addEventListener('focusout', validlabel);
function validlabel(e){

if ((label.validity.valueMissing) || (label_v.test(label.value) == false )){
    e.preventDefault();
    label_m.innerHTML='Label manquant ou invalide';
    label_m.style.color='red';
    label.style.borderColor='red';
}


else {
    label_m.innerHTML="Label valide";
    label_m.style.color='green';
    label.style.borderColor='green';
    labelok=true;
}
}

// validation du genre
var genre=document.getElementById('genre');
var genre_m=document.getElementById('error4');
var genre_v=/^[A-Z]{1}[A-Za-zéèà.,\/\s]{1,19}/;
genre.addEventListener('focusout', validgenre);
function validgenre(e){

if ((genre.validity.valueMissing) || (genre_v.test(genre.value) == false )){
    e.preventDefault();
    genre_m.innerHTML='Genre manquant ou invalide';
    genre_m.style.color='red';
    genre.style.borderColor='red';
}


else {
    genre_m.innerHTML="Genre valide";
    genre_m.style.color='green';
    genre.style.borderColor='green';
    genreok=true;
}
}

// validation de l'année
var years=document.getElementById('years');
var years_m=document.getElementById('error3');
var years_v=/^(19[0-9][0-9]|20[01][0-9]|2021)$/;
years.addEventListener('focusout', validyear);
function validyear(e){

if ((years.validity.valueMissing) || (years_v.test(years.value) == false )){
    e.preventDefault();
    years_m.innerHTML='Année manquant ou invalide';
    years_m.style.color='red';
    years.style.borderColor='red';
}


else {
    years_m.innerHTML="Année valide";
    yeasr_m.style.color='green';
    years.style.borderColor='green';
    yearok=true;
}
}

// validation de l'artiste
 var artist=document.getElementById('artist');
 var artist_m=document.getElementById('error2');
 var artist_v=/^[0-9]{1,2}/;
 artist.addEventListener('focusout', validartist);
 function validartist(e){

 if ((artist.validity.valueMissing) || (artist_v.test(artist.value) == false )){
     e.preventDefault();
     artist_m.innerHTML='Artiste manquant ou invalide';
     artist_m.style.color='red';
     artist.style.borderColor='red';
 }


 else {
   artist_m.innerHTML='Artiste valide';
     artist_m.style.color='green';
     artist.style.borderColor='green';
     artistok=true;
 }
 }

// validation du titre
var titre=document.getElementById('titre');
var titre_m=document.getElementById('error1');
var titre_v=/^[A-Z]{1}[a-zA-Zéèàùîïâäêëüû0-9.,-]{1,20}/;
titre.addEventListener('focusout', validtitre);
function validtitre(e){

if ((titre.validity.valueMissing) || (titre_v.test(titre.value) == false )){
    e.preventDefault();
    titre_m.innerHTML='Titre de l\'album manquant ou invalide';
    titre_m.style.color='red';
    titre.style.borderColor='red';
}


else {
    titre_m.innerHTML='Titre de l\'album valide';
    titre_m.style.color='green';
    titre.style.borderColor='green';
    titreok=true;
}
}
