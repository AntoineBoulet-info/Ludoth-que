@extends("base")

@section('title', 'Détail du jeu')

@section('content')

    <div class="row justify-content-center">
        <div class="col-6 ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $jeu->nom }}</h5>
                    <p class="card-text">
                    {{ $jeu->description }}
                    <hr>
                    {{ $jeu->theme->nom }}
                    <hr>
                    @foreach ( $jeu->mecaniques as $key => $mecaniques)
                        @if ($key !== 0)
                            &nbsp;-&nbsp;
                        @endif
                        {{ $mecaniques->nom }}
                    @endforeach
                    <hr>
                        Catégorie : {{ $jeu->categorie }}
                    <hr>
                        Age recommandé : {{ $jeu->age }}
                    <hr>
                        Langue du jeu : {{ $jeu->langue }}
                    <hr>
                        {{ $jeu->theme->nom }}
                    <hr>
                        Edité par {{ $jeu->editeur->nom }}
                    <hr>
                        durée : {{ $jeu->duree }}
                    <hr>
                        Nombre de joueur : {{ $jeu->nombre_joueurs }}
                    </p>
                    <hr><hr>
                        <a href="{{ URL::route('jeu_rules', $jeu->id) }}" class="btn btn-primary">Regarder les régles du jeu</a>
                    <hr><hr>
                </div>
            </div>
        </div>
    </div>
    <!-- formulaire commentaire !-->

    <div class="container-fluid card mt-5 mb-5">
        <h3 class="text-center mt-4 mb-3"><b>Commentaire</b></h3>
        <form  method="post" action="{{ URL::route('commentaire_store') }}">
            @csrf
            <input name="jeu_id" type="hidden" value="{{$jeu->id}}" >
            <div class="row mt-3">
                <div class="col-lg-12 col-sm-12 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="mb-3">Nouveau commentaire ! </h5>
                            <div class="col-lg-6">
                                    <select name="note" class="btn btn-outline-dark" style="width: 120px;">
                                        <option class="btn btn-dark" value="all" selected="">Note :</option>
                                        <option class="btn btn-dark" value="0">0</option>
                                        <option class="btn btn-dark" value="1">1</option>
                                        <option class="btn btn-dark" value="2">2</option>
                                        <option class="btn btn-dark" value="3">3</option>
                                        <option class="btn btn-dark" value="4">4</option>
                                        <option class="btn btn-dark" value="5">5</option>
                                    </select>
                                    <input type="submit" class="btn btn-dark" title="Trier" value="OK">
                            </div>
                            <label for="textarea-input"><p class="card-text mt-2">Commentaire :</p></label>
                            <textarea name="commentaire" id="commentaire" rows="4" class="form-control" value="{{old('commentaire')}}" required=""></textarea>
                            <div style="display: none">

                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit">Valider</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--liste commentaires du jeu !-->

        <div class="row mt-3">
            <div class="col-lg-12 col-sm-12 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        @foreach( \App\Models\Commentaire::where('jeu_id',$jeu->id)->get() as $commentaires)
                         <h2 class="card-text">{{$commentaires->user->name}}</h2>
                        <p class="card-text">Note : {{$commentaires->note}} </p>
                        <h5 class="card-title">{{$commentaires->commentaire}}</h5>
                        <p class="card-text">{{$commentaires->date_com}}</p>
                        @endforeach
                    </div>
                </div>
            </div>

    </div>
    </div>

    <div class="row">
    <div class="col-4 " style="display:flex;margin: 0 auto;">
        <div class="card">
            <img
                src="https://img.over-blog-kiwi.com/2/49/57/72/20171130/ob_0baedb_industrie-stats.jpg"
                class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Statistique de {{ $jeu->nom }}</h5>
                <p class="card-text">
                    @if ($jeuxInformation->getNbComment() !== 0)
                        <strong>Nombre de note/commentaire : </strong>{{ $jeuxInformation->getNbComment() }} <br/>
                        <strong>Note Moyenne : </strong>{{ $jeuxInformation->getAverage() }} <br/>
                        <strong>Note la plus haute: </strong>{{ $jeuxInformation->getMax() }} <br/>
                        <strong>Note la plus basse : </strong>{{ $jeuxInformation->getMin() }} <br/>
                        <strong>Nombre de commentaire: </strong>{{ $jeuxInformation->getNbComment() }}
                        / {{ $jeuxInformation->getNbCommentTotal()  }} <br/>
                        <strong>Position du jeu dans le théme {{ $jeuxInformation->getRankInTheme() }}
                            sur {{ $jeuxInformation->getNbRankInTheme() }}<br/>
                            @else
                                <strong>Pas de statistique !</strong>
                    @endif
                </p>
            </div>
        </div>
    </div>
        <div class="col-4 " style="display:flex;margin: 0 auto;">
        <div class="card">
            <img
                src=" https://media.istockphoto.com/photos/rendering-golden-dollar-sign-isolated-on-white-background-picture-id1005918128?k=6&m=1005918128&s=612x612&w=0&h=VLK7AsPAAp4U7HpFr-TZF5oh11wzvSidWhRvOs46SKk="
                class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Tarif de {{ $jeu->nom }}</h5>
                <p class="card-text">
                    @if ($jeuxPrice->getNbAchat() !== 0)
                        <strong>Prix Moyen : </strong>{{ $jeuxPrice->getAverage() }} <br/>
                        <strong>Prix le plus haut: </strong>{{ $jeuxPrice->getMax() }} <br/>
                        <strong>Prix le plus bas : </strong>{{ $jeuxPrice->getMin() }} <br/>
                        <strong>Nombre d'exemplaires : </strong>{{ $jeuxPrice->getNbAchat() }}
                        / {{ $jeuxPrice->getNbUsers() }}<br/>
                    @else
                        <strong>Pas de tarif !</strong>
                    @endif
                </p>
            </div>
        </div>

    </div>
    </div>





    <a href="{{ URL::route('jeu_index') }}" class="btn btn-secondary">Retour à la liste des jeux</a>
@endsection

