<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') administration</title>
    <!-- Bootstrap CSS -->
<!-- plugins:css -->


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
<link rel="stylesheet" href="assets_private/vendors/mdi/css/materialdesignicons.min.css" />
<link rel="stylesheet" href="assets_private/vendors/base/vendor.bundle.base.css" />
<!-- endinject -->
<!-- plugin css for this page -->

<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="assets_private/css/style.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- Custom CSS  -->

    <style>
        /* Header CSS */
        #header {
            background-color: #0d00ff;
            color: #fff;
            padding: 20px 0;
        }

        #header .logo h1 a {
            background-color: #08c4505f;
            color: #f4fbf6fc;
            font-size: 24px;
            font-weight: 700;
            text-decoration: none;
        }

        #header .navbar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #header .navbar ul li {
            display: inline-block;
            margin-left: 20px;
        }

        #header .navbar ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: 0.3s;
        }

        #header .navbar ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        @media (max-width: 768px) {
            #header .navbar ul li {
                display: block;
                margin: 10px 0;
            }
        }


    </style>
</head>

<body>

    <!-- Header -->
    <header id="header" class="row" style="background-image: url('{{ asset('assets/banniere_unz.png') }}');">
        <div class="container d-flex justify-content-between">

            <div class="logo">



                    <h1><a href="{{ route('connexion.store') }} " class="btn btn-success"> UNZ-PEDAGO </a></h1>






                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="btn btn-success" href="#">{{ $user->nom}} </a></li>
                    <li><a href="{{ route('connexion')}}" class="btn btn-danger">Deconnexion</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <div class="container mt-5">
        @yield('content')
    </div>

    <!-- Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.13/index.min.js"></script>

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
  <style>.logo-contain {
    width: 35%; /* Occupe la moitié de la largeur de la page */
    margin: 0 auto; /* Centre l'image horizontalement */
    text-align: center; /* Centre l'image horizontalement si la largeur de l'image est inférieure à 50% */
}

.logo-contain img {
    max-width: 30%; /* Assurez-vous que l'image ne dépasse pas la largeur de son conteneur */
    height: auto; /* Gardez le rapport hauteur/largeur de l'image */
}
</style>
</body>

</html>
