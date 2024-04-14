@extends('admin.admin')

@section('title', $property->exists ? "Éditer" : "Créer")

@section('content')
    <h1 class="text-center">PLANNIFIER VOTRE COURS Dr {{ $user->nom}} </h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mt-5">
        <form action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="POST" id="propertyForm">
            @csrf
            @method($property->exists ? 'put' : 'post')

            <!-- Champs Module -->
            <div class="form-group row">
                <label for="module" class="col-sm-3 col-form-label">MODULE</label>
                <div class="col-sm-9">
                    <input type="text" id="module" name="module" class="form-control" placeholder="Veuillez entrez le module" value="{{ $property->module }}">
                    @error('module')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
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
            <div class="form-group row">
                <label for="semestre" class="col-sm-3 col-form-label">Batiments/salle</label>
                <div class="col-sm-9">
                    <select id="lieu" name="lieu" class="form-control">
                        <option value="WEND-PANGA">WEND-PANGA/Salle 1</option>
                        <option value="WEND-PANGA">WEND-PANGA/Salle 2</option>
                        <option value="WEND-PANGA">WEND-PANGA/Salle 3</option>
                        <option value="WEND-PANGA">WEND-PANGA/Salle 4</option>
                        <option value="AMPHI 500">AMPHI 500</option>
                        <option value="AMPHI 750">AMPHI 750</option>
                        <option value="AMPHI 1000">AMPHI 1000</option>
                        <option value="AMPHI TOGOYENI">AMPHI TOGOYENI</option>
                        <option value="CPI">CPI-EST</option>
                        <option value="CPI">CPI-CENTRE</option>
                        <option value="CPI">CPI-OUEST</option>
                        <option value="Salle">Salle Informatique</option>
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

    <!-- Le formulaire pour choisir un fichier -->
    <div>
    <div class="container text-center mt-3">
        <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="fichier_excel" class="form-control" aria-label="file example" accept=".csv" required>
            <div class="invalid-feedback">Veuillez sélectionner un fichier Excel.</div>
            <button type="submit" class="btn btn-info mt-3">Importer</button>
        </form>
    </div>
</div>
    <!-- Script JavaScript pour la gestion des sélections UFR et filière -->
    <script>
       document.addEventListener('DOMContentLoaded', function() {
    const ufrSelect = document.getElementById('ufr');
    const filiereSelect = document.getElementById('filiere');
    const semestreSelect = document.getElementById('semestre');

    const filieresParUFR = {
        'ST': ['MPCI', 'SVT', 'Mathematique', 'Physique', 'Chimie', 'Informatique'],
        'SEG': ['Economie','Gestion','APE','EAE','ESG'],
        'LSH': ['Histoire_Archeologie', 'LM', 'Psychologie','Géographie','SID','Linguistique','Philosophie']
    };

    const semestresParFiliere = {
        'MPCI': ['S1', 'S2', 'S3'],
        'SVT': ['S1', 'S2', 'S3'],
        'Mathematique': ['S4', 'S5', 'S6'],
        'Physique': ['S4', 'S5', 'S6'],
        'Chimie': ['S4', 'S5', 'S6'],
        'Informatique': ['S4', 'S5', 'S6'],
        'Economie': ['S1', 'S2', 'S3', 'S4', 'S5'],
        'Gestion': ['S1', 'S2', 'S3', 'S4', 'S5'],
        'APE': ['S6'],
        'EAE': ['S6'],
        'ESG': ['S6'],
        'Histoire_Archeologie': ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'],
        'LM': ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'],
        'Psychologie': ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'],
        'Géographie': ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'],
        'SID': ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'],
        'Linguistique': ['S1', 'S2', 'S3', 'S4', 'S5', 'S6'],
        'Philosophie': ['S1', 'S2', 'S3', 'S4', 'S5', 'S6']
    };

    ufrSelect.addEventListener('change', function() {
        const selectedUFR = this.value;
        const filieres = filieresParUFR[selectedUFR];

        // Efface les options existantes
        filiereSelect.innerHTML = '';
        semestreSelect.innerHTML = '';

        // Génère les nouvelles options de filière
        filieres.forEach(filiere => {
            const option = document.createElement('option');
            option.value = filiere;
            option.text = filiere;
            filiereSelect.appendChild(option);
        });

        // Déclenche l'événement de changement pour initialiser les options de la filière
        filiereSelect.dispatchEvent(new Event('change'));
    });

    filiereSelect.addEventListener('change', function() {
        const selectedFiliere = this.value;
        const semestres = semestresParFiliere[selectedFiliere] || [];

        // Efface les options existantes
        semestreSelect.innerHTML = '';

        // Génère les nouvelles options de semestre
        semestres.forEach(semestre => {
            const option = document.createElement('option');
            option.value = semestre;
            option.text = semestre;
            semestreSelect.appendChild(option);
        });
    });

    // Déclenche l'événement de changement pour initialiser les options de l'UFR
    ufrSelect.dispatchEvent(new Event('change'));
});

    </script>
@endsection
