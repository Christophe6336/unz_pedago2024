@extends('admin.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="logo-container">
                        <img src="assets/logo_har.png" alt="Votre logo">
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
                    <center>
                    <div>
                    <a href="{{ route('materiels.create') }}" class="btn btn-primary mb-3">Créer un Matériel</a>
                    <a href="{{ route('materiel_enre.index') }}" class="btn btn-secondary mb-3">Suivi du Matériel</a>
                </div>
            </center>
                    <div class="card-header">Liste des Matériaux</div>
                    <div class="card-body">

                        @foreach ($materiel as $m)
                            <div class="card mb-3">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title">{{ $m->nom }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted"> <strong>{{ $m->type }}</strong></h6>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary btn-sm toggle-details" data-target="#details{{ $m->id }}">Afficher détails</button>
                                    </div>
                                </div>
                                <div class="card-body" id="details{{ $m->id }}" style="display: none;">
                                    <img src="{{ asset('storage/app/images' . $m->image) }}" alt="Image du matériel">


                                    <p class="card-text"> <strong>Description:</strong>{{ $m->description }}</p>
                                    <p class="card-text"> <strong>Quantité :</strong> {{ $m->quantite }}</p>

                                    <a href="{{ route('materials.edit', $m->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    <form action="{{ route('materials.destroy', $m->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce matériel ?')">Supprimer</button>
                                    </form>
                                    <button class="btn btn-secondary btn-sm toggle-details" data-target="#details{{ $m->id }}">Cacher détails</button>
                                </div>
                            </div>
                        @endforeach
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
