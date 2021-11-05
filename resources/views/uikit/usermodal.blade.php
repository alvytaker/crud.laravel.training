<!--Modal Listado Usuarios -->
<div class="modal fade" id="editChildresn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <td><a href="#" class="btn btn-outline-dark">Exportar Usuarios en Excel</a></td>
        <div class="modal-header" style="background-color: #563d7c !important;">
          <h6 class="modal-title" style="color: #fff; text-align: center;">
              Informacion de los Usuarios
          </h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="table-responsive">
           
            <table class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                           
                  </tr>
              
                </thead>
                <tbody>
                @foreach($users as $user)
                  <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a href="#" class="btn btn-success btn-sm">Exportar</a>
              
                  </tr>
                
                  @endforeach()
              
              
              
              </tbody>
              </table>
        </div>  
      </div>
    </div>
  </div>

  