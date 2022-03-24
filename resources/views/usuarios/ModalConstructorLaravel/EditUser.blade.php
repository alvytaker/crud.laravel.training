@extends('master')


@section('body')

@foreach($users as $user)
  <form method="POST" action="{{ route('register') }}" class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
    @csrf
    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Rut</label>
      <input type="text" name="name" class="form-control" value="{{ $user->rut}}" required="true">
    </div>

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
      <select for="recipient-name" id="regioneditt" name="regionedit" class="form-control">
      @foreach($regiones as $reg) 
      <option type="text" value="{{ $reg->id}}" {{ $reg->name == $user->name_region ? 'selected' : ''}}>{{ $reg->name}}</option>
      @endforeach()
     
      </select>
    </div>

    <div class="form-group">
      <label for="recipient-name" class="col-form-label">Comuna</label>
      <select id="comunaeditt" for="recipient-name" name="comunaedit" class="form-control">
   {{-- @foreach($comunas as $com) --}}   
      <option type="text">{{ $user->name_comuna}}</option>
      {{--  @endforeach() --}}
      </select>
    </div>
            

          <div>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
     </form>
  @endforeach()

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
<script>
  $("#regioneditt").change(function(){
      comunasedit();
    // alert("hola");
     });
     function comunasedit(){
//alert("hola");
   document.getElementById("comunaeditt").innerHTML = null;
    $.ajax({
              url:  '{{route('cargarcomunasedit')}}',
              method: 'GET' ,
              data:$("#regioneditt").serialize()

              }).done(function(com){
               arreglo = JSON.parse(com);
               for (var i=0; i<arreglo.length; i++) { 
             todo = '<option value="'+arreglo[i].id+'">'+arreglo[i].name+'</option>';

             $('#comunaeditt').append(todo);
               }
              }); 
    }
</script>



@stop
