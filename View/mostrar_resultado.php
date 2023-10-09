<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Resultado</title>
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $materia = $_POST['materia'];
        $cantidad_notas = $_POST['cantidad_notas'];
        $rango_min = $_POST['rango_min'];
        $rango_max = $_POST['rango_max'];
        
        $suma_notas = 0;
        
        for ($i = 1; $i <= $cantidad_notas; $i++) {
            $nota = $_POST["nota{$i}"];
            
            // Validar que la nota esté dentro del rango
            if ($nota < $rango_min || $nota > $rango_max) {
                die("Error: La nota {$i} está fuera del rango de calificación.");
            }
            
            $suma_notas += $nota;
        }
        
        $promedio = $suma_notas / $cantidad_notas;
        $nota_aprobacion = $promedio + 0.5;
        
        echo "Promedio de {$materia}: {$promedio}<br>";
        
        if ($promedio >= $nota_aprobacion) {
            echo "¡Felicidades! Has aprobado la materia.";
        } else {
            echo "Lo siento, no has aprobado la materia.";
        }
    }
    ?>
       <a href="Ejercicio3.php" class="btn">Volver</a>
</body>

</html>
