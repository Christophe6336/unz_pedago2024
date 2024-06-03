

@extends('admin.admin')

@section('content')


<div class="d-flex justify-content-between align-items-center">

    <h1 style="color: green;">Listes des fiches de séances des cours Mr {{ $user->nom }}</h1>
<a href="{{ route('cahiercreat')}}" class="btn btn-primary"> Ajouter</a>
</div>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

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

<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <form class="d-flex" role="search" method="GET" action="{{ route('admin.property.recherche')}}">
        <input class="form-control me-2" type="search" name="query" placeholder="Rechercher un fiche de senace" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Chercher</button>
      </form>
    </div>


    @if ($properties->isEmpty())
    <strong>  Aucun résultat trouvé pour la recherche : {{ request('query') }}</strong>
@endif

  </nav>
  <div class="row mt-3">
    @foreach ($cahiers as $cahier)
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Fiche de seance du cours de {{ $cahier->module->nom }}  du <strong> </strong> {{ $cahier->date }} Annee_Academique {{ $cahier->annee_academique->annee_debut }}-{{ $cahier->annee_academique->annee_fin }} de {{ $cahier->heure_debut }} à  {{ $cahier->heure_fin }} par  {{ $cahier->etudiant->nom }}</h5>
                <button type="button" id="showInfo{{ $cahier->id }}" class="btn btn-primary btn-sm">Afficher les détails</button> <!-- Ajoutez l'attribut id avec la valeur "showInfo" suivi de l'ID du cahier -->
                <div id="info{{ $cahier->id }}" style="display: none;"> <!-- Ajoutez l'attribut id avec la valeur "info" suivi de l'ID du cahier -->
                    <p class="card-text">
                        <strong>CONTENU:</strong> {{ $cahier->contenu }}<br>
                        <strong>STATUT:</strong> {{ $cahier->statut }}<br>
                    </p>
                    <div class="d-flex justify-content-end">
                        @if ($cahier->statut !== 'accepte')
                        <a href="{{ route('cahier.edit', $cahier->id) }}" class="btn btn-primary">EDITER</a>
                        @endif
                        <form action="{{ route('cahier.destroy', $cahier->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">SUPPRIMER</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Sélectionnez tous les boutons avec l'ID qui commence par "showInfo"
        var buttons = document.querySelectorAll("[id^='showInfo']");

        // Ajoutez un écouteur d'événements à chaque bouton
        buttons.forEach(function(button) {
            button.addEventListener("click", function() {
                // Récupérez l'ID unique de l'élément d'information à afficher/cacher
                var infoId = this.getAttribute("id").replace("showInfo", "info");

                // Sélectionnez l'élément d'information correspondant
                var info = document.getElementById(infoId);

                // Vérifiez si l'élément d'information existe
                if (info) {
                    // Toggle display (cacher/afficher)
                    if (info.style.display === "none" || info.style.display === "") {
                        info.style.display = "block";
                    } else {
                        info.style.display = "none";
                    }
                }
            });
        });
    });
</script>


{{$properties->links()}}
@endsection

