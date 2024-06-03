@extends('admin.admin')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Modifier la fiche de séance</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('cahier_update', $cahier->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="date" class="form-label">DATE</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $cahier->date }}">
            </div>
            <div class="mb-3">
                <label for="heure_debut" class="form-label">HEURE DEBUT</label>
                <input type="time" class="form-control" id="heure_debut" name="heure_debut" value="{{ $cahier->heure_debut }}">
            </div>
            <div class="mb-3">
                <label for="heure_fin" class="form-label">HEURE FIN</label>
                <input type="time" class="form-control" id="heure_fin" name="heure_fin" value="{{ $cahier->heure_fin }}">
            </div>
            <div class="mb-3">
                <label for="contenu" class="form-label">CONTENU</label>
                <textarea class="form-control" id="contenu" name="contenu" rows="3">{{ $cahier->contenu }}</textarea>
            </div>
            <div class="mb-3">
                <label for="module_id" class="form-label">Module</label>
                <select class="form-select" id="module_id" name="module_id">
                    <option value="">Sélectionnez un module</option>
                    @foreach($modules as $module)
                        <option value="{{ $module->id }}" @if($module->id == $cahier->module_id) selected @endif>{{ $module->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="etudiant_id" class="form-label">ID de l'étudiant</label>
                <input type="text" class="form-control" id="etudiant_id" name="etudiant_id" value="{{ $cahier->etudiant->nom }}" readonly>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-block">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>

@endsection
