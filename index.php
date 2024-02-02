<?php include 'cdn.html'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    
    <title>Sistema de Comentarios</title>
    
    <!-- Agrega la librería jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
</head>
<body>
<h2 class="mt-4">Deja un comentario</h2>
<center><form id="comentarioForm" class="mb-4">
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="comentario">Comentario:</label>
        <textarea id="comentario" name="comentario" class="form-control" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar comentario</button>
</form>

<p><a href="#" id="verComentarios" class="btn btn-secondary">Ver comentarios</a></p>

<!-- Contenedor para mostrar comentarios -->
<div id="comentariosContainer"></div>

<!-- Script de JavaScript -->
<!-- Agrega la CDN de Bootstrap JS (opcional, pero necesario para algunas funcionalidades de Bootstrap) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="script.js"></script>

</body>
</html>
