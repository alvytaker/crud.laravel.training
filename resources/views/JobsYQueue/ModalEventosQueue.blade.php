<div class="modal fade" id="Queue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #563d7c !important;">
          <h6 class="modal-title" style="color: #fff; text-align: center;">
              Ejecutar una tarea
          </h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

      <div class="container">

        <a class="btn btn-success" href="{{ route('queueemail') }}" style="color: #fff; text-align: center;" >
            Ejecutar QUEUE Bien
        </a>

        <a class="btn btn-danger" href="{{ route('emailusersfails') }}" style="color: #fff; text-align: center;">
            Ejecutar QUEUE Mal
        </a>

       </div>

  
      </div>
    </div>
  </div>