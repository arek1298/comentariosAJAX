$(document).ready(function() {
    // Manejar el envío del formulario de comentario
    $("#comentarioForm").submit(function(event) {
        event.preventDefault(); // Evitar la recarga de la página al enviar el formulario
        enviarComentario();
    });

    // Manejar el clic en el enlace para ver comentarios
    $("#verComentarios").click(function() {
        cargarComentarios();
    });
});

// Función para enviar un comentario mediante AJAX
function enviarComentario() {
    var nombre = $("#nombre").val();
    var comentario = $("#comentario").val();

    $.ajax({
        type: "POST",
        url: "procesar_comentario.php",
        data: { nombre: nombre, comentario: comentario },
        success: function(response) {
            alert(response); // Puedes personalizar cómo manejar la respuesta del servidor
            $("#nombre").val("");
            $("#comentario").val("");
        },
        error: function(error) {
            alert("Error al enviar el comentario");
        }
    });
}

// Función para cargar y mostrar comentarios mediante AJAX
// Función para cargar y mostrar comentarios mediante AJAX
function cargarComentarios() {
    $.ajax({
        type: "GET",
        url: "ver_comentarios.php",
        success: function(response) {
            // Limpiar el contenedor antes de agregar nuevos comentarios
            $("#comentariosContainer").empty();

            // Convertir la respuesta (HTML) en elementos jQuery
            var comentarios = $(response);

            // Agregar cada comentario como una tarjeta
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
