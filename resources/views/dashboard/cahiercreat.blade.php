@extends('admin.admin')

@section('content')
<div class="card">

        <div class="logo-container">
            <img src="assets/logo_har.png" alt="Votre logo">
        </div>
        <style>.logo-container {
            width: 10%; /* Occupe la moitié de la largeur de la page */
            margin: 0 auto; /* Centre l'image horizontalement */
            text-align: center; /* Centre l'image horizontalement si la largeur de l'image est inférieure à 50% */
        }

        .logo-container img {
            max-width: 100%; /* Assurez-vous que l'image ne dépasse pas la largeur de son conteneur */
            height: auto; /* Gardez le rapport hauteur/largeur de l'image */
        }
        </style>
         <div class="card-header">
        <h3 class="card-title">Créer une nouvelle fiche de séance</h3>
    </div>
    <div class="card-body">
        <form action="{{route('creer_fiche_seance')}}" method="POST">
            @csrf

                <label for="annee_academique_id" class="col-sm-3 col-form-label">Année académique</label>
                <div class="col-sm-9">
                    <select id="annee_academique_id" name="annee_academique_id" class="form-control">
                        @foreach($annee_academiques as $annee_academique)
                            <option value="{{ $annee_academique->id }}">
                                {{ $annee_academique->annee_debut }} - {{ $annee_academique->annee_fin }}
                            </option>
                        @endforeach
                    </select>
                </div>

            <div class="mb-3">
                <label for="date" class="form-label">DATE</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="mb-3">
                <label for="heure_debut" class="form-label">HEURE DEBUT</label>
                <input type="time" class="form-control" id="heure_debut" name="heure_debut">
            </div>
            <div class="mb-3">
                <label for="heure_fin" class="form-label">HEURE FIN</label>
                <input type="time" class="form-control" id="heure_fin" name="heure_fin">
            </div>
            <div class="mb-3">
                <label for="contenu" class="form-label">CONTENU</label>
                <textarea class="form-control" id="contenu" name="contenu" rows="3"></textarea>
            </div>


            <div class="mb-3">
                <label for="module_id" class="form-label">Module</label>
                <select class="form-select" id="module_id" name="module_id">
                    <option value="">Sélectionnez un module</option>
                    @foreach($modules as $module)
                        <option value="{{ $module->id }}">{{ $module->nom }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="etudiant_id" class="form-label">ID de l'étudiant</label>
                <input type="text" class="form-control" id="etudiant_id" name="etudiant_id" value="{{ $user->nom }}" readonly>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Créer</button>
            </div>
        </form>
    </div>
</div>
@endsection
