<?php
include '../controller/excursionc.php';
include '../model/excursion.php';

$excursionCtrl = new excursionc();

// Vérifie si l'ID est valide et non vide
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = intval($_GET["id"]);
    // Appel de la méthode de suppression avec l'ID
    $excursionCtrl->deleteexcursion($id);
    // Redirection vers la liste des excursions
    header('Location: listexcursion.php');
    exit; // Assure que le script se termine ici
} else {
    echo "ID invalide ou non fourni.";
}
?>
