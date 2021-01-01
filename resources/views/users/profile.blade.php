@extends("base")

@section('title', 'Détail du profil')

@section('content')

    <div class="row justify-content-center">
        <div class="col-6 ">
            <div class="card">
                <h1>Mon Profil</h1>
                <div class="card-body">
                    <h5 class="card-title">Nom : {{ $user->name }}</h5>
                    <p class="card-text">
                    Adresse Mail : {{ $user->email}}
                    </p>
                </div>
                {{--<a href="{{ URL::route('achat_index') }}" class="btn btn-secondary">Afficher mes jeux</a>
                <br>--}}
                <a href="{{ URL::route('users.achat') }}" class="btn btn-secondary">Acheter un jeu</a>
                <br>
                {{--
                <a href="{{ URL::route('achat_destroy') }}" class="btn btn-secondary">Acheter un jeu</a>
                --}}
            </div>
        </div>
    </div>
    <a href="{{ URL::route('jeu_index') }}" class="btn btn-secondary">Retour à la liste des jeux</a>
@endsection
