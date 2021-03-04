<?php
$linklist = '../index.php';
$linkadd = 'add_form.php';
$jslink = '../assets/JS/script.js';
include 'header.php';
include 'add_script.php';
?>
<?php
$db = new PDO('mysql:host=localhost;dbname=record;charset=utf8', 'root', '');
try {
    $db = new PDO("mysql:host=localhost;charset=utf8;dbname=record", "root", "");

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die('Fin du script');
}
?>

<div class="container col-12 mt-2 d-flex flex-column">
    <div class="row">
        <div class="col">
            <?php
            if (isset($_POST['Ajouter']) && count($formError) === 0) {
            ?>
                <p>Nouveau disque Ajouter</p>
                <pre><?php  echo $disc_picture;?></pre>
                <a href="../index.php" class="btn btn-primary">Retour à l'accueil</a>
            <?php
            } else {
            ?>
                <form action="#" method="POST" id="ajouter_album" name="add_album" enctype="multipart/form-data">
                    <label for="titre" class="form-label col-2">Titre de l'album</label>
                    <input type="text" class="col-10" id="titre" name="titre" placeholder="Titre de l'album" value="<?= (isset($_POST['titre'])) ? $_POST['titre'] : '' ?>">
                    <?php if (isset($formError['titre'])) {
                    ?>
                        <span id=""><?= $formError['titre'] ?></span>
                    <?php
                    }
                    ?>
                    <span id="error1"></span>
                    <br>
                    <label for="artist" class="form-label col-2">Artiste</label>
                    <select id="artist" name="artist" class="col-10" size="1">
                    <option value="">-</option>
                        <?php $rimg = $db->query("SELECT * FROM artist  
                    ORDER BY artist_id");
                        $tableau = $rimg->fetchAll(PDO::FETCH_OBJ);
                        $rimg->closeCursor();
                        foreach ($tableau as $rBDD) : ?>
                            <option value="<?= $rBDD->artist_id ?>"><?= $rBDD->artist_name ?></option>
                        <?php endforeach; ?>
                        </select>
                        <?php if (isset($formError['artist'])) {
                        ?>
                            <span class=""><?= $formError['artist'] ?></span>
                        <?php
                        }
                        ?>
                        <br>


                        <label for="year" class="form-label col-3">Année</label>
                        <input type="text" class="col-10" id="years" name="years" placeholder="Année" value="<?= (isset($_POST['years'])) ? $_POST['years'] : '' ?>">

                        <?php if (isset($formError['years'])) {
                        ?>
                            <span class=""><?= $formError['years'] ?></span>
                        <?php
                        }
                        ?>

                        <span id="error3"></span><br>
                        <label for="genre" class="form-label col-2">Genre</label>
                        <input type="text" class="col-10" id="genre" name="genre" placeholder="Genre" value="<?= (isset($_POST['genre'])) ? $_POST['genre'] : '' ?>">

                        <?php if (isset($formError['genre'])) {
                        ?>
                            <span class=""><?= $formError['genre'] ?></span>
                        <?php
                        }
                        ?>

                        <span id="error4"></span><br>
                        <label for="label" class="form-label col-2">Label</label>
                        <input type="text" class="col-10" id="label" name="label" placeholder="Label" value="<?= (isset($_POST['label'])) ? $_POST['label'] : '' ?>">

                        <?php if (isset($formError['label'])) {
                        ?>
                            <span class=""><?= $formError['label'] ?></span>
                        <?php
                        }
                        ?>

                        <span id="error5"></span><br>
                        <label for="price" class="form-label col-2">Prix en Dollars</label>
                        <input type="text" class="col-10" name="price" id="price" placeholder="Prix" value="<?= (isset($_POST['price'])) ? $_POST['price'] : '' ?>">

                        <?php if (isset($formError['price'])) {
                        ?>
                            <span class=""><?= $formError['price'] ?></span>
                        <?php
                        }
                        ?>

                        <span id="error6"></span><br>
                        <label for="img" class="form-label col-2">Joindre une photo de l'album</label>
                        <input type="file" id="img" name="img" accept="image/png, image/jpeg, image/jpg">
                        <?php if (isset($formError['img'])) {
                        ?>
                            <span class=""><?= $formError['img'] ?></span>
                        <?php
                        }
                        ?>
                        
                        <br>
                        <input class="btn btn-dark col-12" type="submit" value="submit" id="add_album" name="Ajouter">

                </form>
            <?php
            }
            ?>
        </div>
    </div>
</div>


<?php

include 'footer.php';

?>