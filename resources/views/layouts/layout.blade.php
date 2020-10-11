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
    <!-- <link rel="stylesheet" href="assets/css/Footer-white.css"> -->

    <style>
        body{
            background-color: rgba(255, 255, 255, 0.884);
        }
        .img-tecnico {
            border-radius: 10px;
            weight: 200px;
            height: 450px;
            transition: all 0.5s;
            cursor: pointer;
        }
        .img-tecnico:hover {
            -webkit-filter: drop-shadow(15px 10px 5px rgba(0, 0, 0, .5));
            filter: drop-shadow(15px 10px 5px rgba(0, 0, 0, .5));
        }
        .imagem {
            transition: all 0.5s;
            cursor: pointer;
        }
        .imagem:hover {
            -webkit-filter: drop-shadow(15px 10px 5px rgba(0, 0, 0, .5));
            filter: drop-shadow(15px 10px 5px rgba(0, 0, 0, .5));
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .circulo-1{
            background-image: url("{{ asset('imagem/circulo1.svg') }}");
            background-repeat: no-repeat;
        }
        .circulo-2{
            background-image: url("{{ asset('imagem/circulo2.svg') }}");
            background-repeat: no-repeat;
        }
        .circulo-3{
            background-image: url("{{ asset('imagem/circulo3.svg') }}");
            background-repeat: no-repeat;
        }
        .img-carousel {
            width:100%;
            height:100%;
        }
        @media (max-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
            img-tecnico {
                border-radius: 10px;
                weight: 100px;
                height: 350px;
                transition: all 0.5s;
                cursor: pointer;
            }

            .carousel-alt {
                height: 190px;
            }
            .carousel-alt ol {
                top: 100%;
            }
            .carousel-img {
                margin-top: 5%;
                height: 200px;
            }
            .img-carousel {
                height: 200px;
            }
        }
        
    </style>

    <!-- Custom styles for this template <link href="css/carousel.css" rel="stylesheet"> -->
   
    <!-- Google Analytics Global site tag (gtag.js)  
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-102363462-4"></script> 
    <script>
        window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-102363462-4');
    </script> -->

    <!-- jivosite chat-->
    <!-- <script src="//code.jivosite.com/widget/W5CU0zEjTb" async></script> -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body>

<div id="app">
    <header>
        <!-- MENU -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">
                <img class="empresaimg" src={{ $empresas->urlimage }} alt=""> {{ config('app.name', '') }}  
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <div>Menu</div> <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="visitaAR" href="#" data-toggle="modal" data-target="#ModelVisitaTecnica">Visita de Técnica</a>
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

                        </a>
                    </li>
                    <!-- <li><a href="{{ route('register') }}" class="btn btn-primary">Register</a></li> -->
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle btn btn-primary" data-toggle="dropdown" role="button" aria-expanded="false">
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

        <div id="myCarousel" class="carousel slide carousel-fade carousel-alt" data-ride="carousel">
            
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active carousel-img"> 
                    <div class="img-carousel"> 
                            <img src="/imagem/carrocel1.png" width="100%" height="100%" alt=""> 
                    </div>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1></h1>
                            <p></p>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-img">
                    <div class="img-carousel">
                        <img src="/imagem/carrocel2.png" width="100%" height="100%" alt="">
                    </div>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1></h1>
                            <p></p>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-img">
                    <div class="img-carousel">
                        <img src="/imagem/carrocel3.png" width="100%" height="100%" alt="">
                    </div>               
                    <div class="container">
                        <div class="carousel-caption">
                            <h1></h1>
                            <p></p>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>

        <!-- Modal de Cadastro de visitas de AR -->
        <div class="modal fade" id="ModelVisitaTecnica" tabindex="-1" role="dialog"
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

                        {!!  
                            form($form
                            ->add('edit', 'submit', [
                            'attr' => ['class' => 'btn btn-primary'],
                            'label' => Icon::pencil().' Enviar'
                            ]))
                        !!}
                        
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

        <!-- Marketing messaging and featurettes -->

        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle circulo-1 imagem" width="140" height="140"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false"
                        role="img" aria-label="Placeholder: 140x140">
                        
                    </svg></br>
                    <h2>PABX Intelbras</h2>
                    <p>Viabilizar uma rede interna de telefonia, oferecendo facilidade e eficiência à rotina de trabalho.</p>
                    <!-- <p><a class="btn btn-secondary" href="#" role="button">Mais detalhes &raquo;</a></p> -->
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle circulo-2 imagem" width="140" height="140"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false"
                        role="img" aria-label="Placeholder: 140x140">
                        
                    </svg></br>
                    <h2>CFTV - Circuito Fechado de Televisão</h2>
                    <p>Um sistema de captação e retenção de imagens feita por câmeras digitais ou analógicas e que permite a vídeo-vigilância
                    através de monitores conectados à uma rede central</p>
                    <!-- <p><a class="btn btn-secondary" href="#" role="button">Mais detalhes &raquo;</a></p> -->
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle circulo-3 imagem" width="140" height="140"
                        xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false"
                        role="img" aria-label="Placeholder: 140x140">
                        
                    </svg></br>
                    <h2>Ramais Telefonicos</h2>
                    <p>Um ramal para utilização com os telefones das séries TS 40, TS 60 ou TS 31 da Intelbras. Maior praticidade: recomendado
                    para quem precisa utilizar até 7 ramais sem fio em uma única linha.</p>
                    <!-- <p><a class="btn btn-secondary" href="#" role="button">Mais detalhes &raquo;</a></p> -->
                </div><!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->


            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Assistência Técnica &
                        <span class="text-muted">Manutenção.</span></h2>
                    <p class="lead">Profissional responsável por atuar na instalação, na operação e na manutenção de sistemas de telecomunicações.</p>
                </div>
                <div class="col-md-5">
                    <img src="imagem/Tecnico001.jpeg" class="img-tecnico" alt="">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Circuito fechado ou circuito interno de televisão & <span class="text-muted">
                        Aquisição de Solução de Videomonitoramento</span></h2>
                    <p class="lead">Sistema de televisão que distribui sinais provenientes de câmeras localizadas em locais específicos, para um ou mais
                    pontos de visualização.
                                    Nossa equipe sempre em conformidade com às especificações técnicas dos equipamentos e materiais e rotinas de acordo
                                    com as Normas ABNT (Associação Brasileira de Normas Técnicas).</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img src="imagem/Tecnico004.jpeg" class="img-tecnico" alt="">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Projeto de Rede Telefônica & <span class="text-muted">
                        Nas áreas industriais, residenciais, comerciais e prediais.</span></h2>
                    <p class="lead">Reestruturação entrega de topologia, revitalização embutir com novos matérias com tampa nova é organização dos
                    equipamentos e periféricos</p>
                </div>
                <div class="col-md-5">
                    <img src="imagem/Tecnico003.jpeg" class="img-tecnico" alt="">
                </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->

        </div>

        <!-- /.container -->


        <!-- FOOTER 
        <footer class="container">
            <i class="instagram"></i>
            <p class="float-right"><a href="#">Volta para o TOP</a></p>
            <p>&copy; 2017-2021 {{ $empresas->name }} &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer>
        -->

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
