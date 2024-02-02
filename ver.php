<?php
include 'db.php';


$sql = "SELECT * FROM comentarios ORDER BY fecha DESC";
$result = $conn->query($sql);

// Mostrar comentarios
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>{$row['nombre']}</strong> ({$row['fecha']}): {$row['comentario']}</p>";
    }
} else {
    echo "No hay comentarios aún.";
}

// Cerrar la conexión
$conn->close();
?>