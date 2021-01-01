<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>G@meHub</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body  class="bg-primary-400 font-sans leading-normal tracking-normal">
<!--Nav-->
<nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm" style="margin-top: 0px">
    <a class="navbar-logo" href="{{URL::route('home')}}"><img src="https://media.discordapp.net/attachments/783784881871913033/789111321437536257/image0.png?width=603&height=603" style="height: 60px; margin-left: 50%"/></a>

    <!-- Navbar content !-->

    <ul class="navbar-nav" style="margin: 0 auto;font-size: 20px;width: 100%;display: flex;align-items: center;justify-content: center; ">
 <div style="height: 100%;width: 20%"> </div>
        <div style="height: 100%;width: 60%;display: flex;align-items: center;justify-content: center;">
            <li class="nav-item active">
                <a class="nav-link" href="{{ URL::route('home') }}" style="color: #ffe140;"><b>GameHub </b><span class="sr-only">(current)</span></a>
            </li>
        <li class="nav-item">
            <a class="nav-link" href="{{URL::route('jeu_index')}}" style="color: #FFFFFF">Liste des jeux</a>
        </li>
        </div>
            <div class="flex ml-auto content-center justify-between md:justify-end" style="height: 100%;width:auto;display: flex;justify-content:space-between;align-items:center; ">
                <div class="hidden  top-0 right-0 sm:block h-full w-full flex justify-content-between align-items-center">
                    @auth
                        <a class="ml-4" href="{{ url('/dashboard') }}" style="color: #FFFFFF;text-decoration:none">Dashboard</a>
                        <a class="ml-4" href="{{ url('/users/profil') }}" style="color: #FFFFFF;text-decoration:none">Profil</a>
                    @else
                        <a class="ml-4" href="{{ route('login') }}" style="color: #FFFFFF;text-decoration:none">Connexion</a>

                        @if (Route::has('register'))
                            <a class="ml-4" href="{{ route('register') }}" style="color: #FFFFFF;text-decoration:none">Enregistrement</a>
                        @endif
                    @endauth

                </div>

            </div>
    </ul>
</nav>



    <div style="text-align: center; margin-top: 5%;margin-bottom: 5%;">
        <h1>Ludothèque</h1>
        <p>Bienvenue sur notre Ludothèque GameHub, vous pouvez consulter notre<br>large catalogue de jeux en tant qu'invité, il faudra vous enregistrer pour acheter un ou plusieurs jeux</p>
    </div>
    @auth
        @else
    <div class="row justify-content-center" style="text-align: center;margin-bottom:15%;">

        <div class="card col-md-3 offset-md-3" style="margin: 10px;">
            <div class="card-header">Vous avez un compte ?</div>
            <div class="card-body">
                <a class="btn btn-dark" href="{{url('/login')}}">Se connecter</a>
            </div>
        </div>
        <div class="card col-md-3" style="margin: 10px;">
            <div class="card-header">Première visite ?</div>
            <div class="card-body">
                <a class="btn btn-dark" href="{{url('/register')}}">S'inscrire</a>
            </div>
        </div>
    </div>

@endauth

    @section('scripts')
        <script src="{{ asset('js/main.js')}}"></script>
        <script src="{{ asset('js/app.js')}}"></script>
    @show

@section('footer')
    <footer class="page-footer font-small blue" style="position: absolute;bottom: 0;width: 100%;">
        <div class="footer-copyright text-center py-3">© Copyright 2020 Les Mousquetaires -
            <a href="#"> Tous droits réservés.</a>
        </div>
    </footer>
@show

    </body>

</html>
