<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Elearning</title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Elearning') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="{{ asset('OwlCarousel2-2.3.4/dist/owl.carousel.min.js') }}"></script>
        <style>
            @media screen and (max-width: 1243px) {
                .hero {
                    flex-direction: column-reverse
                }
                .whyUsImage{
                    width: 100%;
                }
            }
        </style>
    </head>
    <body class="antialiased" style="background-color: #ebefff">
        <header style="background-color: #a7b5e6">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.html">ELearning</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/') }}">Accuil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('coursesClient.indexClient') }}">Cours</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('plan.index') }}">Prix</a>
                            </li>
                        </ul>
                        <div class="d-flex">
                            @if (session()->get('LoggedClient'))
                                <a href="{{ route('authClient.logout') }}" class="btn secondary-btn">Déconnecter</a>
                            @else
                            <a href="{{ route('authClient.login') }}" class="btn secondary-btn">Connecter</a>
                            <a href="{{ route('authClient.register') }}" class="btn primary-btn">Register</a>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
        </header>


        <main class="py-4">
            @yield('content')
        </main>

        <footer>
            <div class="links">
                <div class="pages">
                    <a href="learning/about.html">About Us</a>
                    <a href="learning/privacy.html">Privacy</a>
                </div>
                <div class="socialMedia">
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
            <div class="subscribe">
                <h2>Subscribe to our newsletter</h2>
                <form class="d-flex">
                    <input class="form-control me-2" type="email" placeholder="Email">
                    <button class="btn primary-btn" type="submit">Subscribe</button>
                </form>
            </div>
        </footer>


<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    })
</script>
    </body>
</html>
