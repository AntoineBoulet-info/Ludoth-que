@extends("base")

@section('title', 'Liste des jeux')

@section('content')

    <div class="card">
        <div class="card-header text-center @section('title', 'Liste des jeux')

        @section('content')font-weight-bold">
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
            <form name="form-create-jeu" method="post" action="{{ URL::route('achat_store') }}">
                @csrf
                <div class="form-group">
                    <label for="lieu">lieu</label>
                    <input type="text" id="lieu" name="lieu" value="{{ old('lieu') }}" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="prix">prix</label>
                    <input type="text" id="prix" name="prix" value="{{ old('prix') }}" class="form-control" required="">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
