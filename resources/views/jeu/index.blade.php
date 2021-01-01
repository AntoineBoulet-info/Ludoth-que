@extends("base")

@section('title', 'Liste des jeux')

@section('content')

    <h1 class="text-center">Tous les jeux de la super ludotheque des Mousquetaires</h1>
    <div class="row">
        <div class="col-12 text-left">
            @auth
                <a class="btn btn-success" href="{{ URL::route('jeu_create') }}">Ajouter un jeu</a>
            @endauth
        </div>
    </div>
    <div class="row">
        <div class="col-4 text-left">

            <div class="form-inline">
                <label for="description">Théme : </label>
                <select class="form-control" name="theme"
                        onchange="window.location= '{{ URL::route('jeu_index', 'theme') }}/'+this.options[this.selectedIndex].value ">
                    @foreach( \App\Models\Theme::all() as $theme)
                        @if ($filter === 'theme' && $sort == $theme->id)
                            <option value="{{ $theme->id }}" selected>{{ $theme->nom }}</option>
                        @else
                            <option value="{{ $theme->id }}">{{ $theme->nom }}</option>
                        @endif
                    @endforeach
                </select>
                @if ($filter === 'theme')
                    <a href="{{ URL::route('jeu_index', ['filter' => 'name', 'sort' => null]) }}">Enlever le filtre</a>
                @endif
            </div>
        </div>
        <div class="col-4 text-center">

            <div class="form-inline">
                <label for="editeur">Editeur : </label>
                <select class="form-control" name="editeur"
                        onchange="window.location= '{{ URL::route('jeu_index', 'editeur') }}/'+this.options[this.selectedIndex].value ">
                    @foreach( \App\Models\Editeur::all() as $editeur)
                        @if ($filter === 'editeur' && $sort == $editeur->id)
                            <option value="{{ $editeur->id }}" selected>{{ $editeur->nom }}</option>
                        @else
                            <option value="{{ $editeur->id }}">{{ $editeur->nom }}</option>
                        @endif
                    @endforeach
                </select>
                @if ($filter === 'editeur')
                    <a href="{{ URL::route('jeu_index', ['filter' => 'name', 'sort' => null]) }}">Rafraichir</a>
                @endif
            </div>
        </div>
        <div class="col-4 text-center">
            <div class="form-inline">
                <label for="editeur">Mécaniques : </label>
                <select class="form-control" name="mecaniques"
                        onchange="window.location= '{{ URL::route('jeu_index', 'mecaniques') }}/'+this.options[this.selectedIndex].value ">
                    @foreach( \App\Models\Mecanique::all() as $mecaniques)
                        @if ($filter === 'mecaniques' && $sort == $mecaniques->id)
                            <option value="{{ $mecaniques->id }}" selected>{{ $mecaniques->nom }}</option>
                        @else
                            <option value="{{ $mecaniques->id }}">{{ $mecaniques->nom }}</option>
                        @endif
                    @endforeach
                </select>
                @if ($filter === 'mecaniques')
                    <a href="{{ URL::route('jeu_index', ['filter' => 'name', 'sort' => null]) }}">Rafraichir</a>
                @endif

            </div>

        </div>

        <div class="col-4 text-right" style="">
            @if ($filter === 'name')
                <a style="display:flex;margin:15px;" href="{{ URL::route('jeu_index', ['filter' => 'name', 'sort' =>$sort]) }}">Trier par
                    nom <i class="fas  @if ($sort == 0)fa-sort-down @else fa-sort-up @endif "></i></a>
            @endif
        </div>


        @if ($filter !== 'name')
            <div class="col-12">
                <div class="alert alert-success" role="alert" style="background-color:#3490dc;color:#ffffff";>
                    <h4 class="text-center">Il y a {{ count($jeux) }} @if (count($jeux) > 1) Résultats de jeux @else
                            Résultat @endif</h4>
                </div>
            </div>
        @endif
    </div>


    {{-- @foreach($_GET['editeur']? \App\Models\Jeu::where('editeur_id', $_GET['editeur'])->get() : \App\Models\Jeu::all() as $jeu)--}}

    <div class="row" style="position: relative;margin-left: 8%;" >

        @foreach($jeux as $jeu)

            <div class="card h-100" style="margin: 10px; width: 300px;">
                <a href="{{route('jeu_show', $jeu->id) }}" class="btn btn-primary"/>
                @if ($jeu->url_media != null)
                    <img src="{{($jeu->url_media)}}" class="card-img-top" alt="Illustration">
                @else
                    <img src="https://lh3.googleusercontent.com/proxy/X1ZqBVcoSFTUOnUXs7h69nMYlaGmlRa2Z0DzKty47TfPSaBs-NDGrOnmnnHD3NJjVn77xokwJW9pW0632GhD7A6GDV8aFjXF_v-kd7m1vKNj6D3DnQ" class="card-img-top" alt="Illustration">
                    @endif
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <p>Nom :<br> <a href="{{route('jeu_show', $jeu->id) }}"> {{$jeu->nom}}</a></p>
                        </h4>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($jeu->description, 45, $end='...') }}</p>
                        <p class="card-text mb-0"><small class="text-muted">Theme : {{ $jeu->theme->nom }}</small></p>
                        <p class="card-text mb-0"><small class="text-muted">Durée d'une partie : {{ $jeu->duree }}</small></p>
                        <p class="card-text mb-0"><small class="text-muted">Nombre de joueurs : {{ $jeu->nombre_joueurs }}</small></p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <a href="{{route('jeu_show', $jeu->id) }}" class="btn btn-primary">Plus d'info</a>
                        </div>
                    </div>
            </div>


        @endforeach

    </div>




@endsection

