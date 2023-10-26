<?php
include __DIR__ . '/../controller/database/databasecController.php';
include __DIR__ . '/../controller/entityController.php';
include __DIR__ . '/../controller/ocupacion/ocupacionController.php';
include __DIR__ . '/../controller/docentes/docentesController.php';
include __DIR__ . '/../model/Docentes.php';
//use taller4\controllers\ocupaciones\ocupacionController;

use taller4\controllers\docente\DocentesController;
use taller4\controllers\ocupaciones\ocupacionController;
use taller4\models\Docentes;

$operacion = $_GET['operacion'];
$docente = new Docentes();
if ($operacion == 'update') {
    $controlador = new DocentesController();
    $docente = $controlador->getItem($_GET['codigo']);
}
if (!isset($docente)) {
    echo '<p>El registro no existe</p>';
    die();
}
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
        <a class="link" href="docentes.php">Volver</a>
        <?php
        echo '<form method="post" action="accionDocente.php" class = " text">';
        echo '<input type="hidden" name="operacion" value="' . $operacion . ' ?>">';
        echo '<label>C  odigo del docente:</label>';
        echo '<input type="text" name="codigo" required value="' . $docente->get('codigo') . '" ' . ($operacion == 'update' ? 'readonly' : '') . '>';
        echo '<label>Nombre del docente:</label>';
        echo '<input type="hidden" name="seleccion" value="docente">';
        echo '<input type="text" name="nombre" required value="' . $docente->get('nombre') . '">';
        echo '<label for="ocupacion">Ocupación:</label>';
        echo '<select name="id_ocupacion">';
        $ocupacionController = new ocupacionController();
        $ocupaciones = $ocupacionController->allData();
        foreach ($ocupaciones as $ocupacion) {
            echo "<option value='" . $idocu = $ocupacion->get('id') . "'>" . $ocupacion->get('nombre') . "</option>";
        }
        echo '</select>';
        echo '<input type="submit" value="Agregar Docente" class="link">';
        echo '</form>';
        ?>
    </div>
</body>

</html>