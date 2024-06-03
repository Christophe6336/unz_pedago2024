@extends('admin.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Modifier la salle</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('salle.update', $salle->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom de la salle</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $salle->nom }}">
                </div>
                <div class="mb-3">
                    <label for="capacite" class="form-label">Capacité de la salle</label>
                    <input type="number" class="form-control" id="capacite" name="capacite" value="{{ $salle->capacite }}">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block">Modifier</button>
                </div>
            </form>
        </div>
    </div>
@endsection
