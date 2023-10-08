<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Promedio de Notas</title>
    <link rel="stylesheet" type="text.css" href="style.css">
</head>
<body>
    <h1>Calculadora de Promedio de Notas</h1>
    <form method="post" action="promedio.php">
        <label for="nombre_materia">Nombre de la Materia:</label>
        <input type="text" name="nombre_materia" required><br><br>

        <label for="cantidad_notas">Cantidad de Notas:</label>
        <input type="number" name="cantidad_notas" required><br><br>

        <label for="rango_minimo">Rango Mínimo de Calificación:</label>
        <input type="number" name="rango_minimo" required><br><br>

        <label for="rango_maximo">Rango Máximo de Calificación:</label>
        <input type="number" name="rango_maximo" required><br><br>

        <h2>Ingrese las notas:</h2>
        <?php
        if (isset($_POST['cantidad_notas'])) {
            $cantidad_notas = $_POST['cantidad_notas'];
            for ($i = 1; $i <= $cantidad_notas; $i++) {
                echo "<label for='nota$i'>Nota $i:</label>";
                echo "<input type='number' name='nota$i' required><br><br>";
            }
        }
        ?>

        <input type="submit" name="calcular" value="Calcular Promedio">
    </form>
</body>
</html>
