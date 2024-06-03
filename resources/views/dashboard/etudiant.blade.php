@extends('admin.admin')

@section('content')

<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Voici Tous les Programmes dans votre UFR, Mr {{ $user->nom }}</h1>
                <button type="button" class="btn btn-primary" id="showProfile">Profile</button>
            </div>
        </div>
    </div>

    @if ($properties->isEmpty())
        <div class="alert alert-info" role="alert">
            Aucun résultat trouvé pour la recherche : {{ request('query') }}
        </div>
    @endif

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <form class="d-flex" role="search" method="GET" action="{{ route('rechercher')}}">
                <input class="form-control me-2" type="search" name="query" placeholder="Rechercher un programme" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Chercher</button>
            </form>
        </div>
    </nav>

    <div class="row mt-3">
        @foreach ($properties as $property)
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Programme du {{ $property->jour_debut }} au {{ $property->jour_fin }} de <strong>Annee_academique:</strong> {{ $property->annee_academique->annee }}</h5>
                        <button type="button" class="btn btn-primary btn-sm" id="showInfo{{ $property->id }}">Afficher les détails</button>
                        <div id="info{{ $property->id }}" style="display: none;">
                            <p class="card-text">
                                <strong>Heure:</strong> {{ $property->heure_debut }} - {{ $property->heure_fin }} <br>
                                <strong>Enseignant:</strong> Docteur {{ $property->enseignant }} <br>
                                <strong>Module:</strong> {{ $property->module->nom }} <br>
                                <strong>UFR:</strong> {{ $property->ufr->nom }} <br>
                                <strong>Filiere:</strong> {{ $property->filiere->nom }} <br>
                                <strong>Promotion:</strong> {{ $property->promotion->annee }} <br>
                                <strong>Semestre:</strong> {{ $property->semestre->intitule }} <br>
                                <strong>Bâtiment:</strong> {{ $property->batiment->nom }} <br>
                                <strong>Salle:</strong> {{ $property->salle->nom }} <br>
                                @if (strtolower($property->statut) === 'valide')
                                    <strong>Statut:</strong> Validé <i class="bi bi-check-circle-fill text-success"></i>
                                @else
                                    <strong>Statut:</strong> Non valide
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    

    <div class="container mt-3" style="display: none;" id="profileCard">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Vos informations </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->nom }} {{ $user->prenom }}</h5>
                        <p class="card-text">
                            <strong>Email:</strong> {{ $user->email }} <br>
                            <strong>INE:</strong> {{ $user->ine ?? 'Non spécifié' }} <br>
                            <strong>Téléphone:</strong> {{ $user->telephone ?? 'Non spécifié' }} <br>
                        </p>
                        @if($user->image)
                            <img src="{{ asset('storage/profile_images/'.$user->image) }}" alt="Profile Image" width="150">
                        @endif
                        <button type="button" class="btn btn-primary mt-2" id="editProfile">Éditer Profil</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Afficher le profil lorsqu'on clique sur le lien
        document.getElementById("showProfile").addEventListener("click", function(){
            var profileCard = document.getElementById("profileCard");
            if (profileCard.style.display === "none") {
                profileCard.style.display = "block";
            } else {
                profileCard.style.display = "none";
            }
        });

        // Afficher les détails lorsqu'on clique sur le bouton "Afficher les détails"
        @foreach ($properties as $property)
            document.getElementById("showInfo{{ $property->id }}").addEventListener("click", function(){
                var info = document.getElementById("info{{ $property->id }}");
                if (info.style.display === "none") {
                    info.style.display = "block";
                } else {
                    info.style.display = "none";
                }
            });
        @endforeach
    </script>
@endsection
