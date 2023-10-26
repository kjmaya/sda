<?php
include __DIR__ . '/../controller/database/databasecController.php';
include __DIR__ . '/../controller/entityController.php';
include __DIR__ . '/../controller/docentes/docentesController.php';
include __DIR__ . '/../controller/cursos/cursosContoller.php';
include __DIR__ . '/../model/Docentes.php';
include __DIR__ . '/../model/Cursos.php';
include __DIR__ . '/../controller/ocupacion/ocupacionController.php';
//use taller4\controllers\ocupaciones\ocupacionController;

use taller4\controllers\curso\CursosController;
use taller4\controllers\docente\DocentesController;
use taller4\models\Cursos;

$docentecontroller = new DocentesController();
$operacion = $_GET['operacion'];
$cursos = new Cursos();
if ($operacion == 'update') {
    $controlador = new CursosController();
    $cursos = $controlador->getItem($_GET['codigo']);
}
if (!isset($cursos)) {
    echo '<p>El registro no existe</p>';
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="cursos.php">Volver</a>
    <?php
    echo '<form method="post" action="accionCursos.php">';
    echo '<input type="hidden" name="operacion" value="' . $operacion . ' ?>">';
    echo '<label>codigo del curso:</label>';
    echo '<input type="text" name="codigo" required value="' . $cursos->get('codigo') . '" ' . ($operacion == 'update' ? 'readonly' : '') . '>';
    echo '<label>Nombre del curso:</label>';
    echo '<input type="hidden" name="seleccion" value="curso">';
    echo '<input type="text" name="nombre" required value="' . $cursos->get('nombre') . '">';
    echo '<select name="codDocentes">';
    $docentes = $docentecontroller->allData();
    foreach ($docentes as $docente) {
        echo "<option value='" . $cod = $docente->get('codigo') . "'>" . $docente->get('nombre') . "</option>";
    }
    echo '</select>';
    echo '<input type="submit" value="Agregar curso ">';
    echo '</form>';
    ?>
</body>

</html> 