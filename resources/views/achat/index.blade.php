@extends("base")

@section('title', 'Liste des jeux')

@section('content')

    <div class="row justify-content-center">
        <div class="col-6 ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $achat->lieu }}</h5>
                    <p class="card-text">
                    {{ $achat->prix }}
                    <hr>
                    {{ $achat->date_achat }}
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endsection
