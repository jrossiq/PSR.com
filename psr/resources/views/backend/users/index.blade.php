@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading"><h3>Usuarios <a class="btn btn-success" href="/backend/users/create">Crear</a></h3>
            </div>
              <div class="panel-body">

                @if(isset($message))
                  <div class="col-md-10 col-md-offset-1">
                      <div class="alert alert-success message">
                          <h5>{{ $message }}</h5>
                      </div>
                  </div>
                @endif
                
                <h4>Administradores</h4>
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th width="45%">Nombre de Usuario</th>
                      <th width="40%">E-Mail</th>
                      <th width="15%">Acciones</th>
                    </tr>
                    @forelse($users->where('type_id', 1) as $user)
                      <tr>
                        <td><a href="/backend/users/{{ $user->id }}">{{ $user->name }}</a></td>
                        <td id='email'>{{ $user->email }}</td>
                        <td>
                          <a class="btn btn-primary btn-xs" href="/backend/users/{{ $user->id }}/edit">
                            <i class="fa fa-pencil-square-o"></i>
                          </a>
                          <button class="btn btn-warning btn-xs" onclick="openPopUp('{{ $user->id }}','{{ $user->email }}')">
                            <i class="fa fa-refresh"></i>
                          </button>

                          <button class="btn btn-default btn-xs" onclick="openDeletePopUp('{{ $user->id }}','{{ $user->email }}','{{ $user->active }}')" id="btnActivarBaja">
                            @if ($user->active)
                              <i class="fa fa-thumbs-down" style="color: red" title="Dar de Baja"></i>
                            @else
                              <i class="fa fa-thumbs-up" style="color: green" title="Dar de Alta"></i>
                            @endif

                          </button>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="2">No hay Usuarios en la base.</td>
                      </tr>
                    @endforelse
                  </table>
                </div>
                <hr />
                <h4>Supervisores</h4>
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th width="45%">Nombre de Usuario</th>
                      <th width="40%">E-Mail</th>
                      <th width="15%"></th>
                    </tr>
                    @forelse($users->where('type_id', 2) as $user)
                      <tr>
                        <td width="35%"><a href="/backend/users/{{ $user->id }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>
                          <a class="btn btn-primary btn-xs" href="/backend/users/{{ $user->id }}/edit">
                            <i class="fa fa-pencil-square-o"></i>
                          </a>
                          <button class="btn btn-warning btn-xs" onclick="openPopUp('{{ $user->id }}','{{ $user->email }}')">
                            <i class="fa fa-refresh"></i>
                          </button>

                          <button class="btn btn-default btn-xs" onclick="openDeletePopUp('{{ $user->id }}','{{ $user->email }}','{{ $user->active }}')" id="btnActivarBaja">
                            @if ($user->active)
                              <i class="fa fa-thumbs-down" style="color: red" title="Dar de Baja"></i>
                            @else
                              <i class="fa fa-thumbs-up" style="color: green" title="Dar de Alta"></i>
                            @endif

                          </button>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="2">No hay Usuarios en la base.</td>
                      </tr>
                    @endforelse
                  </table>
                </div>
                <hr />
                <h4>Coordinadores</h4>
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th>Nombre de Usuario</th>
                      <th>E-Mail</th>
                      <th>Teléfono</th>
                      <th>Zona</th>
                      <th>Acciones</th>
                    </tr>
                    @forelse($users->where('type_id', 3) as $user)
                      <tr>
                        <td><a href="/backend/users/{{ $user->id }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->telephone }}</td>
                        <td>{{ $user->provinces[0]->name }} / {{ $user->zone }}</td>
                        <td>
                          <a class="btn btn-primary btn-xs" href="/backend/users/{{ $user->id }}/edit">
                            <i class="fa fa-pencil-square-o"></i>
                          </a>
                          <button class="btn btn-warning btn-xs" onclick="openPopUp('{{ $user->id }}','{{ $user->email }}')">
                            <i class="fa fa-refresh"></i>
                          </button>

                          <button class="btn btn-default btn-xs" onclick="openDeletePopUp('{{ $user->id }}','{{ $user->email }}','{{ $user->active }}')" id="btnActivarBaja">
                            @if ($user->active)
                              <i class="fa fa-thumbs-down" style="color: red" title="Dar de Baja"></i>
                            @else
                              <i class="fa fa-thumbs-up" style="color: green" title="Dar de Alta"></i>
                            @endif

                          </button>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="2">No hay Usuarios en la base.</td>
                      </tr>
                    @endforelse
                  </table>
                </div>
                <hr />
                <h4>Otros</h4>
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th width="45%">Nombre de Usuario</th>
                      <th width="40%">E-Mail</th>
                      <th width="15%"></th>
                    </tr>
                    @forelse($users->where('type_id', 0) as $user)
                      <tr>
                        <td width="35%"><a href="/backend/users/{{ $user->id }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>
                          <a class="btn btn-primary btn-xs" href="/backend/users/{{ $user->id }}/edit">
                            <i class="fa fa-pencil-square-o"></i>
                          </a>
                          <button class="btn btn-warning btn-xs" onclick="openPopUp('{{ $user->id }}','{{ $user->email }}')">
                            <i class="fa fa-refresh"></i>
                          </button>

                          <button class="btn btn-default btn-xs" onclick="openDeletePopUp('{{ $user->id }}','{{ $user->email }}','{{ $user->active }}')" id="btnActivarBaja">
                            @if ($user->active)
                              <i class="fa fa-thumbs-down" style="color: red" title="Dar de Baja"></i>
                            @else
                              <i class="fa fa-thumbs-up" style="color: green" title="Dar de Alta"></i>
                            @endif

                          </button>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="2">No hay Usuarios en la base.</td>
                      </tr>
                    @endforelse
                  </table>
                </div>
                <hr />
              </div>
          </div>
      </div>
    </div>
