<!-- resources/views/semestres/edit.blade.php -->

@extends('admin.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Modifier un Semestre</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('semestres.update',$semestre->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="intitule" class="form-label">Nom du Semestre</label>
                    <input type="text" class="form-control" id="nom" name="intitule" value="{{ $semestre->intitule }}">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
@endsection
