<div class="modal fade" id="Jobs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #563d7c !important;">
          <h6 class="modal-title" style="color: #fff; text-align: center;">
              Ejecutar un evento Job
          </h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="container">

        {{-- <aclass="btnbtn-success"href="route('updatefecha',1)" style="color: #fff; text-align: center;" >
              Ejecutar JOBS Bien
          </a>
          

          <a class="btn btn-danger" href="{{ route('updatefecha',0) }}" style="color: #fff; text-align: center;" >
             Ejecutar JOBS Mal
          </a> 
        --}}
        
          <form method="post" action="{{ route('jobcontroller')}}">
          @csrf
          <select name="jobsact" class="form-control">
              <option value="1" class="btn btn-info">Ejecutar JOBS actualizar 'created_at' Bien</option>
              <option value="0" class="btn btn-danger">Ejecutar JOBS actualizar 'created_at' Mal</option>
              <option value="3" class="btn btn-info">Ejecutar JOBS validar 'datos_repetidos' Bien</option>
              <option value="2" class="btn btn-danger">Ejecutar JOBS validar 'datos_repetidos' Mal</option>

          </select>
          
            <button type="submit" class="btn btn-primary">action</button>
        </form>
         </div>
  
      </div>
    </div>
  </div>