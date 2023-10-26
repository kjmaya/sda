<?php
include __DIR__ . '/../controller/database/databasecController.php';
include __DIR__ . '/../controller/entityController.php';
include __DIR__ . '/../controller/ocupacion/ocupacionController.php';
include __DIR__ . '/../controller/docentes/docentesController.php';
include __DIR__ . '/../model/Docentes.php';
//use taller4\controllers\ocupaciones\ocupacionController;

use taller4\controllers\docente\DocentesController;
use taller4\controllers\ocupaciones\ocupacionController;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles4.css">
    <title>Document</title>
</head>

<body>
    <div class="card">
        <a href="docentes.php" class="link">Volver</a>
        <form method="post" action="">
            <label class="text" for="seleccion">Selecciona lo que quieres agregar:</label>
            <select name="seleccion" id="seleccion" class="select-box">
                <option value="docente">Docente</option>
                <option value="curso">Curso</option>
            </select>
            <input type="submit" value="Agregar" class="add-button">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $seleccion = $_POST['seleccion'];

            if ($seleccion === 'docente') {
                echo '<form method="post" action="procesar.php" class = " text">';
                echo '<label>codigo del docente:</label>';
                echo '<input type="text" name="codigo" required class = "transparent">';
                echo '<label>Nombre del docente:</label>';
                echo '<input type="hidden" name="seleccion" value="docente">';
                echo '<input type="text" name="nombre" required>';
                echo '<label for="ocupacion">Ocupación:</label>';
                echo '<select name="id_ocupacion" class="select-box">';
                $ocupacionController = new ocupacionController();
                $ocupaciones = $ocupacionController->allData();
                foreach ($ocupaciones as $ocupacion) {
                    echo "<option value='" . $idocu = $ocupacion->get('id') . "'>" . $ocupacion->get('nombre') . "</option>";
                }
                echo '</select>';
                echo '<input type="submit" value="Agregar Docente" class="add-button">';
                echo '</form>';
            } elseif ($seleccion === 'curso') {
                echo '<form method="post" action="procesar.php" class = "text">';
                echo '<label>codigo del curso:</label>';
                echo '<input type="text" name="codigo" required>';
                echo '<label>Nombre del curso:</label>';
                echo '<input type="hidden" name="seleccion" value="curso">';
                echo '<input type="text" name="nombre" required>';
                echo '<select name="codDocentes" class="select-box">';
                $docentecontroller = new DocentesController();
                $docentes = $docentecontroller->allData();
                foreach ($docentes as $docente) {
                    echo "<option value='" . $cod = $docente->get('codigo') . "'>" . $docente->get('nombre') . "</option>";
                }
                echo '</select>';
                echo '<input type="submit" value="Agregar curso " class="add-button">';
                echo '</form>';
            }
        }
        ?>
    </div>

</body>

</html>