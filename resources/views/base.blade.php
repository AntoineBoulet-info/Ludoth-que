<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="iut Lens">
    <link rel="icon" type="image/png" sizes="96x96" href="../images/favicon/favicon-96x96.png">
    <title>@yield('title', 'G@meHub')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">

    <!-- Bootstrap core CSS -->
{{--
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
--}}

<!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>
<body style="padding-top: 50px;" class="bg-primary-400">

@section('navbar')
    <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm" style="margin-top: -50px">
        <a class="navbar-logo" href="{{URL::route('home')}}"><img src="https://media.discordapp.net/attachments/783784881871913033/789111321437536257/image0.png?width=603&height=603" style="height: 60px; margin-left: 50%"/></a>

        <!-- Navbar content !-->
        <ul class="navbar-nav" style="margin: 0 auto; font-size: 20px;">
            <li class="nav-item active">
                <a class="nav-link" href="{{ URL::route('home') }}" style="color: #ffe140;"><b>GameHub </b><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color: #FFFFFF">Liste des jeux</a>
            </li>
        </ul>
    </nav>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ URL::route('dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ URL::route('jeu_index') }}">Jeux</a>
            </li>

        </ul>
        <ul class="my-2 my-lg-0 navbar-nav">
            @guest
                <li class="my-2 my-sm-0"><a class="btn btn-success" style="color: #FFFFFF;text-decoration:none" href="{{ URL::route('login') }}">Login</a></li>
            @endguest
            @auth
                <li class="my-2 my-lg-0"><!-- Authentication --><span class="text-white">Logout{{ Auth::user()->name}} </span>
                    <form  method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-jet-dropdown-link>
                    </form>
                </li>
            @endauth
        </ul>
    </div>
    </nav>
@show


<main role="main" class="container">

    <div class="starter-template" style="padding-top: 40px;">

        @yield('content')

    </div>

</main>

@section('js')
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
@show

@section('footer')
    <footer class="page-footer font-small blue" style="">
        <div class="footer-copyright text-center py-3">© Copyright 2020 Les Mousquetaires -
            <a href="#"> Tous droits réservés.</a>
        </div>
    </footer>
@show
</body>

</html>
