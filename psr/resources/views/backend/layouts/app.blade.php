<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/backend/others.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css">
    <!-- Social Sharing -->
    <link rel="stylesheet" type="text/css" href="/css/backend/font-awesome/css/font-awesome.min.css">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
    </script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/backend') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if (!Auth::guest())
                          @if(Auth::user()->type_id == 1 || Auth::user()->type_id == 2)

                            @if(Auth::user()->type_id == 1)
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Secciones <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="/backend/sections"/> Ver</a></li>
                                        <li><a href="/backend/sections/create"/> Nueva</a></li>
                                    </ul>
                                </li>
                            @endif

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Contenidos <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                  @forelse($menuSections as $section)
                                    <li><a href="/backend/contents/section/{{ $section->id }}"/> {{ $section->name }}</a></li>
                                  @empty
                                  @endforelse
                                </ul>
                            </li>

                            @if(Auth::user()->type_id == 1)
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        Usuarios
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="/backend/users"/> Ver</a></li>
                                    </ul>
                                </li>
                            @endif

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Datos
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/backend/contacts"/> Contactos
                                      @if(isset($not_responded))
                                        <span class="badge">{{ $not_responded }}</span>
                                      @endif</a>
                                    </li>
                                    <li><a href="/backend/accessions"/> Adhesiones</a></li>

                                    @if(Auth::user()->type_id == 1)
                                        <li><a href="/backend/polls"/> Encuestas</a></li>
                                    @endif
                                    
                                </ul>
                            </li>
                            <li>
                                <a href="/" target="_blank">Web</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/backend/contacts"/> Ver</a></li>
                                </ul>
                            </li>
                          @elseif(Auth::user()->type_id == 2)
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Contenidos <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                  @forelse($menuSections as $section)
                                    <li><a href="/backend/contents/section/{{ $section->id }}"/> {{ $section->name }}</a></li>
                                  @empty
                                  @endforelse
                                </ul>
                            </li>
                          @endif
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (!Auth::guest())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <img class="img-user-layout" height="30px" src="/{{ Auth::user()->img }}" /> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/backend/users/{{ Auth::user()->id }}/edit">Editar mis Datos</a></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>



                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a href='#' data-toggle="modal" data-target="#modalResetPassword">
                                            Cambiar Password
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    

    <!-- Modal -->
    <div id="modalResetPassword" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Cambiar Clave Generica</h4>
          </div>
          <div class="modal-body">
            <h3>Debe cambiar la clave, por una mas segura!</h3>
            <p>
                <input type="text" id="password" class="form-control" placeholder="Coloque la nueva clave">
            </p>
            <p id="msj" class="danger"></p>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id='btnCambiarClave' onclick="cambiarClave()">Cambiar Clave</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>



    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/backend/functions.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>
    <script src="/js/backend/tinymce/tinymce.min.js"></script>
    <!-- <script src="/js/backend/tinymce/jquery.tinymce.min.js"></script> -->
    <script>
      //JS para Tags
      @if(isset($content))
        $(".tags").select2().val({!! json_encode($content->tags()->getRelatedIds()) !!}).trigger('change');
      @endif
      @if(isset($user))
        $(".provinces").select2().val({!! json_encode($user->provinces()->getRelatedIds()) !!}).trigger('change');
        $(".countries").select2().val({!! json_encode($user->countries()->getRelatedIds()) !!}).trigger('change');
      @endif

      @if(isset(Auth::user()->email))
          @if(Hash::check(Auth::user()->email, Auth::user()->password))
            $("#modalResetPassword").modal("show");            
          @endif
          function cambiarClave(){
                if($('#password').val().length > 4){
                    $("#btnCambiarClave").hide();
                    $.post('backend/resetearClave',{'_token': $('meta[name=csrf-token]').attr('content'), 
                                            password: $('#password').val(),
                                            email: '',
                                            id: <?php echo Auth::user()->id; ?>
                                        }, 
                    function(data){
                        if(data){  
                            $("#msj").html('Se Guardo Correctamente la Clave')
                        }else{
                            $("#msj").html('No se pudo guardar la clave!')
                        }
                        setTimeout(function(){
                            $('#modalResetPassword').modal('hide');
                        }, 2000);
                    });
                }else{
                    $("#msj").html('La clave nueva, Debe tener mas de 5 caracteres!')
                }
            }
        @endif
    </script>

</body>
</html>
