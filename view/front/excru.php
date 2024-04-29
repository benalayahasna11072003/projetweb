<?php
require_once("../../controller/excursionc.php");
require_once("../../model/excursion.php");

// Create an instance of the controller
$excursionC = new excursionc();
$c = null;

if (
    isset($_POST['nom']) &&
    isset($_POST['email']) &&
    isset($_POST['date_d']) &&
    isset($_POST['date_f']) &&
    isset($_GET['ids'])
) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["date_d"]) &&
        !empty($_POST["date_f"]) &&
        !empty($_GET["ids"])
    ) {
        // Create a new instance of the excursion class
        $c = new excursion(
            null,
            $_POST['nom'],
            $_POST['email'],
            $_POST['date_d'],
            $_POST['date_f'],
            $_GET['ids']
        );
        try {
            // Attempt to add the excursion
            $excursionC->addexcursion($c);
            // Redirect user to another page after successful submission
            header('Location: front.php');
            exit(); // Make sure no other output is sent
        } catch (PDOException $e) {
            // Handle database-related exceptions
            echo "Database Error: " . $e->getMessage();
            // Log the error for debugging purposes
        } catch (Exception $e) {
            // Handle other exceptions
            echo "Error: " . $e->getMessage();
            // Log the error for debugging purposes
        }
    } else {
        // Handle case when required fields are missing
        echo "All fields are required."; // Or provide more specific feedback
    }
}
?>











<html lang="en"><head>
    <meta charset="utf-8">
    <title>ExploreMore</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="dated">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&amp;family=Nunito:wght@600;700;800&amp;display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>123 Street, Tunisia, Ghazela</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+216 56637981</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>ExploreMore@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0 sticky-top shadow-sm">
            <a href="" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>ExploreMore</h1>
                <!-- <img src="img/logo.png" alt="Logo"> -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.html" class="nav-item nav-link">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="service.html" class="nav-item nav-link">Services</a>
                    <a href="excursion.html" class="nav-item nav-link active">excursion</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="inconnu.html" class="dropdown-item">inconnu</a>
                            <a href="booking.html" class="dropdown-item">Booking</a>
                            <a href="inconnu2.html" class="dropdown-item">inconnu2</a>
                            <a href="testimonial.html" class="dropdown-item">review</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
                <a href="" class="btn btn-primary rounded-pill py-2 px-4">Register</a>
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown">excursion</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">excursions</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->


    <!-- Package Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <h6 class="section-title bg-white text-center text-primary px-3">excursions</h6>
                <h1 class="mb-5">Awesome excursions</h1>
            </div>
            
        </div>
    </div>
    <!-- Package End -->


    <!-- Booking Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
        <div class="container">
            <div class="booking p-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-6 text-white">
                        <h6 class="text-white text-uppercase"></h6>
                        <h1 class="text-white mb-4">Excruse en ligne </h1>
                       

                    </div>
                    <div class="col-md-6">
                        <h1 class="text-white mb-4">Book A Tour</h1>
                        <form action="" method="POST">
    <div class="row g-3">
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" class="form-control bg-transparent" id="name" placeholder="Nom" name="nom">
                <label for="name">Nom</label>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" class="form-control bg-transparent" id="email" placeholder="Email" name="email">
                <label for="email">Email</label>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-floating">
                <input type="date" class="form-control bg-transparent" id="date_d" placeholder="Date de départ" name="date_d">
                <label for="date_d">Date de départ</label>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-floating">
                <input type="date" class="form-control bg-transparent" id="date_f" placeholder="Date fin" name="date_f">
                <label for="date_f">Date fin</label>
            </div>
        </div>
        
        <div class="col-md-6 text-white">
            <button type="submit" class="btn btn-outline-light py-3 px-5 mt-2" value="save">Excuse</button>
        </div>
    </div>
</form>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking Start -->


    <!-- Process Start -->
    
    <!-- Process Start -->
        

    <!-- Footer Start -->
    
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top" style=""><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="controle_saisie.js"></script>


</body></html>