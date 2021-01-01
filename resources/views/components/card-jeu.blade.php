<div class="py-6">
    <div class="flex w-full bg-white shadow-lg rounded-lg overflow-hidden">
        {{--<div class="w-1/3 bg-cover"
             style="background-image: url({{$jeuxPrice->getJeu()->url_media}})">
        </div>--}}
        <div class="w-2/3 p-4">
            <h1 class="text-gray-900 font-bold text-2xl">{{$jeuxPrice->getJeu()->nom}}</h1>
            <p class="mt-2 text-gray-600 text-sm">{{substr($jeuxPrice->getJeu()->description,0, 50)}} @if (strlen($jeuxPrice->getJeu()->description) > 50)
                    ... @endif</p>
            <p class="m-0"><i class="fas fa-clock pr-2"></i>{{$jeuxPrice->getJeu()->duree}}</p>
            <p><i class="fas fa-users pr-2"></i>{{$jeuxPrice->getJeu()->nombre_joueurs}}</p>
            <p class="m-0"><span class="text-gray-800  font-bold">Thème : </span>{{$jeuxPrice->getJeu()->theme->nom}}</p>
            <p class="m-0"><span class="text-gray-800  font-bold">Editeur : </span>{{$jeuxPrice->getJeu()->editeur->nom}}</p>
            <p class="m-0"><span class="text-gray-800  font-bold">Catégorie : </span>{{$jeuxPrice->getJeu()->categorie}}</p>
            <p><span class="text-gray-800  font-bold">Age : </span>{{$jeuxPrice->getJeu()->age}}</p>
            <div class="px-6 py-4">
                @foreach($jeuxPrice->getJeu()->mecaniques as $mecanique)
                    <span class="inline-block bg-yellow-200 rounded-full px-3 py-1 text-sm font-semibold text-grey-900 mr-2">
                        {{$mecanique->nom}}
                    </span>
                @endforeach
            </div>
            <div class="flex item-center justify-between mt-3">
                @if ($jeuxPrice->getNbAchat() !== 0)
                <h1 class="text-gray-700 font-bold text-xl"> Note moyenne : {{$jeuxPrice->getAverage() }} </h1>
                @endif
                <a type="button"
                   class="px-3 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded"
                   href="{{route('jeu_show', ['id' => $jeuxPrice->getJeu()->id])}}">Voir les détails</a>
            </div>
        </div>
    </div>
</div>
