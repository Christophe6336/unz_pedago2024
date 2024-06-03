@extends('admin.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="card">

                    <div class="card-header">Nouvel Enregistrement dans le Cahier de Suivi</div>
                    <div class="card-body">
                        <form action="{{ route('materiel_enre.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="action">Action :</label>
                                <select name="action" id="action" class="form-control" required>
                                    <option value="entrée">Entrée</option>
                                    <option value="sortie">Sortie</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="materiel_id">Matériel :</label>
                                <select name="materiel_id" id="materiel_id" class="form-control" required>
                                    @foreach ($materiels as $materiel)
                                        <option value="{{ $materiel->id }}">{{ $materiel->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="quantite">Quantité :</label>
                                <input type="number" name="quantite" id="quantite" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="delegue">Délégué :</label>
                                <input type="text" name="delegue" id="delegue" class="form-control">
                            </div>
                            <div class="form-group" id="dateRetourFields">
                                <label for="date_retour">Date de Retour :</label>
                                <input type="date" name="date_retour" id="date_retour" class="form-control">
                            </div>
<script>
    document.getElementById('type').addEventListener('change', function() {
    var type = this.value;
    var dateRetourFields = document.getElementById('dateRetourFields');

    // Afficher les champs de la date de retour uniquement si le type de matériel est non consommable
    if (type === 'non_consommable') {
        dateRetourFields.style.display = 'block';
    } else {
        dateRetourFields.style.display = 'none';
    }
});

</script>

                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
