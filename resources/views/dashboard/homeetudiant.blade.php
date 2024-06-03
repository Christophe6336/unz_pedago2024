@extends('admin.admin')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1><strong>Veuillez selectionner une UFR Mr {{ $user->nom}}</strong></h1>
    </div>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <a href="{{route('cahier')}}" class="btn btn-warning btn-block btn-center">Cahier de texte</a>
    <center>
        <div class="row mb-2">
            <div class="col">
                <a href="{{ route('etud', ['ufr' => 'ST']) }}" class="btn btn-primary btn-block btn-center">UFR/ST</a>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <a href="{{ route('etud', ['ufr' => 'SEG']) }}" class="btn btn-secondary btn-block btn-center">UFR/SEG</a>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <a href="{{ route('etud', ['ufr' => 'LSH']) }}" class="btn btn-success btn-block btn-center">UFR/LSH</a>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <a href="{{ route('etud', ['ufr' => 'IUT']) }}" class="btn btn-info btn-block btn-center">IUT</a>
            </div>
        </div>
    </center>

</div>

{{$properties->links()}}
@endsection
