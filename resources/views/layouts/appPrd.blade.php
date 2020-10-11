<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/carousel/">

    <!-- Bootstrap core CSS-->
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    
    <style>
        .imagem {
            transition: all 0.5s;
            cursor: pointer;
        }
    
        .imagem:hover {
            -webkit-filter: drop-shadow(15px 10px 5px rgba(0, 0, 0, .5));
            filter: drop-shadow(15px 10px 5px rgba(0, 0, 0, .5));
        }

    </style>

    <!-- Google Analytics Global site tag (gtag.js)  -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-102363462-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-102363462-4');
    </script>

    <!-- jivosite chat-->
    <!-- <script src="//code.jivosite.com/widget/W5CU0zEjTb" async></script> -->
    
</head>

<body>

<div id="app">
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="empresaimg" src={{ asset($empresas->urlimage) }} alt=""> {{ config('app.name', '') }}  
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="visitaAR" href="#" data-toggle="modal" data-target="#ExemploModalCentralizado">Visita de Técnica</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="produtos" href="{{ route('produto.lista') }}">Produtos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="orcamento" href="{{ route('produto.orcamento') }}">Orçamento</a>
                    </li>
                </ul>

                <!--
                <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    <li><a href="{{ route('login') }}" class="btn btn-primary">

                            Login
                            
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
                                <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
                            </svg>

                        </a></li>
                    <!-- <li><a href="{{ route('register') }}" class="btn btn-primary">Register</a></li> -->
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>

            </div>
        </nav>
    </header>
    <main role="main">
        <!-- Modal de Cadastro de visitas de AR -->
        <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog"
            aria-labelledby="TituloModalCentralizado" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="TituloModalCentralizado">Visita de AR - Atendimento e Relacionamento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! form($form->add('edit', 'submit', [
                            'attr' => ['class' => 'btn btn-primary'],
                            'label' => Icon::pencil().' Enviar'
                        ])) !!}
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

        <div class="container marketing">

            <div class="container">
                <div class="row">
            
                    <main class="col-sm-10">
                        @yield('content')
                    </main>
            
                </div>
            </div>
        </div>

    </br></br></br></br></br></br>
        <!-- FOOTER -->
        <footer id="myFooter">
            <div class="container">
                <ul>
                    <li><a href="#">Informações da Empresa</a></li>
                    <li><a href="#">Contato</a></li>
                    <li><a href="{{ route('produto.lista') }}">Produtos</a></li>
                </ul>
                <p class="footer-copyright">© 2020 Copyright - SLZTELECOM</p>
        
            </div>
            <div class="footer-social">
                <a href="https://www.facebook.com/slztelecom" class="social-icons"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/slztelecom" class="social-icons"><i class="fa fa-instagram"></i></a>
                <a href="https://www.youtube.com/slztelecom" class="social-icons"><i class="fa fa-youtube"></i></a>
                <a href="https://twitter.com/slztelecom" class="social-icons"><i class="fa fa-twitter"></i></a>
            </div>
        </footer>
    </main>

</div>

    <!-- Link do WhatsApp --> 
    <a href="https://api.whatsapp.com/send?l=pt&amp;phone=559832597153" target="_blank">
        <img src="https://i.imgur.com/ryESuZ5.png" style="height:64px; position:fixed; bottom: 25px; left: 25px; z-index:99999;" data-selector="img">
    </a>

    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        window.onload = function() {
           //document.getElementById("visitaAR").click();
        }
    </script>
    
    @if(Session::has('message'))
        <script>
            bootbox.alert({message: '{!!  Session::get("message") !!}',size: 'small'});
        </script>
    @endif

</body>

</html>
