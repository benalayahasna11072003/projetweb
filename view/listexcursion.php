<?php
include '../controller/excursionc.php';
include '../model/excursion.php';

$excursionCtrl = new excursionc();
$excursions = $excursionCtrl->listexcursion()->fetchAll();
?>

<center>
    <h1>Liste des Excursions</h1>
    <h2>
        <a href="addexcursion.php">Ajouter Excursion</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Date</th>
        <th>Description</th>
        <th>Durée</th>
        <th>Niveau Difficulté</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>

    <?php foreach ($excursions as $excursion): ?>
        <tr>
            <td><?= $excursion['id']; ?></td>
            <td><?= $excursion['nom']; ?></td>
            <td><?= $excursion['date']; ?></td>
            <td><?= $excursion['description']; ?></td>
            <td><?= $excursion['duree']; ?></td>
            <td><?= $excursion['niveaudiff']; ?></td>
            <td align="center">
            <form method="POST" action="updateexcursion.php">
    <label for="selected_excursion_id">Sélectionnez une excursion à modifier :</label>
    <select name="selected_excursion_id" id="selected_excursion_id">
        <?php foreach ($excursions as $excursion): ?>
            <option value="<?= $excursion['id']; ?>"><?= $excursion['nom']; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Modifier">
</form>
            </td>
            <td>
                <a href="deleteexcursion.php?id=<?= $excursion['id']; ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>