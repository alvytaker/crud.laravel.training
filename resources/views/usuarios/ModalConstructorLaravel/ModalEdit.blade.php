<!--ventana para Update--->
<div class="modal fade" id="editUser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #563d7c !important;">
          <h6 class="modal-title" style="color: #fff; text-align: center;">
              Actualizar Información
          </h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
  
        <form method="POST" action="{{ route('user.EditLaravelQuery', $user->id) }}" class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
        @method('PUT')
        @csrf
  
              <div class="modal-body" id="cont_modal">
  
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name_user}}" required="true">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" required="true">
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Profesion</label>
                    <select for="recipient-name" name="profession_id" class="form-control">
                    @foreach($profession as $profe)
                    <option type="text" value="{{ $profe->id}}" {{ $profe->title == $user->title ? 'selected' : ''}}>{{ $profe->title}}</option>
                    @endforeach()
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Region</label>
                    <select id="regionedit" for="recipient-name" name="regionedit" class="form-control">
                    @foreach($regiones as $reg)
                    <option type="text" value="{{ $reg->id}}" {{ $reg->name == $user->name_region ? 'selected' : ''}}>{{ $reg->name}}</option>
                    @endforeach()
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Comuna</label>
                    <select id="comunaedit" for="recipient-name" name="comunaedit" class="form-control">
                 {{-- @foreach($comunas as $com) --}}   
                    <option type="text">{{ $user->name_comuna}}</option>
                    {{--  @endforeach() --}}
                    </select>
                  </div>
            
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
              </div>
         </form>
  
      </div>
    </div>
  </div>



  <!---fin ventana Update --->