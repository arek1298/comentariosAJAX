
<?php
include 'db.php';
$nombre = $_POST['nombre'];
$comentario = $_POST['comentario'];


$sql = "INSERT INTO comentarios (nombre, comentario) VALUES ('$nombre', '$comentario')";

if ($conn->query($sql) === TRUE) {
    echo "Comentario enviado con éxito";
} else {
    echo "Error al enviar el comentario: " . $conn->error;
}


$conn->close();
?>
