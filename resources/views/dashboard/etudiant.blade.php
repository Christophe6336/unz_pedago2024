

@extends('admin.admin')

@section('content')


<div class="d-flex justify-content-between align-items-center">
    <h1>Voici Tout Les Programmes Mr {{ $user->nom}} </h1>
</div>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <form class="d-flex" role="search" method="GET" action="{{ route('rechercher')}}">
        <input class="form-control me-2" type="search" name="query" placeholder="Rechercher un programme" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Chercher</button>
      </form>
    </div>


    @if ($properties->isEmpty())
    <strong>  Aucun résultat trouvé pour la recherche : {{ request('query') }}</strong>
@endif

  </nav>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Jour_debut</th>
            <th>Jour_fin</th>
            <th>Heure_debut</th>
            <th>Heure_fin</th>
            <th>Enseignant</th>
            <th>Module</th>
            <th>UFR</th>
            <th>Filiere</th>
            <th>Promotion</th>
            <th>Semestre</th>
            <th>Lieu</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($properties as $property )
        <tr>
          <td> {{$property->jour_debut}} </td>
                <td>  {{$property->jour_fin}}   </td>
            <td> {{$property->heure_debut}} </td>
                <td>  {{$property->heure_fin}}   </td>
                    <td> {{$property->enseignant}}  </td>
                    <td> {{$property->module}}  </td>
                    <td> {{$property->ufr}}  </td>
                    <td> {{$property->filiere}}  </td>
                    <td> {{$property->promotion}}  </td>
                    <td> {{$property->semestre}}  </td>
                    <td> {{$property->lieu}}  </td>

        </tr>

        @endforeach
    </tbody>

</table>
{{$properties->links()}}
@endsection

