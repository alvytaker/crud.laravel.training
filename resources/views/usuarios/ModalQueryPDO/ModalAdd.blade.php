<!--ventana para Add--->
<div class="modal fade" id="AddUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #563d7c !important;">
          <h6 class="modal-title" style="color: #fff; text-align: center;">
              Agregar un nuevo Usuario
          </h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
  
        <form method="POST" action="{{ route('user.AddQueryPDO') }}" class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
        @csrf
  
              <div class="modal-body" id="cont_modal">
  
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" required="true">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Email</label>
                    <input type="text" name="email" class="form-control" required="true">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Password</label>
                    <input type="password" name="password" class="form-control" required="true">
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Profesion</label>
                    <select for="recipient-name" name="profession_id" class="form-control">
                    @foreach ($profession as $pro)
                      <option value="{{$pro->id}}">{{ $pro->title }}</option>
                    @endforeach
                    </select>
                </div>
               
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Agregar</button>
              </div>
         </form>
  
      </div>
    </div>
  </div>
  <!---fin ventana Add --->