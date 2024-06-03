@extends('admin.admin')

@section('title', $property->exists ? "Éditer" : "Créer")

@section('content')

<div class="col-md-6">

            </div>
            <h1 class="text-center" style="color: green;">PLANNIFIER VOTRE COURS Dr {{ $user->nom}} </h1>


    <a href="{{ route('admin.property.index') }}" class="btn btn-secondary"> Retour</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-5">
        <form action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="POST" id="propertyForm">
            @csrf
            @method($property->exists ? 'put' : 'post')


<section class="inner-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <!-- Logo de votre application -->

 <div class="logo-containe">
    <img src="{{ asset('assets/img/logo_unz.jpg') }}" alt="Votre logo">

</div>
            <!-- Champs Module -->
            <div class="form-group row">
                <label for="module" class="col-sm-3 col-form-label">Module</label>
                <div class="col-sm-9">
                    <select class="form-control" id="module" name="module_id">
                        @foreach ($user->modules as $module)
                            <option value="{{ $module->id }}">{{ $module->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
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
            </div>


            <!-- Champs Enseignant -->
            <div class="form-group row">
                <label for="enseignant" class="col-sm-3 col-form-label">ENSEIGNANT</label>
                <div class="col-sm-9">
                    <input type="text" id="enseignant" name="enseignant" class="form-control" value="{{ $user->nom }}" readonly>

                </div>

            </div>

            <!-- Champs UFR -->
           <!-- Champs UFR -->
<div class="form-group row">
    <label for="ufr" class="col-sm-3 col-form-label">UFR</label>
    <div class="col-sm-9">
        <select id="ufr" name="ufr_id" class="form-control">
            @foreach($ufrs as $ufr)
                <option value="{{ $ufr->id }}">{{ $ufr->nom }}</option>
            @endforeach
        </select>
    </div>
</div>


          <!-- Champs Filière -->
          <div class="form-group row">
            <label for="filiere" class="col-sm-3 col-form-label">FILIERE</label>
            <div class="col-sm-9">
                <select id="filiere" name="filiere_id" class="form-control">
                    @foreach($filieres as $filiere)
                        <option value="{{ $filiere->id }}">{{ $filiere->nom }}</option>
                    @endforeach
                </select>
            </div>
        </div>



          <!-- Champs Promotion -->
<div class="form-group row">
    <label for="promotion" class="col-sm-3 col-form-label">PROMOTION</label>
    <div class="col-sm-9">
        <select id="promotion" name="promotion_id" class="form-control">
            @foreach($promotions as $promotion)
                <option value="{{ $promotion->id }}">{{ $promotion->annee }}</option>
            @endforeach
        </select>
    </div>
</div>


            <!-- Champs Semestre -->
            <div class="form-group row">
                <label for="semestre" class="col-sm-3 col-form-label">SEMESTRES</label>
                <div class="col-sm-9">
                    <select id="semestre" name="semestre_id" class="form-control">
                        @foreach($semestres as $semestre)
                            <option value="{{ $semestre->id }}">{{ $semestre->intitule }}</option>
                        @endforeach
                    </select>
                </div>
            </div>




            <!-- Champs Lieu -->


           <!-- Votre code HTML existant pour le champ de sélection du bâtiment -->
           <div class="form-group row">
            <label for="batiment" class="col-sm-3 col-form-label">Bâtiment</label>
            <div class="col-sm-9">
                <select id="batiment" name="batiment_id" class="form-control">
                    <!-- Options du champ de sélection du bâtiment -->
                    @foreach($batiments as $batiment)
                        <option value="{{ $batiment->id }}">{{ $batiment->nom }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="salle" class="col-sm-3 col-form-label">Salle</label>
            <div class="col-sm-9">
                <select id="salle" name="salle_id" class="form-control">
                    @foreach($salles as $salle)
                        <option value="{{ $salle->id }}">{{ $salle->nom }}</option>
                    @endforeach
                </select>
            </div>
        </div>
            <!-- Champs Jour Debut et Jour Fin -->
            <div class="form-group row">
                <label for="jour_debut" class="col-sm-3 col-form-label">Jour Début</label>
                <div class="col-sm-3">
                    <input type="date" id="jour_debut" name="jour_debut" class="form-control" value="{{ $property->jour_debut }}">
                    @error('jour_debut')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <label for="jour_fin" class="col-sm-3 col-form-label">Jour Fin</label>
                <div class="col-sm-3">
                    <input type="date" id="jour_fin" name="jour_fin" class="form-control" value="{{ $property->jour_fin }}">
                    @error('jour_fin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            </div>

            <!-- Champs Heure Debut et Heure Fin -->
            <div class="form-group row">
                <label for="heure_debut" class="col-sm-3 col-form-label">Heure Début</label>
                <div class="col-sm-3">
                    <input type="time" id="heure_debut" name="heure_debut" class="form-control" value="{{ $property->heure_debut }}">
                    @error('heure_debut')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <label for="heure_fin" class="col-sm-3 col-form-label">Heure Fin</label>
                <div class="col-sm-3">
                    <input type="time" id="heure_fin" name="heure_fin" class="form-control" value="{{ $property->heure_fin }}">
                    @error('heure_fin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
            </div>
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <input type="hidden" for="telegram_id" name="telegram_id" value="{{ $user->telegram_id }}">



            <!-- Bouton de soumission -->
            <div class="text-center">
                <button class="btn btn-primary">
                    @if ($property->exists)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
</section>
<style>.logo-containe {
    width: 40%; /* Occupe la moitié de la largeur de la page */
    margin: 0 auto; /* Centre l'image horizontalement */
    text-align: center; /* Centre l'image horizontalement si la largeur de l'image est inférieure à 50% */
}

.logo-containe img {
    max-width: 100%; /* Assurez-vous que l'image ne dépasse pas la largeur de son conteneur */
    height: auto; /* Gardez le rapport hauteur/largeur de l'image */
}
</style>
@endsection
