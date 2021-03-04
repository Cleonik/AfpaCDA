<?php
$linklist='index.php';
$linkadd='views/add_form.php';
$jslink = '';
include 'views/header.php';

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
<div class="container-fluid justify-content-between col-11 mt-2">
    <div class="row col-xs-6">
        <?php $rimg = $db->query("SELECT * FROM record.disc  
        JOIN record.artist
        ON record.disc.artist_id=record.artist.artist_id
        ORDER BY disc_id");
        $tableau = $rimg->fetchAll(PDO::FETCH_OBJ);
        $rimg->closeCursor();
        foreach ($tableau as $rBDD) : ?>
            <div class="card col-lg-2 col-md-3 col-xs-6 col-sm-6 m-2" style="width: 18rem;">
             <img src="assets/IMG/<?= $rBDD->disc_picture ?>" class="card-img-top" alt="<?= $rBDD->disc_picture ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $rBDD->disc_title ?></h5>
                    <p class="card-text"><?= $rBDD->artist_name ?></p>
                    <p class="card-text"><?= $rBDD->disc_label ?></p>
                    <p class="card-text"><?= $rBDD->disc_year ?></p>
                    <p class="card-text"><?= $rBDD->disc_genre ?></p>
                    <p class="card-text"><?= $rBDD->disc_price ?>$</p>
                    <a href="views/details.php?disc_id=<?= $rBDD->disc_id ?>" class="btn btn-primary">Détail</a>
                    <a href="views/update_form.php?disc_id=<?= $rBDD->disc_id ?>" class="btn btn-primary">Modifier</a>
                    <a href="views/delete_form.php?disc_id=<?= $rBDD->disc_id ?>" class="btn btn-primary">Supprimer</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include 'views/footer.php';?>