<!-- resources/views/ues/edit.blade.php -->

@extends('admin.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Modifier une UES</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('ues.update',$ues->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="code" class="form-label">Code de l'UES</label>
                    <input type="text" class="form-control" id="code" name="code" value="{{ $ues->code }}">
                </div>
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom de l'UES</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $ues->nom }}">
                </div>
                <div class="mb-3">
                    <label for="credit" class="form-label">Crédit de l'UES</label>
                    <input type="text" class="form-control" id="credit" name="credit" value="{{ $ues->credit }}">
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
@endsection
