@extends('admin.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Création d'un nouvel utilisateur</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('storeEnseignant') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">Nom</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control" name="nom" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prenom" class="col-md-4 col-form-label text-md-right">Prénom</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control" name="prenom" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="module_id" class="col-md-4 col-form-label text-md-right">Module</label>
                            <div class="col-md-6">
                                <select id="module_id" name="module_id" class="form-control" required>
                                    @foreach ($modules as $module)
                                        <option value="{{ $module->id }}">{{ $module->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ine" class="col-md-4 col-form-label text-md-right">MATRICULE</label>

                            <div class="col-md-6">
                                <input id="ine" type="text" class="form-control" name="ine" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telegram_id" class="col-md-4 col-form-label text-md-right">TELEGRAM_ID</label>

                            <div class="col-md-6">
                                <input id="telegram_id" type="text" class="form-control" name="telegram_id" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telephone" class="col-md-4 col-form-label text-md-right">Téléphone</label>

                            <div class="col-md-6">
                                <input id="telephone" type="text" class="form-control" name="telephone" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Rôle</label>
                            <div class="col-md-6">
                                <input id="role" type="text" class="form-control" name="role" value="{{ $defaultRole }}" disabled>
                            </div>
                        </div>




                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Créer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
