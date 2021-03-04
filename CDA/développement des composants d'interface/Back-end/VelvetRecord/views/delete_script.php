<?php

try {
    $db = new PDO("mysql:host=localhost;charset=utf8;dbname=record", "root", "");

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die('Fin du script');
}
?>

<?php 
header('Location: http://localhost:8080/VelvetRecord/index.php');

$disc_id= $_POST["disc_id"];
$query = 'DELETE FROM disc WHERE disc_id = :disc_id';
        $result = $db->prepare($query);
        $result->bindValue(':disc_id', $disc_id, PDO::PARAM_INT);
        return $result->execute();
        exit;  
?>
