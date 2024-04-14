<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('emploi_du_temps.store') }}" method="post">
        @csrf

        <!-- Liste déroulante pour la filière -->
        <label for="filieres">Filière :</label>
        <select name="filieres" id="filieres">
            <option value="">Sélectionnez une filière</option>
            @foreach ($filieres as $filiere)
            <option value="{{ $filiere->nom }}">{{ $filiere->nom }}</option>
        @endforeach



        </select>

        <!-- Liste déroulante pour l'UFR -->
        <label for="ufr">UFR :</label>
        <select name="ufr" id="ufr">
            <option value="">Sélectionnez une UFR</option>
            @foreach ($u_f_rs as $ufr)
                <option value="{{ $ufr->id }}">{{ $ufr->nom }}</option>
            @endforeach
        </select>

        <!-- Liste déroulante pour le semestre -->
        <label for="semestre">Semestre :</label>
        <select name="semestre" id="semestre">
            <option value="">Sélectionnez un semestre</option>
            @foreach ($semestres as $semestre)
                <option value="{{ $semestre->id }}">{{ $semestre->nom }}</option>
            @endforeach
        </select>

        <!-- Liste déroulante pour l'UE -->
        <label for="ue">UE :</label>
        <select name="ue" id="ue">
            <option value="">Sélectionnez une UE</option>
            @foreach ($ues as $ue)
                <option value="{{ $ue->id }}">{{ $ue->nom }}</option>
            @endforeach
        </select>

        <!-- Liste déroulante pour l'ECU -->
        <label for="ecu">ECU :</label>
        <select name="ecu" id="ecu">
            <option value="">Sélectionnez un ECU</option>
            @foreach ($ecus as $ecu)
                <option value="{{ $ecu->id }}">{{ $ecu->nom }}</option>
            @endforeach
        </select>

        <!-- Liste déroulante pour le bâtiment -->
        <label for="batiment">Bâtiment :</label>
        <select name="batiment" id="batiment">
            <option value="">Sélectionnez un bâtiment</option>
            @foreach ($batiments as $batiment)
                <option value="{{ $batiment->id }}">{{ $batiment->nom }}</option>
            @endforeach
        </select>

        <!-- Liste déroulante pour la salle -->
        <label for="salle">Salle :</label>
        <select name="salle" id="salle">
            <option value="">Sélectionnez une salle</option>
            @foreach ($salles as $salle)
                <option value="{{ $salle->id }}">{{ $salle->nom }}</option>
            @endforeach
        </select>

        <!-- Liste déroulante pour la promotion -->
        <label for="promotion">Promotion :</label>
        <select name="promotion" id="promotion">
            <option value="">Sélectionnez une promotion</option>
            @foreach ($promotions as $promotion)
                <option value="{{ $promotion->id }}">{{ $promotion->nom }}</option>
            @endforeach
        </select>

        <!-- Bouton de soumission -->
        <button type="submit">Enregistrer</button>
    </form>

</body>
</html>
