<?php
// déclaration regex
$titreRegex = '/^[A-Z]{1}[a-zA-Zéèàùîïâäêëüû0-9.,-]{1,19}/';
$artistRegex = '/^[0-9]{1,2}/';
$yearRegex = '/^(19[0-9][0-9]|20[01][0-9]|2020)$/';
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
    if (!empty($_POST['years'])) {
        // si annee pass la regex
        if (preg_match($yearRegex, $_POST['years'])) {
            // stockage du post dans une variable
            $annee = htmlspecialchars($_POST['years']);
        } else {
            // stockage d'un message d'erreur dans un tableau associatif
            $formError['years'] = 'Erreur de saisie';
        }
    } else {
        $formError['years'] = 'Champs vide';
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

    $files=$_FILES['img'];
    $file_pic_name=$_FILES['img']['name'];
    $file_pic_tmpname=$_FILES['img']['tmp_name'];
    $file_pic_size=$_FILES['img']['size'];
    $file_pic_error=$_FILES['img']['error'];
    $file_pic_type=$_FILES['img']['type'];
    
    $fileExt=explode ('.', $file_pic_name);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png');
    if(in_array($fileActualExt, $allowed)){
        if($file_pic_error === 0){
            if($file_pic_size < 1000000){
                $file_pic_namenew = $titre.'.'.$fileActualExt;
                $fileDestination= '../assets/IMG/'.$file_pic_namenew;
                move_uploaded_file($file_pic_tmpname, $fileDestination);

            }
            else {
                $formError['img'] = 'le fichier est lourd';
            }
        }
        else{
            $formError['img'] = 'le fichier n\'a pas été chargé correctement';
        }

    }
    else {
        $formError['img'] = 'le fichier doit en .png, .jpg ou .jpeg';
    }

    



    if(count($formError) === 0) {
        // => requète insertion bdd
    
        try {
            $db = new PDO('mysql:host=localhost;charset=utf8;dbname=record', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $sql = $db->prepare("INSERT INTO disc (disc_title, disc_year, disc_picture,disc_label, disc_genre, disc_price, artist_id) 
                                  VALUES (:disc_title,:disc_year,:disc_picture,:disc_label,:disc_genre,:disc_price, :artist_id)");
    
          $sql->bindParam(':disc_title', $titre);
          $sql->bindParam(':artist_id', $artiste);
          $sql->bindParam(':disc_year', $annee);
          $sql->bindParam(':disc_picture', $file_pic_namenew);
          $sql->bindParam(':disc_label', $label);
          $sql->bindParam(':disc_genre', $genre);
          $sql->bindParam(':disc_price', $prix);
          $sql->execute();
    

    
          echo "Entrée ajoutée dans la table";
          } 
    
    
          catch (Exception $e) {
            echo "Erreur : " . $e->getMessage() . "<br>";
            echo "N° : " . $e->getCode();
            die("Fin du script");
          }
    }
}
