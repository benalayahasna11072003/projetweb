<?php

include '../controller/excursionc.php';
include '../model/excursion.php';
$excursionCtrl = new excursionc();
$excursions = $excursionCtrl->listexcursion()->fetchAll();
?>
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
<body>
<?php include_once '../header.php'; ?>
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