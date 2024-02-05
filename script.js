$(document).ready(function() {
   
    $("#comentarioForm").submit(function(event) {
        event.preventDefault(); 
        enviarComentario();
    });

    
    $("#verComentarios").click(function() {
        cargarComentarios();
    });
});


function enviarComentario() {
    var nombre = $("#nombre").val();
    var comentario = $("#comentario").val();

    $.ajax({
        type: "POST",
        url: "procesar_comentario.php",
        data: { nombre: nombre, comentario: comentario },
        success: function(response) {
            alert(response); 
            $("#nombre").val("");
            $("#comentario").val("");
        },
        error: function(error) {
            alert("Error al enviar el comentario");
        }
    });
}


function cargarComentarios() {
    $.ajax({
        type: "GET",
        url: "ver_comentarios.php",
        success: function(response) {
           
            $("#comentariosContainer").empty();

           
            var comentarios = $(response);

           
            comentarios.each(function() {
                var nombre = $(this).find('.nombre').text();
                var fecha = $(this).find('.fecha').text();
                var textoComentario = $(this).find('.comentario').text();

                var cardHTML = `
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">${nombre} <small class="text-muted">${fecha}</small></h5>
                            <p class="card-text">${textoComentario}</p>
                        </div>
                    </div>
                `;

                $("#comentariosContainer").append(cardHTML);
            });
        },
        error: function(error) {
            alert("Error al cargar los comentarios");
        }
    });
}
