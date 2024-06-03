

@extends('admin.admin')

@section('content')

<a href="{{ route('admin.property.index') }}" class="btn btn-secondary">Retour</a>

<div class="d-flex justify-content-between align-items-center">
    <h1>Listes des fiches de seances des cours Mr {{ $user->nom}} </h1>

</div>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <form class="d-flex" role="search" method="GET" action="{{ route('admin.property.recherche')}}">
        <input class="form-control me-2" type="search" name="query" placeholder="Rechercher un fiche de senace" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Chercher</button>
      </form>
    </div>


    @if ($cahiers->isEmpty())
    <strong>  Aucun résultat trouvé pour la recherche : {{ request('query') }}</strong>
@endif

  </nav>
  @foreach ($cahiers as $cahier)
<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title">Fiche de séance de {{ $cahier->module->nom }}  du {{ $cahier->date }} de <br>l Annee_Academique {{ $cahier->annee_academique->annee_debut }}-{{ $cahier->annee_academique->annee_fin }}  de {{ $cahier->heure_debut }} à  {{ $cahier->heure_fin }} par  {{ $cahier->etudiant->nom }}</h5>
        <button type="button" id="showInfo{{ $cahier->id }}" class="btn btn-primary btn-sm">Afficher les détails</button>
        <div id="info{{ $cahier->id }}" style="display: none;">
            <p>
                <strong>CONTENU:</strong> {{ $cahier->contenu }}<br>
                <strong>STATUT:</strong> {{ $cahier->statut }}<br>
            </p>
            <div class="d-flex justify-content-end">
                @if ($cahier->statut !== 'accepte')
                <form action="{{ route('valider_cahier', $cahier->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success">VALIDER</button>
                </form>
                @endif
                @if ($cahier->statut !== 'accepte')
                <a href="{{ route('editer_cahier', $cahier->id) }}" class="btn btn-primary">ÉDITER</a>
                @endif
                <form action="{{ route('rejeter_cahier', $cahier->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">SUPPRIMER</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

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

@endsection

