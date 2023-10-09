<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generar Campos</title>
</head>
<body>
    <form method="post" action="mostrar_resultado.php">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $materia = $_POST['materia'];
            $cantidad_notas = $_POST['cantidad_notas'];
            $rango_min = $_POST['rango_min'];
            $rango_max = $_POST['rango_max'];

            for ($i = 1; $i <= $cantidad_notas; $i++) {
                echo "<label for='nota{$i}'>Nota {$i}:</label>";
                echo "<input type='number' name='nota{$i}' step='0.1' required><br>";
            }

            echo "<input type='hidden' name='materia' value='$materia'>";
            echo "<input type='hidden' name='cantidad_notas' value='$cantidad_notas'>";
            echo "<input type='hidden' name='rango_min' value='$rango_min'>";
            echo "<input type='hidden' name='rango_max' value='$rango_max'>";
            echo "<input type='submit' value='Calcular'>";
        }
        ?>
    </form>
</body>
</html>




