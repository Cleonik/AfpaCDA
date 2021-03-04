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

<div class="container-fluid col-12">
<h1>Détails</h1>
<div class="row col-12">
<div class="col-4 mb-2">
<img class="img img-fluid" width="500px" title='photo du disque' alt='photo du disque' src='../assets/img/<?= $disc->disc_picture ?>'>
</div>
<div class="col-8">
<p>Titre de l'Album : <?= $disc->disc_title ?></p>
<p>Artiste : <?= $disc->artist_name ?></p>
<p>Année : <?= $disc->disc_year ?></p>
<p>Genre de musique : <?= $disc->disc_genre ?></p>
<p>Label du disque : <?= $disc->disc_label ?></p>
<p>Prix du disque en Dollars : <?= $disc->disc_price ?>$</p>
<p></p>
</div>
</div>
<a href="update_form.php?disc_id=<?= $disc->disc_id ?>"><button type="button" class="btn btn-primary">Modifier</button></a>
<a href="delete_form.php?disc_id=<?= $disc->disc_id ?>"><button type="button" class="btn btn-danger">Supprimer</button></a>
<a href="../index.php" class="btn btn-dark">Retour</a>
</div>


<?php
include 'footer.php';
?>
