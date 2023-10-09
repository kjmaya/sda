<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Ejer3.css"> <!-- Incluye tu archivo CSS -->
    <title>Calculadora de Promedio</title>
</head>
<body>
    <div class="container"> <!-- Contenedor principal -->
        <form class="formulario" method="post" action="calcular_promedio.php">
            <label for="materia">Nombre de la materia:</label>
            <input type="text" name="materia" required><br>
            
            <label for="cantidad_notas">Cantidad de notas:</label>
            <input type="number" name="cantidad_notas" required><br>
            
            <label for="rango_min">Rango mínimo de calificación:</label>
            <input type="number" name="rango_min" required><br>
            
            <label for="rango_max">Rango máximo de calificación:</label>
            <input type="number" name="rango_max" required><br>
            
            <input type="submit" value="Siguiente" class="btn_enviar">
        </form>
        <a href="../index.html" class="btn">Volver</a>
    </div>
</body>
</html>