</div>


<!-- Modal -->
<div id="modalResetClave" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reinicio de clave de usuario</h4>
      </div>
      <div class="modal-body">
        <h2>Estas por resetear la clave del usuario...</h2>
        <h3>Esta seguro?</h3>
        <input type="hidden" id="id" value="0">
        <input type="hidden" id="email" value="0">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btnReset" onclick="resetearClaveUsuario()">Reiniciar Clave</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalDelete" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alta / Baja de usuario</h4>
      </div>
      <div class="modal-body">
        <h3>Estas por dar de <span id="msjActive"></span> al usuario: <i id='emailUser'></i></h3>
        <h3>Esta seguro?</h3>
        <input type="hidden" id="id" value="0">
        <input type="hidden" id="active" value="0">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="btnReset" onclick="bajaUsuario()">Dar de <span id="msjActives"></span></button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reinicio de clave de usuario</h4>
      </div>
      <div class="modal-body">
        <h2 id='descripcion'></h2>
      </div>
      <div class="modal-footer">        
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  
    function openPopUp(id,email){
      $('#modalResetClave').modal('show');
      $('#id').val(id);
      $('#email').val(email);
    }

    function openDeletePopUp(id,email,active){
      $('#modalDelete').modal('show');
      $('#id').val(id);
      $('#active').val(active);      
      $('#emailUser').html(email);
      var msjActive = 'baja';
      if(active == 0){
        msjActive = 'alta';
      }
      $('#msjActive').html(msjActive);
      $('#msjActives').html(msjActive);
    }


    function resetearClaveUsuario(){
      var id = $('#id').val();
      var email = $('#email').val();
      $('#modalResetClave').modal('hide');

      $.post('resetearClave',{'_token': $('meta[name=csrf-token]').attr('content'), 
                                      id: id, 
                                      email: email}, 
      function(data){
        if(data){
          $("#descripcion").html("Se reinicio correctamente la clave");
          $('#modal').modal('show');
        }else{
          $("#descripcion").html("Error, no se pudo Reiniciar la clave");
          $('#modal').modal('show');
        }
      });
    }

    function bajaUsuario(){
      var id = $('#id').val();
      var active = $('#active').val();
      $('#modalDelete').modal('hide');
      $.post('bajaUsuario',{'_token': $('meta[name=csrf-token]').attr('content'), 
                                      id: id, active: active}, 
      function(data){
        if(data){
          if($('#active').val() == 0){
            $("#descripcion").html("Se dio correctamente de alta al usuario");
          }else{
            $("#descripcion").html("Se dio correctamente de baja al usuario");
          }
          $('#modal').modal('show');
          setTimeout(function(){ location.reload(); }, 1000);
        }else{
          $("#descripcion").html("Error, no se pudo dar de baja");
          $('#modal').modal('show');
        }
      });
    }
  
</script>

@endsection