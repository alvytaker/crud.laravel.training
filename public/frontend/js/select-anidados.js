function mostrarMensaje($mensaje){
    $("#div-msg").empty();
    $("#div-msg").append($mensaje);
}

$("#region").change(function(event) {

    var region = $('#region').val();
    if(!region){
        $("#div-msg").empty();
        $("#comuna").empty();
        $("#comuna").append("<option value=''>Seleccione Comuna</option>");
        return;
    }

    const urlComunas = $(this).data('url');

    // Documentación JQuery AJAX
    // https://api.jquery.com/jquery.ajax/

    $.ajax({
        type: "GET",
        url: urlComunas,
        data: {
            region: region
        },
        success: function(response) {
            const comunas = response.comunas;
            const mensaje = response.mensaje;
            $("#comuna").empty();
            $.each(comunas, function( $key, comuna ) {
                $("#comuna").append("<option value='"+comuna.id+"'>"+comuna.name+"</option>");
            });
            mostrarMensaje(mensaje);
        },
        error: function(response) {
            mostrarMensaje("Error al obtener Comunas");
        },
    });

});
