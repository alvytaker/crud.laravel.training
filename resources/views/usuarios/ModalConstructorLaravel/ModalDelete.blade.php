
<!-- Ventana modal para eliminar -->
<div class="modal fade" id="deleteUser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #563d7c !important;">
            <h4 class="modal-title text-center" style="color: #fff; text-align: center;">           
                <span>¿Realmente deseas eliminar al Usuario ? </span>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> 

        </div>

        <div class="modal-body mt-5 text-center">
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{ $user->name_user }}" required="true">
              </div>

          <strong style="text-align: center !important"> 
          
           ID {{ $user->id }}
           
         </strong>

        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <a  class="btn btn-danger" href="{{ route('user.DeleteLaravelQuery', $user->id) }}">Borrar</a>
        </div>
        
        </div>
      </div>
</div>
<!---fin ventana eliminar--->
