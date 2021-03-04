<?php
// déclaration regex
$titreRegex = '/^[A-Z]{1}[a-zA-Zéèàùîïâäêëüû0-9.,-]{1,19}/';
$artistRegex = '/^[A-Z]{1}[a-zA-Zéèàùîïâäêëüû-]{1,19}/';
$yearRegex = '/^[1-2][09][0-9]{2}/';
$genreRegex = '/^[A-Z]{1}[A-Za-zéèà.,\/\s]{1,19}/';
$labelRegex = '/^[A-Z0-9]{1}[0-9A-Za-zéèà.\s]{1,19}/';
$priceRegex = '/[0-9]{1,3}[.][0-9]{2}/';

// déclaration d'un tableau d'erreur
$formError = [];

// si il y a validation du formulaire
if (isset($_POST['Ajouter'])) {
    //si le champ titre n'est pas vide
    if (!empty($_POST['titre'])) {
        // si titre passe la regex
        if (preg_match($titreRegex, $_POST['titre'])) {
            // stockage du post dans une variable
            $titre = htmlspecialchars($_POST['titre']);
        } else {
            // stockage d'un message d'erreur dans un tableau associatif
            $formError['titre'] = 'Erreur de saisie';
        }
    } else {
        $formError['titre'] = 'Champs vide';
    }

    //si le champ artiste n'est pas vide
    if (!empty($_POST['artist'])) {
        // si artiste passe la regex
        if (preg_match($artistRegex, $_POST['artist'])) {
            // stockage du post dans une variable
            $artiste = htmlspecialchars($_POST['artist']);
        } else {
            // stockage d'un message d'erreur dans un tableau associatif
            $formError['artist'] = 'Erreur de saisie';
        }
    } else {
        $formError['artist'] = 'Champs vide';
    }

    //si le champ annee n'est pas vide
    if (!empty($_POST['year'])) {
        // si annee pass la regex
        if (preg_match($yearRegex, $_POST['year'])) {
            // stockage du post dans une variable
            $annee = htmlspecialchars($_POST['year']);
        } else {
            // stockage d'un message d'erreur dans un tableau associatif
            $formError['year'] = 'Erreur de saisie';
        }
    } else {
        $formError['year'] = 'Champs vide';
    }

    //si le champ genre n'est pas vide
    if (!empty($_POST['genre'])) {
        // si genre pass la regex
        if (preg_match($genreRegex, $_POST['genre'])) {
            // stockage du post dans une variable
            $genre = htmlspecialchars($_POST['genre']);
        } else {
            // stockage d'un message d'erreur dans un tableau associatif
            $formError['genre'] = 'Erreur de saisie';
        }
    } else {
        $formError['genre'] = 'Champs vide';
    }

    //si le champ label n'est pas vide
    if (!empty($_POST['label'])) {
        // si label pass la regex
        if (preg_match($labelRegex, $_POST['label'])) {
            // stockage du post dans une variable
            $label = htmlspecialchars($_POST['label']);
        } else {
            // stockage d'un message d'erreur dans un tableau associatif
            $formError['label'] = 'Erreur de saisie';
        }
    } else {
        $formError['label'] = 'Champs vide';
    }

    //si le champ prix n'est pas vide
    if (!empty($_POST['price'])) {
        // si prix pass la regex
        if (preg_match($priceRegex, $_POST['price'])) {
            // stockage du post dans une variable
            $prix = htmlspecialchars($_POST['price']);
        } else {
            // stockage d'un message d'erreur dans un tableau associatif
            $formError['price'] = 'Erreur de saisie';
        }
    } else {
        $formError['price'] = 'Champs vide';
    }

    if ($_FILES['img']['error'] > 0) {
        $formError['img'] = 'Vous devez mettre une image';
        
    }

    if (count($formError) === 0) {
        // => requète insertion bdd
    } else {
    }
}
