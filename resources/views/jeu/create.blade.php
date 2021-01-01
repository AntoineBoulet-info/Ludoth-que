@extends("base")

@section('title', 'Liste des jeux')

@section('content')

<div class="card">
    <div class="card-header text-center font-weight-bold">
        Ajouter un nouveau jeu
    </div>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <div class="card-body">
        <form name="form-create-jeu" method="post" action="{{ URL::route('jeu_store') }}">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" value="{{ old('nom') }}" class="form-control" required="">
            </div>
            <div class="form-group">
                <label for="description">Description : </label>
                <textarea name="description" rows="4" class="form-control" required="">
                    {{ old('description') }}
                </textarea>
            </div>
            <div class="form-group">
                <label for="description">Théme : </label>
                <select name="theme">
                    @foreach( \App\Models\Theme::all() as $theme)
                        @if (old('theme') == $theme->id)
                            <option value="{{ $theme->id }}" selected>{{ $theme->nom }}</option>
                        @else
                            <option value="{{ $theme->id }}">{{ $theme->nom }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Editeur : </label>
                <select name="editeur">
                    @foreach( \App\Models\Editeur::all() as $editeur)
                        @if (old('editeur') == $editeur->id)
                            <option value="{{ $editeur->id }}" selected>{{ $editeur->nom }}</option>
                        @else
                            <option value="{{ $editeur->id }}">{{ $editeur->nom }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="regles">Régles</label>
                <textarea name="regles" rows="4" class="form-control" required="">
                    {{ old('regles') }}
                </textarea>
            </div>
            <div class="form-group">
                <label for="langue">Langue</label>
                <input type="text" id="langue" name="langue" value="{{ old('langue') }}" class="form-control" required="">
            </div>
            <div class="form-group">
                <label for="age">Age requis</label>
                <input type="text" id="age" name="age" value="{{ old('age') }}" class="form-control" required="">
            </div>
            <div class="form-group">
                <label for="nombre_joueurs">Nombre de joueurs</label>
                <input type="text" id="nombre_joueurs" name="nombre_joueurs" value="{{ old('nombre_joueurs') }}" class="form-control" required="">
            </div>
            <div class="form-group">
                <label for="categorie">Catégorie</label>
                <input type="text" id="categorie" name="categorie" value="{{ old('categorie') }}" class="form-control" required="">
            </div>
            <div class="form-group">
                <label for="duree">Durée</label>
                <input type="text" id="duree" name="duree" value="{{ old('duree') }}" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection
