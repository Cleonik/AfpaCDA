<?php
$linklist = '../index.php';
$linkadd = 'add_form.php';
$jslink = '../assets/JS/script.js';
include 'header.php';
?>


<?php
$db = new PDO('mysql:host=localhost;charset=utf8;dbname=record', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$requete = $db->prepare("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id WHERE disc_id=?");
$requete->execute(array($_GET["disc_id"]));
$disc = $requete->fetch(PDO::FETCH_OBJ);

?>

<form method="GET">
    <input type="hidden" name="disc_id" value="<?= $_GET["disc_id"] ?>">
    <div class="form-row">
        <div class="form-group col-md-6">
            <?php
            if (isset($_POST['Ajouter']) && count($formError) === 0) {
            ?>
                <p>Formulaire envoyé !!</p>
                <a href="../index.php" class="btn btn-primary">Retour à l'accueil</a>
            <?php
            } else {
            ?>
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" placeholder="<?= $disc->disc_title ?>" value=" <?= (isset($_POST['titre'])) ? $_POST['titre'] : '' ?>">
                <?php if (isset($formError['titre'])) {
                ?>
                    <span id=""><?= $formError['titre'] ?></span>
                <?php
                }
                ?>
        </div>
        <div class="form-group col-md-6">
            <label for="titre">Artiste</label>
            <input type="text" class="form-control" id="artist" name="artist" placeholder="<?= $disc->artist_name ?>" value="<?= (isset($_POST['artist'])) ? $_POST['artist'] : '' ?>">

            <?php if (isset($formError['artist'])) {
            ?>
                <span class=""><?= $formError['artist'] ?></span>
            <?php
                }
            ?>
        </div>
        <div class="form-group col-md-6">
            <label for="label">Année</label>
            <input type="text" class="form-control" id="year" name="year" placeholder="<?= $disc->disc_year ?>" value="<?= (isset($_POST['year'])) ? $_POST['year'] : '' ?>">

            <?php if (isset($formError['year'])) {
            ?>
                <span class=""><?= $formError['year'] ?></span>
            <?php
                }
            ?>
        </div>
        <div class="form-group col-md-6">
            <label for="label">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" placeholder="<?= $disc->disc_genre ?>" value="<?= (isset($_POST['genre'])) ? $_POST['genre'] : '' ?>">

            <?php if (isset($formError['genre'])) {
            ?>
                <span class=""><?= $formError['genre'] ?></span>
            <?php
                }
            ?>
        </div>
        <div class="form-group col-md-6">
            <label for="titre">Label</label>
            <input type="text" class="form-control" id="label" name="label" placeholder="<?= $disc->disc_label ?>" value="<?= (isset($_POST['label'])) ? $_POST['label'] : '' ?>">

            <?php if (isset($formError['label'])) {
            ?>
                <span class=""><?= $formError['label'] ?></span>
            <?php
                }
            ?>
        </div>
        <div class="form-group col-md-6">
            <label for="titre">Prix</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="<?= $disc->disc_price ?>" alue="<?= (isset($_POST['price'])) ? $_POST['price'] : '' ?>">

            <?php if (isset($formError['price'])) {
            ?>
                <span class=""><?= $formError['price'] ?></span>
            <?php
                }
            ?>
        </div>
        <div class="form-group col-md-6">
            <label for="titre">Picture</label>
            <div class="album-img">
                <img class="album_pic" title='photo du disque' alt='photo du disque' src='../assets/img/<?= $disc->disc_picture ?>'>
                <input type="file" id="img" name="img" accept="image/png, image/jpeg, image/jpg">
                <?php if (isset($formError['img'])) {
                ?>
                    <span class=""><?= $formError['img'] ?></span>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <a href="update_form.php?disc_id=<?= $disc->disc_id ?>"><button type="button" class="btn btn-success">Modifier</button></a>
    <a href="../index.php" class="btn btn-dark">Retour</a>
</form>
<?php
            }
?>

<?php
include 'footer.php';
?>