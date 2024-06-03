@extends('admin.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Modifier le bâtiment</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('batiment.update', $batiment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom du bâtiment</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $batiment->nom }}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image du bâtiment</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block">Modifier</button>
                </div>
            </form>
        </div>
    </div>
@endsection
