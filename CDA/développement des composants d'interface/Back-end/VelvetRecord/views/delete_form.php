<?php
$linklist = '../index.php';
$linkadd = 'add_form.php';
include 'header.php';

?>
<?php
$db = new PDO('mysql:host=localhost;charset=utf8;dbname=record', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$requete = $db->prepare("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id WHERE disc_id=?");
$requete->execute(array($_GET["disc_id"]));
$disc = $requete->fetch(PDO::FETCH_OBJ);

?>
<h2>Voulez vous supprimer cet Album ?</h2>

<form method="post" action="delete_script.php">
<input type="hidden" name="disc_id" value="<?= $_GET["disc_id"] ?>" >
<input hidden name="dic_id"><?php $disc->disc_id?></div>
<div class="form-row">
<div class="form-group col-md-6">
    <label for="titre">Titre</label>
    <input type="text"  class="form-control" placeholder="<?= $disc->disc_title ?>" disabled>
</div>
<div class="form-group col-md-6">
    <label for="titre">Artiste</label>
    <input type="text" class="form-control" placeholder="<?= $disc->artist_name ?>" disabled>
</div>
<div class="form-group col-md-6">
    <label for="label">Année</label>
    <input type="text" class="form-control" placeholder="<?= $disc->disc_year ?>" disabled>
</div>
<div class="form-group col-md-6">
    <label for="label">Genre</label>
    <input type="text" class="form-control" placeholder="<?= $disc->disc_genre ?>" disabled>
</div>
<div class="form-group col-md-6">
    <label for="titre">Label</label>
    <input type="text" class="form-control" placeholder="<?= $disc->disc_label ?>" disabled>
</div>
<div class="form-group col-md-6">
    <label for="titre">Prix</label>
    <input type="text" class="form-control" placeholder="<?= $disc->disc_price ?>" disabled>
</div>
<div class="form-group col-md-6">
    <label for="titre">Picture</label>
    <div class="album-img">
        <img class="album_pic" title='photo du disque' alt='photo du disque' src='../assets/img/<?= $disc->disc_picture ?>'>
    </div>
</div>
</div>
<input type="submit" class="btn btn-danger" id="delete" value="Supprimer" name="delete">
<a href="../index.php" class="btn btn-dark">Retour</a>
</form>


<?php

include 'footer.php';
?>