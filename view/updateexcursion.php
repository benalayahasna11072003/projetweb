<?php
include '../controller/excursionc.php';
include '../model/excursion.php';

$error = "";

// Vérifie si les données POST nécessaires sont présentes
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["selected_excursion_id"])) {
    // Récupérer l'ID de l'excursion sélectionnée à partir des données POST
    $selected_excursion_id = $_POST["selected_excursion_id"];
    
    // Créer une instance du contrôleur d'excursion
    $excursionc = new excursionc();
    // Récupérer les détails de l'excursion sélectionnée
    $excursion = $excursionc->showexcursion($selected_excursion_id);
    
    // Si l'excursion est trouvée, afficher le formulaire de mise à jour
    if ($excursion) {
        // Code HTML pour afficher le formulaire de mise à jour avec les détails de l'excursion
        ?>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>User Display</title>
        </head>
        <body>
            <button><a href="listexcursion.php">Retour à la liste</a></button>
            <hr>

            <form action="updateexcursion.php" method="POST">
                <input type="hidden" name="idexcursion" value="<?= $excursion['id'] ?>">
                <table>
                <tr>
    <td><label for="id">ID :</label></td>
    <td>
        <input type="text" id="id" name="id" value="<?= $excursion['id'] ?>" readonly>
        <!-- Utilisation de readonly pour empêcher la modification de l'ID -->
    </td>
</tr>

                    <!-- Afficher les champs du formulaire -->
                    <tr>
                        <td><label for="nom">Nom :</label></td>
                        <td>
                            <input type="text" id="nom" name="nom" value="<?= $excursion['nom'] ?>" />
                            <span id="erreurNom" style="color: red"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="description">Description :</label></td>
                        <td>
                            <input type="text" id="description" name="description" value="<?= $excursion['description'] ?>" />
                            <span id="erreurdescription" style="color: red"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="date">Date :</label></td>
                        <td>
                            <input type="date" id="date" name="date" value="<?= $excursion['date'] ?>" />
                            <span id="erreudate" style="color: red"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="duree">Durée:</label></td>
                        <td>
                            <input type="number" id="duree" name="duree" value="<?= $excursion['duree'] ?>" />
                            <span id="erreurduree" style="color: red"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="niveaudiff">Niveau de difficulté:</label></td>
                        <td>
                            <input type="text" id="niveaudiff" name="niveaudiff" value="<?= $excursion['niveaudiff'] ?>" />
                            <span id="erreurniveaudiff" style="color: red"></span>
                        </td>
                    </tr>
                    <td>
                        <input type="submit" value="Enregistrer">
                    </td>
                    <td>
                        <input type="reset" value="Réinitialiser">
                    </td>
                </table>
            </form>
        </body>
        </html>
        <?php
    } else {
        // Afficher un message d'erreur si aucune excursion n'est trouvée avec l'ID sélectionné
        $error = "Aucune excursion trouvée avec l'ID sélectionné.";
    }
} else {
    // Afficher un message d'erreur si les données POST nécessaires sont manquantes
    $error = "Les données POST nécessaires sont manquantes.";
}

// Afficher un message d'erreur s'il y a lieu
echo $error;
?><?php
include '../controller/excursionc.php';
include '../model/excursion.php';

$error = "";

// Vérifie si les données POST nécessaires sont présentes
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["selected_excursion_id"])) {
    // Récupérer l'ID de l'excursion sélectionnée à partir des données POST
    $selected_excursion_id = $_POST["selected_excursion_id"];
    
    // Créer une instance du contrôleur d'excursion
    $excursionc = new excursionc();
    // Récupérer les détails de l'excursion sélectionnée
    $excursion = $excursionc->showexcursion($selected_excursion_id);
    
    // Si l'excursion est trouvée, afficher le formulaire de mise à jour
    if ($excursion) {
        // Code HTML pour afficher le formulaire de mise à jour avec les détails de l'excursion
        ?>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>User Display</title>
        </head>
        <body>
            <button><a href="listexcursion.php">Retour à la liste</a></button>
            <hr>

            <form action="updateexcursion.php" method="POST">
                <input type="hidden" name="idexcursion" value="<?= $excursion['id'] ?>">
                <table>
                <tr>
    <td><label for="id">ID :</label></td>
    <td>
        <input type="text" id="id" name="id" value="<?= $excursion['id'] ?>" readonly>
        <!-- Utilisation de readonly pour empêcher la modification de l'ID -->
    </td>
</tr>

                    <!-- Afficher les champs du formulaire -->
                    <tr>
                        <td><label for="nom">Nom :</label></td>
                        <td>
                            <input type="text" id="nom" name="nom" value="<?= $excursion['nom'] ?>" />
                            <span id="erreurNom" style="color: red"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="description">Description :</label></td>
                        <td>
                            <input type="text" id="description" name="description" value="<?= $excursion['description'] ?>" />
                            <span id="erreurdescription" style="color: red"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="date">Date :</label></td>
                        <td>
                            <input type="date" id="date" name="date" value="<?= $excursion['date'] ?>" />
                            <span id="erreudate" style="color: red"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="duree">Durée:</label></td>
                        <td>
                            <input type="number" id="duree" name="duree" value="<?= $excursion['duree'] ?>" />
                            <span id="erreurduree" style="color: red"></span>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="niveaudiff">Niveau de difficulté:</label></td>
                        <td>
                            <input type="text" id="niveaudiff" name="niveaudiff" value="<?= $excursion['niveaudiff'] ?>" />
                            <span id="erreurniveaudiff" style="color: red"></span>
                        </td>
                    </tr>
                    <td>
                        <input type="submit" value="Enregistrer">
                    </td>
                    <td>
                        <input type="reset" value="Réinitialiser">
                    </td>
                </table>
            </form>
        </body>
        </html>
        <?php
    } else {
        // Afficher un message d'erreur si aucune excursion n'est trouvée avec l'ID sélectionné
        $error = "Aucune excursion trouvée avec l'ID sélectionné.";
    }
} else {
    // Afficher un message d'erreur si les données POST nécessaires sont manquantes
    $error = "Les données POST nécessaires sont manquantes.";
}

// Afficher un message d'erreur s'il y a lieu
echo $error;
?>