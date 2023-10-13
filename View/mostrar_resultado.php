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
        $promedio_original = $suma_notas / $cantidad_notas;

        // Obtener los rangos de aprobación según los datos ingresados
        $rango_min = $_POST['rango_min'];
        $rango_max = $_POST['rango_max'];

        // Calcular el resultado de la suma de los rangos divididos por 2
        $resultado_esperado = ($rango_min + $rango_max) / 2 + 0.5;

        // Mostrar los valores para verificar
        echo "Promedio original: {$promedio_original}<br>";
        echo "Resultado esperado: {$resultado_esperado}<br>";

        // Verificar si el estudiante aprueba o reprueba
        if ($promedio_original >= $resultado_esperado) {
            echo "Materia: {$materia}<br>";
            echo "Promedio actual: {$promedio_original}<br>";
            echo "¡Felicidades! Has aprobado la materia.";
        } else {
            echo "Materia: {$materia}<br>";
            echo "Promedio actual: {$promedio_original}<br>";
            echo "Lo siento, no has aprobado la materia.";
        }
    }
    ?>
    <a href="Ejercicio3.php" class="btn">Volver</a>
</body>
</html>

