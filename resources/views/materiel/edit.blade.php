@extends('admin.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier le Matériel</div>
                    <div class="card-body">
                        <form action="{{ route('materials.update', $materiel->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input type="text" name="nom" id="nom" class="form-control" required value="{{ $materiel->nom }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description :</label>
                                <textarea name="description" id="description" class="form-control" required>{{ $materiel->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="quantite">Quantité :</label>
                                <input type="number" name="quantite" id="quantite" class="form-control" required value="{{ $materiel->quantite }}">
                            </div>
                            <div class="form-group">
                                <label for="type">Type :</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="consommable" {{ $materiel->type == 'consommable' ? 'selected' : '' }}>Consommable</option>
                                    <option value="non_consommable" {{ $materiel->type == 'non_consommable' ? 'selected' : '' }}>Non Consommable</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
