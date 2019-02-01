<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {{-- Meta tags for SEO --}}
    <title>{{ config('Bureau Des Exars', 'Bureau Des Exars') }}</title>
    <meta name="description" content="Le site du BDE du CESI, Ecole d'Ingénieurs. Evenements, boutique, suggestions"/>
    <link rel="canonical" href="https://bde.cesi.fr/" />
    <meta name="author" content="BDE CESI, CESI"/>
    <meta name="keywords" content="BDE CESI, Bureau des Exars CESI, Bureau Des Eleves, CESI, BDE, Ecole d'Ingénieurs"/>
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="BDE CESI, Bureau des élèves, BDE CESI Paris Lyon Strasbourg Saint-Nazaire" />
    <meta property="og:description" content="Le site du BDE du CESI, Ecole d'Ingénieurs. Evenements, boutique, suggestions" />
    <meta property="og:url" content="https://bde.cesi.fr/" />
    <meta property="og:site_name" content="Association du Bureau Des Eleves du CESI" />
    <meta property="og:image" content="https://bde.cesi.fr/img/CESI_Corporate_Ecole_Ingenieurs.jpg" />
    <meta property="og:image:secure_url" content="https://bde.cesi.fr/img/CESI_Corporate_Ecole_Ingenieurs.jpg" />
    <meta property="og:image:width" content="1903" />
    <meta property="og:image:height" content="1875" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="Le site du BDE du CESI, Ecole d'Ingénieurs. Evenements, boutique, suggestions" />
    <meta name="twitter:title" content="BDE CESI, Bureau des élèves, BDE CESI Paris Lyon Strasbourg Saint-Nazaire" />
    <meta name="twitter:site" content="@BdeExiaStrg" />
    <meta name="twitter:image" content="https://pbs.twimg.com/profile_images/740904177350643712/AgsnAE3U_400x400.jpg" />
    <meta name="twitter:creator" content="@BdeExiaStrg" />
    
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/DOMInteraction.js') }}" defer></script>
    <script src="{{ asset('js/interaction.js') }}" defer></script>
    <script src="{{ asset('js/ajax.js') }}" defer></script>
    <script src="{{ asset('js/cesi_management.js') }}" defer></script>
    
    <script src="{{ asset('vendor/DataTables/datatables.min.js') }}" defer></script>
    @stack('head')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav_foot.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/DataTables/datatables.min.css') }}" rel="stylesheet">
    
    <script>
        var connected_user = ({!! json_encode(Auth::user()) !!});
        var APItoken = {!! json_encode(Session::get('APItoken')) !!};
    </script>
</head>
<body>
    <div id="alert" class="alert alert-hidden" onclick="$(this).addClass('alert-hidden')">Alerte</div>
    
    @include('legal.cookie')

    <div class="modal fade" id="upload-picture" tabindex="-1" role="dialog" aria-labelledby="upload-picture-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="upload-picture-title">Chargement d'image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="upload-picture-form" enctype="multipart/form-data" method="post" action="{{url('adminUploadPicture')}}">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token()}}">
                            <input type="hidden" name="id_user" value="{{ Auth::id()}}">
                            <input id="upload-picture-form-id_event" type="hidden" name="id_event" value="">
                            <label>Fichier</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" data-target="" id="upload-picture-ok" class="btn btn-primary" onclick="uploadPicture('upload-picture', $(this).data('target'))">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <div id="app">
        
        @include('layouts.navigation')
        
        <main>
            @yield('content')
        </main>
        
        @include('layouts.footer')
    </div>
</body>
</html>
