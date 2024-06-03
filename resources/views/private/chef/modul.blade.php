@extends('admin.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Créer un nouveau module</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('chef.module') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">Nom du module :</label>
                                <div class="col-md-6">
                                    <input type="text" id="nom" name="nom" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="code" class="col-md-4 col-form-label text-md-right">Code du module :</label>
                                <div class="col-md-6">
                                    <input type="text" id="code" name="code" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="coefficient" class="col-md-4 col-form-label text-md-right">Coefficient :</label>
                                <div class="col-md-6">
                                    <input type="text" id="coefficient" name="coefficient" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="enseignant_id" class="col-md-4 col-form-label text-md-right">Enseignant :</label>
                                <div class="col-md-6">
                                    <select id="enseignant_id" name="enseignant_id" class="form-control">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="annee_academique_id" class="col-md-4 col-form-label text-md-right">Année académique :</label>
                                <div class="col-md-6">
                                    <select id="annee_academique_id" name="annee_academique_id" class="form-control">
                                        @foreach ($annee_academiques as $annee_academique)
                                            <option value="{{ $annee_academique->id }}">{{ $annee_academique->annee_debut }} - {{ $annee_academique->annee_fin }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Créer le module</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
