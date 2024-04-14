<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') administration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
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
    <header id="header" class="row">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <h1><a href="{{ route('connexion.store') }}">UNZ-PEDAGO</a></h1>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
