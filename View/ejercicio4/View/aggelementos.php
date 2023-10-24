<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="docentes.php">Volver</a>
    <form method="post" action="">
        <label for="seleccion">Selecciona lo que quieres agregar:</label>
        <select name="seleccion" id="seleccion">
            <option value="docente">Docente</option>
            <option value="curso">Curso</option>
        </select>
        <input type="submit" value="Agregar">
    </form>
</body>

</html>

<?php
include __DIR__ . '/../controller/database/databasecController.php';
include __DIR__ . '/../controller/entityController.php';
include __DIR__ . '/../controller/ocupacion/ocupacionController.php';

//use taller4\controllers\ocupaciones\ocupacionController;
use taller4\controllers\ocupaciones\ocupacionController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $seleccion = $_POST['seleccion'];

    if ($seleccion === 'docente') {
        echo '<form method="post" action="procesarDo.php">';
        echo '<label>codigo del docente:</label>';
        echo '<input type="text" name="codigo" required>';
        echo '<label>Nombre del docente:</label>';
        echo '<input type="hidden" name="seleccion" value="docente">';
        echo '<input type="text" name="nombre" required>';
        echo '<label for="ocupacion">Ocupación:</label>';
        echo '<select name="id_ocupacion">';
        $ocupacionController = new ocupacionController(); 
        $ocupaciones = $ocupacionController->allData();
        foreach ($ocupaciones as $ocupacion) {
            echo "<option value='" . $idocu=$ocupacion->get('id') . "'>" . $ocupacion->get('nombre') . "</option>";
        }
        echo '</select>';
        echo '<input type="submit" value="Agregar Docente">';
        echo '</form>';
    }elseif ($seleccion === 'curso') {
        echo '<form method="post" action="procesarDo.php">';
        echo '<label>Nombre del curso:</label>';
        echo '<input type="hidden" name="seleccion" value="curso">';
        echo '<input type="text" name="nombre_curso">';
        echo '<input type="submit" value="Agregar Curso">';
        echo '</form>';
    }
}
?>
