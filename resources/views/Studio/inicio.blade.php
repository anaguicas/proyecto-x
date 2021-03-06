<html>
<head>
    <title>Pandora</title>
    <link media="all" type="text/css" rel="stylesheet" href="../../public/media/css/bootstrap.min.css">
    <link media="all" type="text/css" rel="stylesheet" href="../../public/media/css/landing.css">
    <link media="all" type="text/css" rel="stylesheet" href="../../public/media/css/layout.css">
    <link media="all" type="text/css" rel="stylesheet" href="../../public/media/css/pagina.css">
    <link media="all" type="text/css" rel="stylesheet" href="../../public/media/css/datepicker.css">
    <!-- <link media="all" type="text/css" rel="stylesheet" href="../../public/media/css/studio.css"> -->
    <!--link media="all" type="text/css" rel="stylesheet" href="{{env('MEDIA_URL')}}/css/bootstrap.css"-->
    <link media="all" type="text/css" rel="stylesheet" href="">
    @yield('styles')
    
</head>
<body>
    <div class="col-lg-12">
        <div align="center">
            <div class="col-lg-12">
                <div class="row pandora">
                    <h1>
                        <a href="{{route('landing')}}">
                            <img src="../../public/media/img/Usuario/Índice/pandora.png">
                        </a>
                    </h1>       
                </div>
            </div>
        </div>       
         <div align="center">
            <div class="col-md-12 menu">
                <ul>
                  <li class="hexagon">
                    <a class="hexagon-in1" href="{{route('studio.addperformer')}}">
                        <span class="hexagon-in2">
                            <img class="perfil" src="../../public/media/img/Indice/register-model-studio.png">
                        </span>
                    </a>
                </li>
                <li class="hexagon">      
                    <a class="hexagon-in1" href="{{route('studio.editprofile',$id)}}">
                        <span class="hexagon-in2">
                            <img class="perfil" src="../../public/media/img/Usuario/Índice/perfil-2.png">
                        </span>
                    </a>
                </li>
                <li class="hexagon">      
                    <a class="hexagon-in1" href="{{route('logout')}}">
                        <span class="hexagon-in2">
                            <img class="perfil" src="../../public/media/img/Indice/log-out.png">
                        </span>
                    </a>
                </li>
                <li class="hexagon">      
                    <a class="hexagon-in1" href="{{route('studio.showperformers')}}">
                        <span class="hexagon-in2">
                            <img class="perfil" src="../../public/media/img/Admin/Indice/studio y modelo.png">
                        </span>
                    </a>
                </li>
                <li class="hexagon">      
                    <a class="hexagon-in1" href="#">
                        <span class="hexagon-in2">
                            <img class="perfil" src="../../public/media/img/Indice/tokens-studio.png">
                        </span>
                    </a>
                </li>
                <li class="hexagon">      
                    <a class="hexagon-in1" href="{{route('studio.editprofile',$id)}}">
                        <span class="hexagon-in2">
                            <img class="perfil" src="../../public/media/img/Indice/actividad-admin.png">
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>   
    </div>
</body>
</html>
