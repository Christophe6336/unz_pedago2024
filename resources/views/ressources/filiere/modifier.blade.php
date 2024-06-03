@extends('admin.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Modification de la Filiere</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('filieres.update', $filiere->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom du Filiere</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $filiere->nom }}">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block">Modifier</button>
                </div>
            </form>
        </div>
    </div>
@endsection
