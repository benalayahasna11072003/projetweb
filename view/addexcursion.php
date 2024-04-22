<?php

include '../controller/excursionc.php';
include '../model/excursion.php';
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset($_POST["id"]) && !empty($_POST["id"]) &&
        isset($_POST["nom"]) && !empty($_POST["nom"]) &&
        isset($_POST["description"]) && !empty($_POST["description"]) &&
        isset($_POST["date"]) && !empty($_POST["date"]) &&
        isset($_POST["duree"]) && !empty($_POST["duree"]) &&
        isset($_POST["niveaudiff"]) && !empty($_POST["niveaudiff"])
    ) {
        // Crée une instance de l'excursion
        $excursion = new excursion($_POST['id'], $_POST['nom'], $_POST['description'], $_POST['date'], $_POST['duree'], $_POST['niveaudiff']);
        // Crée une instance du contrôleur
        $excursionController = new excursionc();
        // Utilise le contrôleur pour ajouter l'excursion
        $excursionController->addexcursion($excursion);
        header('Location:listexcursion.php');
    } else {
        $error = "Missing information";
    }
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'Excursion</title>
    <script>
        function validateForm() {
            var id = document.getElementById('id').value;
            var nom = document.getElementById('nom').value;
            var description = document.getElementById('description').value;
            var date = document.getElementById('date').value;
            var duree = document.getElementById('duree').value;
            var niveaudiff = document.getElementById('niveaudiff').value;

            if (!/^[a-zA-Z]+$/.test(nom) || nom.length < 3 || nom.trim() === "") {
               alert("Le nom doit contenir uniquement des lettres, sans espaces, doit comporter au moins 3 caractères, et ne doit pas être vide.");
               return false;
            }

           // Vérification que la description contient uniquement des lettres et des espaces, et n'est pas vide
            if (!/^[a-zA-Z\s]+$/.test(description) || description.trim() === "") {
               alert("La description doit contenir uniquement des lettres et des espaces, et ne doit pas être vide.");
                return false;
           }
            if (!date) {
                alert("La date ne doit pas être vide.");
                return false;
            }
            if (!duree || isNaN(duree) || parseInt(duree) <= 0) {
                alert("La durée doit être un nombre positif.");
                return false;
            }
            if (!niveaudiff) {
                alert("Vous devez sélectionner un niveau de difficulté.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <a href="listexcursion.php">Back to list</a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST" onsubmit="return validateForm()">
        <table>
            <tr>
                <td><label for="id">id :</label></td>
                <td>
                    <input type="number" id="id" name="id" />
                    <span id="erreurid" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="description">description :</label></td>
                <td>
                    <input type="text" id="description" name="description" />
                    <span id="erreurdescription" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="date">date :</label></td>
                <td>
                    <input type="date" id="date" name="date" />
                    <span id="erreurdate" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="duree">Durée :</label></td>
                <td>
                    <input type="number" id="duree" name="duree" />
                    <span id="erreurduree" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="niveaudiff">Niveau de Difficulté :</label></td>
                <td>
                    <select id="niveaudiff" name="niveaudiff">
                        <option value="">Sélectionnez un niveau</option>
                        <option value="dur">Dur</option>
                        <option value="facile">Facile</option>
                        <option value="moyenne">Moyenne</option>
                    </select>
                    <span id="erreurniveaudiff" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Save"></td>
                <td><input type="reset" value="Reset"></td>
            </tr>
        </table>
    </form>
</body>
</html>
