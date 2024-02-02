<?php

include 'db.php';
$sql = "SELECT * FROM comentarios ORDER BY fecha DESC";
$result = $conn->query($sql);


$comentariosHTML = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nombre = htmlspecialchars($row['nombre']);
        $fecha = htmlspecialchars($row['fecha']);
        $comentario = htmlspecialchars($row['comentario']);

        $comentariosHTML .= "<div class='card mb-3'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$nombre <small class='text-muted'>$fecha</small></h5>
                                    <p class='card-text'>$comentario</p>
                                </div>
                            </div>";
    }
} else {
    $comentariosHTML = "<p class='text-muted'>No hay comentarios aún.</p>";
}


$conn->close();

echo $comentariosHTML;
?>