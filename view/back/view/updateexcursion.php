<!-- Add the necessary CSS stylesheets -->
<link rel="stylesheet" href="../vendors/feather/feather.css">
<link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
<link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
<link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
<link rel="stylesheet" href="../css/vertical-layout-light/style.css">
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Explore More Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/Explore-more-mini.png" />
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Explore More Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/Explore-more-mini.png" />
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="../images/favicon.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../images/Explore-more-mini.png" alt="logo"/></a>
      </div>
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
            </a>

                  </div>
                  
</head>

<?php
include '../controller/excursionc.php';
include '../model/excursion.php';

$error = "";

// Handle form submission for updating excursion
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["update"])) {
    // Retrieve updated values from POST data
    $id = $_POST['idexcursion'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $duree = $_POST['duree'];
    $niveaudiff = $_POST['niveaudiff'];

    // Create updated excursion object
    //$updatedExcursion = new excursion($id, $nom, $description, $date, $duree, $niveaudiff);

    // Create excursion controller instance
    $excursionc = new excursionc();

    // Update excursion in the database
    $result = $excursionc->updateexcursion($id,$nom,$description,$date,$duree,$niveaudiff);

    if ($result) {
        echo "Excursion mise à jour avec succès.";
        // Optionally redirect to the list of excursions
        // header("Location: listexcursion.php");
        // exit();
    } 

// Handle initial form display based on selected excursion
} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["selected_excursion_id"])) {
    // Retrieve excursion ID from POST data
    $selected_excursion_id = $_POST["selected_excursion_id"];

    // Create excursion controller instance
    $excursionc = new excursionc();

    // Get excursion details
    $excursion = $excursionc->showexcursion($selected_excursion_id);

    // Display update form if excursion is found
    if ($excursion) {
        ?>

        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>User Display</title>
            <?php include_once '../header.php'; ?>
        </head>
        <body>
            <center>
            <button><a href="listexcursion.php">Retour à la liste</a></button>
            <hr>

            <form action="updateexcursion.php" method="POST">
                <input type="hidden" name="idexcursion" value="<?= $excursion['id'] ?>">
                <input type="hidden" name="update" value="1"> <!-- Hidden field to indicate update -->
                <table>
                    <tr>
                        <td><label for="id">ID :</label></td>
                        <td>
                            <input type="text" id="id" name="id" value="<?= $excursion['id'] ?>" readonly>
                        </td>
                    </tr>
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
                        <input type="submit" value="Enregistrer" >

                            
                        
                        
                    </td>
                    <td>
                        <input type="reset" value="Réinitialiser">
                    </td>
                </table>
            </form>
            <center>
        </body>
        </html>
        <?php
    } else {
        $error = "Aucune excursion trouvée avec l'ID sélectionné.";
    }

} else {
    $error = "Les données POST nécessaires sont manquantes.";
}

// Display error message if any
echo $error;




