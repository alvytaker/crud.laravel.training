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
  
  
        <form method="POST" action="{{ route('user.EditQueryPDO', $user->id) }}" class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
        @method('PUT')
        @csrf
  
              <div class="modal-body" id="cont_modal">
  
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required="true">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" required="true">
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Profesion</label>
                    <select for="recipient-name" name="profession_id" class="form-control">
                    <option type="text" value="{{ $user->profession_id }}">{{ $user->title }}</option>
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