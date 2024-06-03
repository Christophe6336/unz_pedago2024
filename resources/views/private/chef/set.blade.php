@extends('admin.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier le programme</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('settingave', $property->id) }}">
                        @csrf
                        @method('PUT')
                        <!-- Champs Module -->
            <div class="form-group row">
                <label for="module_id" class="col-sm-3 col-form-label">Module</label>
                <div class="col-sm-9">
                    <select class="form-control" id="module_id" name="module_id">
                        @foreach ($modules as $module)
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
                            <option value="{{ $annee_academique->id }}">{{ $annee_academique->annee_debut }} - {{ $annee_academique->annee_fin }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Champs Enseignant -->
            <div class="form-group row">
                <label for="enseignant" class="col-sm-3 col-form-label">ENSEIGNANT</label>
                <div class="col-sm-9">
                    <input type="text" id="enseignant" name="enseignant" class="form-control" value="{{ $property->enseignant }}" readonly>

                </div>

            </div>

            <!-- Champs UFR -->
            <div class="form-group row">
                <label for="ufr" class="col-sm-3 col-form-label">UFR</label>
                <div class="col-sm-9">
                    <select id="ufr" name="ufr" class="form-control">
                        <option value="ST">ST</option>
                        <option value="SEG">SEG</option>
                        <option value="LSH">LSH</option>
                    </select>
                </div>
            </div>

            <!-- Champs Filière -->
            <div class="form-group row">
                <label for="filiere" class="col-sm-3 col-form-label">FILIERE</label>
                <div class="col-sm-9">
                    <select id="filiere" name="filiere" class="form-control">
                        <!-- Options dynamiquement générées en JavaScript -->
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
                    <select id="promotion" name="promotion" class="form-control">
                        @for ($year = 2014; $year <= 2024; $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <!-- Champs Semestre -->
            <div class="form-group row">
                <label for="semestre" class="col-sm-3 col-form-label">SEMESTRE</label>
                <div class="col-sm-9">
                    <select id="semestre" name="semestre" class="form-control">
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                        <option value="S4">S4</option>
                        <option value="S5">S5</option>
                        <option value="S6">S6</option>
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


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Modifier
                                </button>
                                <a href="{{ route('chef') }}" class="btn btn-secondary">Annuler</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
