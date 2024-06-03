@extends('admin.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    @if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
                    <div class="logo-container">
                        <img src="assets/logo_har.png" alt="Votre logo">
                    </div>
                    <style>
                        .logo-container {
                            width: 20%; /* Occupe la moitié de la largeur de la page */
                            margin: 0 auto; /* Centre l'image horizontalement */
                            text-align: center; /* Centre l'image horizontalement si la largeur de l'image est inférieure à 50% */
                        }

                        .logo-container img {
                            max-width: 100%; /* Assurez-vous que l'image ne dépasse pas la largeur de son conteneur */
                            height: auto; /* Gardez le rapport hauteur/largeur de l'image */
                        }
                    </style>
                    <center>
                        <div>
                            <a href="{{ route('materiel-enre.create') }}" class="btn btn-primary mb-3">Nouveau Enregistrement</a>
                        </div>
                    </center>
                    <div class="card-header">
                        <center>Cahier de Suivi des Matériels</center>
                    </div>
                    <div class="card-body">
                        <!-- Tableau affichant les enregistrements du cahier de suivi -->
                        <div class="row">
                            @foreach ($materiel_enres as $materiel_enre)
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $materiel_enre->materiel->nom }}</h5>
                                            <div class="text-center mb-3">
                                                <button class="btn btn-primary btn-sm toggle-details" data-target="#details{{ $materiel_enre->id }}">Afficher détails</button>
                                            </div>
                                            <div class="card" id="details{{ $materiel_enre->id }}" style="display: none;">
                                                <div class="card-body">
                                                    <p><strong>Quantité:</strong> {{ $materiel_enre->quantite }}</p>
                                                    <p><strong>Délégue:</strong> {{ $materiel_enre->delegue }}</p>
                                                    <p><strong>Date de Création:</strong> {{ $materiel_enre->created_at }}</p>
                                                    <p><strong>Date de Retour:</strong> {{ $materiel_enre->date_retour }}</p>
                                                    <p><strong>Statut du materiel:</strong> {{ $materiel_enre->statut }}</p>
                                                    <div class="text-center mt-3">
                                                        <form action="{{ route('materiel-enre.finish', $materiel_enre->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary btn-sm">Terminer</button>
                                                        </form>


                                                        <a href="#" class="btn btn-warning btn-sm">Modifier</a>
                                                        <form action="{{ route('materiel-enre.destroy', $materiel_enre->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')">Supprimer</button>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.toggle-details').forEach(function(button) {
            button.addEventListener('click', function() {
                var targetId = this.getAttribute('data-target');
                var target = document.querySelector(targetId);
                if (target.style.display === 'none') {
                    target.style.display = 'block';
                    this.textContent = 'Cacher détails';
                } else {
                    target.style.display = 'none';
                    this.textContent = 'Afficher détails';
                }
            });
        });


    </script>
@endsection
