<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    
    <style>
        .navbar-brand img {
            position:relative;
            top:-65%;
            width: 50px;
            height: 50px;
            border-radius: 5px;
        }
    </style>

</head>

<body>
    <div id="app">
        @php
        $navbar = Navbar::withBrandImage(
            '/imagem/'.strtolower(config('app.name')).'.png', 
            route('admin.dashboard'))->inverse();
            
            if(Auth::check()){
                
                if(\Gate::allows('admin')){
                    /** lista de menu top */
                    $arrayLinks = [
                        ['link' => route('admin.empresa.index'), 'title' => Icon::home().' Empresa'],
                        ['link' => route('admin.cliente.index'), 'title' => Icon::asterisk().' Cliente'],
                        ['link' => route('admin.produto.index'), 'title' => Icon::th().' Produtos'],
                        ['link' => route('admin.visita.index'), 'title' => Icon::wrench().' Visita Técnica'],
                        ['link' => route('admin.user.index'), 'title' => Icon::user().'Usuário']
                    ];
                    
                } else if(\Gate::allows('tecnico')){
                    $arrayLinks = [
                        ['link' => route('admin.visita.index'), 'title' => Icon::wrench().' Visita Técnica']
                    ];
                } 
                else if(\Gate::allows('cliente')){
                    $arrayLinks = [
                        ['link' => route('admin.visita.index'), 'title' => Icon::wrench().' Visita Técnica']
                    ];
                }
                
                $navbar->withContent(Navigation::links($arrayLinks));

                $arrayLinksRight = [
                    [
                        Icon::user().' '.Auth::user()->name,
                        [
                            [
                                'link' => route('admin.users.settings.edit'),
                                'title'=> Icon::cog().'Configurações',
                            ],
                            [
                                'link' => route('logout'),
                                'title' => Icon::open().'Logout',
                                'linkAttributes' => [
                                    'onclick' => "event.preventDefault();document.getElementById(\"form-logout\").submit();"
                                ]
                            ],
                            //['link' => route('admin.user.index'), 'title' => Icon::user().'Usuário']
                        ]
                    ]
                ];
                $navbar->withContent(Navigation::links($arrayLinksRight)->right());

                $formLogout = FormBuilder::plain([
                        'id' => 'form-logout',
                        'url' => route('logout'),
                        'method' => 'POST',
                        'style' => 'display:none'
                    ]);
            }
        @endphp
    {!! $navbar !!}

    @if(Auth::check())
        {!! form($formLogout) !!}
    @endif

    @if(Session::has('message'))
        <div class="container hidden-print">
            {!! Alert::success(Session::get('message'))->close() !!}
        </div>
    @endif

        <div class="container">
            <div class="row">

                <main class="col-sm-12">
                    @php
                        $caminho = explode(".", Route::getCurrentRoute()->getName())[1];
                    @endphp

                        {!! Breadcrumb::withLinks(array('Home' => '#', $caminho)) !!} 

                    @yield('content')
                </main>

            </div>
        </div>


    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>