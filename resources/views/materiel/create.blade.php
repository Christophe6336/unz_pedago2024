@extends('admin.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="card-header">Créer un Nouveau Matériel</div>
                    <div class="card-body">
                        <form action="{{ route('materials.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input type="text" name="nom" id="nom" class="form-control" required value="{{ old('nom') }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description :</label>
                                <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="quantite">Quantité :</label>
                                <input type="number" name="quantite" id="quantite" class="form-control" required value="{{ old('quantite') }}">
                            </div>
                            <div class="form-group">
                                <label for="type">Type :</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="consommable" {{ old('type') == 'consommable' ? 'selected' : '' }}>Consommable</option>
                                    <option value="non_consommable" {{ old('type') == 'non_consommable' ? 'selected' : '' }}>Non Consommable</option>
                                </select>
                            </div>

                                <div class="form-group">
                                    <label for="image">Image :</label>
                                    <input type="file" name="image" id="image" class="form-control-file">
                                </div>


                            <button type="submit" class="btn btn-primary">Créer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
