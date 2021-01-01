@extends('base')

@section('content')
    <main class="flex-1 bg-gray-200 dark:bg-gray-900 overflow-y-auto transition duration-500 ease-in-out w-">
        <div class="px-24 py-12 text-gray-700 dark:text-gray-500 transition duration-500 ease-in-out">
            <h2 class="text-4xl font-medium capitalize">5 jeux alétoires de la ludotheque</h2>
            <a href="{{URL::route('jeu_meilleur')}}" >Afficher les 5 meilleurs jeux</a>
            <div class=" border dark:border-gray-700 transition duration-500 ease-in-out"></div>
            <div class="flex flex-col mt-2">
                @foreach($jeuxPrice as $jeuPrice)
                    <x-card-jeu :jeuxPrice="$jeuPrice"></x-card-jeu>
                @endforeach
            </div>
        </div>
        <a href="{{ URL::route('dashboard') }}" class="btn btn-secondary">Retour à la liste</a>
    </main>

@endsection
