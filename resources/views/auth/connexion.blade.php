<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Connexion</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Selecao
  * Template URL: https://bootstrapmade.com/selecao-bootstrap-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center" style="background-image: url('{{ asset('assets/banniere_unz.png') }}')">
    <div class="container d-flex align-items-center justify-content-between">


        <h1 class="btn btn-primary"><a href="{{ route('connexion.store') }}">UNZ-PEDAGO</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->


      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="btn btn-primary " href="{{ route('home') }}">Home</a></li>
          <li><a class="btn btn-primary" href="{{ route('home') }}">INFORMATIONS </a></li>
          <li><a class="btn btn-primary" href="{{ route('home') }}">FONCTIONNALITES</a></li>
          <li><a class="btn btn-primary " href="{{ route('home') }}">CAMPUS</a></li>
          <li><a class="btn btn-primary" href="{{ route('home') }}">Notre equipe</a></li>
          <li><a class="btn btn-primary" href="{{ route('home') }}">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">

         <h1 style="color: green;"> <strong>Bienvenue dans la page de connexion UNZ-PEDAGO  </strong></h1>
          <ol>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- Dans votre fichier de vue de la page de connexion -->
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Logo de votre application -->
<div class="logo-container">
    <img src="assets/logo_unz.jpg" alt="Votre logo">
</div>
<style>.logo-container {
    width: 20%; /* Occupe la moitié de la largeur de la page */
    margin: 0 auto; /* Centre l'image horizontalement */
    text-align: center; /* Centre l'image horizontalement si la largeur de l'image est inférieure à 50% */
}

.logo-container img {
    max-width: 100%; /* Assurez-vous que l'image ne dépasse pas la largeur de son conteneur */
    height: auto; /* Gardez le rapport hauteur/largeur de l'image */
}
</style>
    <section class="inner-page">
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
        <p>
            <form action="{{ route('login') }}" method="POST">

                @csrf
            <div class="container">
                 <div class="card">
                     <div class="row g-0">
                 <div class="col-md-6">
                    <div class="h-100 d-flex justify-content-center align-items-center">
                     <div class="py-4 px-3"> <h4>Entrez vos cordonnees</h4>
                         <div class="row g-2 mt-1"> <div class="col-md-6">

                         </div>
                          <div class="col-md-6">
                            </div>

                         </div>
                         <div class="row mt-2">
                                         <div class="col-md-12">
                                            <div class="input-field">
                                            <label for="email">Email</label>
                                            <input class="form-control" id="input3" name="email" required>
                                             </div> </div> </div>
                                            <div class="row mt-2 mb-2"> <div class="col-md-12">
                                                <div class="input-field"> <label for="password">Password</label> <input class="form-control" id="input4" name="password" required>

                                                </div>
                                             </div>
                                             </div>
                                                 <div class="row mt-2"> <div class="col-md-12">
                                                    <div class="col-12">
                                                        <div class="form-check">
                                                          <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                                                          <label class="form-check-label" for="inlineFormCheck">
                                                            Se Souvenir de moi
                                                          </label>
                                                        </div>
                                                      </div>

                                                    <button type="submit" class="btn btn-primary w-100 signup-button">CONNEXION</button>
                                                </div>
                                            </div>
                                            <div class="container">
                                             <div class="member mb-3"> <span>Vous n'avez pas de compte?</span>
                                                     <a class="text-decoration-none" href="{{ route('inscription') }}">INSCRIPTION</a> </div> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                <div class="col-md-6">

                                                    <div class="right-side-content">

        </div>
        </p>
      </div>
    </div>
</div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>UNZ</h3>
      <p>Merci pour votre aimanbilité</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Université Norbert ZONGO</span></strong>.Tous droit réservés
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/selecao-bootstrap-template/ -->
        Site Officielle <a href="https://bootstrapmade.com/">UNZ</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
