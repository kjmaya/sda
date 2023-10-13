<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Resultado</title>
</head>
<body>
    <?php
    // Verificar si la solicitud es de tipo POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener datos del formulario
        $materia = $_POST['materia'];
        $cantidad_notas = $_POST['cantidad_notas'];
        
        // Inicializar la suma de notas
        $suma_notas = 0;

        // Iterar sobre las notas
        for ($i = 1; $i <= $cantidad_notas; $i++) {
            // Obtener la nota actual del formulario
            $nota = $_POST["nota{$i}"];
            
            // Sumar la nota al total
            $suma_notas += $nota;
        }

        // Calcular el promedio
        $promedio = $suma_notas / $cantidad_notas;
        
        // Mostrar el resultado
        echo "Materia: {$materia}<br>";
        echo "Promedio actual: {$promedio}<br>";
        
        // Verificar si el estudiante aprobó o no
        if ($promedio >= 6) { // Cambia este valor según tus criterios de aprobación
            echo "¡Felicidades! Has aprobado la materia.";
        } else {
            echo "Lo siento, no has aprobado la materia.";
        }
    }
    ?>
    <a href="Ejercicio3.php" class="btn">Volver</a>
</body>
</html>

