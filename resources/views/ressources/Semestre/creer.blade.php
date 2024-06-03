<!-- resources/views/semestres/create.blade.php -->

@extends('admin.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Créer un nouveau Semestre</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('semestres.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="intitule" class="form-label">Nom du Semestre</label>
                    <input type="text" class="form-control" id="intutile" name="intitule">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block">Créer</button>
                </div>
            </form>
        </div>
    </div>
@endsection
