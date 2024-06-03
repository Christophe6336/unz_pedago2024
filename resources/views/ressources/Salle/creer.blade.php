@extends('admin.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Créer une nouvelle salle</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('salle.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom de la salle</label>
                    <input type="text" class="form-control" id="nom" name="nom">
                </div>
                <div class="mb-3">
                    <label for="capacite" class="form-label">Capacité de la salle</label>
                    <input type="number" class="form-control" id="capacite" name="capacite">
                </div>
                <div class="form-group">
                    <label for="batiment_id">Bâtiment</label>
                    <select name="batiment_id" id="batiment_id" class="form-control">
                        @foreach($batiments as $batiment)
                            <option value="{{ $batiment->id }}">{{ $batiment->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block">Créer</button>
                </div>
            </form>
        </div>
    </div>
@endsection
