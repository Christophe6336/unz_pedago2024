<!DOCTYPE html>
<html>
<head>
    <title>Programme PDF</title>
    <style>
        /* Styles spécifiques pour le PDF */
        body {
            font-family: DejaVu Sans, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .details {
            margin: 20px 0;
        }
        .details strong {
            display: inline-block;
            width: 150px;
        }
        .footer {
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>PROGRAMME DE COURS DU {{ $property->jour_debut }} au {{ $property->jour_fin }}</h1>

        <p><strong>Docteur </strong>{{ $user->nom }}</p>
    </div>
   Verifier les details du programme
    <div class="details">

        <p><strong>Heure :</strong> {{ $property->heure_debut }} - {{ $property->heure_fin }}</p>
        <p><strong>Enseignant :</strong> Docteur {{ $property->enseignant }}</p>
        <p><strong>Module :</strong> {{ $property->module->nom }}</p>
        <p><strong>Année académique :</strong> {{ $property->annee_academique ? $property->annee_academique->annee_debut . ' - ' . $property->annee_academique->annee_fin : 'Aucune année académique' }}</p>
        <p><strong>UFR :</strong> {{ $property->ufr->nom }}</p>
        <p><strong>Filière :</strong> {{ $property->filiere->nom }}</p>
        <p><strong>Promotion :</strong> {{ $property->promotion->annee }}</p>
        <p><strong>Semestre :</strong> {{ $property->semestre->intitule }}</p>
        <p><strong>Bâtiment :</strong> {{ $property->batiment->nom }}</p>
        <p><strong>Salle :</strong> {{ $property->salle->nom }}</p>
        <p><strong>Statut :</strong> {{ strtolower($property->statut) === 'valide' ? 'Validé' : 'Non valide' }}</p>
    </div>

    <div class="footer">
        <p>&copy; {{ date('Y') }} - UNZ PEDAGO </p> Veuillez nous contacter pour tout informations supplementaire
    </div>
</body>
</html>
