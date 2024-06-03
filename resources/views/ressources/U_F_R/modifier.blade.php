<!-- resources/views/ufrs/edit.blade.php -->

@extends('admin.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Modifier une UFR</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('ufrs.update',$ufr->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom de l'UFR</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $ufr->nom }}">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
@endsection
