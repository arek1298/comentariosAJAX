<?php 
include 'db.php';
// Recibir datos del formulario
$nombre = $_POST['nombre'];
$comentario = $_POST['comentario'];

// Insertar comentario en la base de datos
$sql = "INSERT INTO comentarios (nombre, comentario) VALUES ('$nombre', '$comentario')";

if ($conn->query($sql) === TRUE) {
    echo "Comentario enviado con éxito";
} else {
    echo "Error al enviar el comentario: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>