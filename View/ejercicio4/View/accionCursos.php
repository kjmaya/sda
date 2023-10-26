<?php
include __DIR__ . '/../controller/database/databasecController.php';
include __DIR__ . '/../controller/entityController.php';
include __DIR__ . '/../controller/docentes/docentesController.php';
include __DIR__ . '/../controller/cursos/cursosContoller.php';
include __DIR__ . '/../model/Docentes.php';
include __DIR__ . '/../model/Cursos.php';
include __DIR__ . '/../controller/ocupacion/ocupacionController.php';

use taller4\controllers\curso\CursosController;
use taller4\models\Cursos;

$cursoscontroller = new CursosController();
$operacion = $_POST['operacion'];
$resultado = '';
$cursoscontroller = new CursosController();
$curso = new Cursos();
if ($operacion == 'delete') {
    $resultado = $cursoscontroller->deleteItem($_POST['codigo']);
} else {
    $curso->set('codigo', $_POST['codigo']);
    $curso->set('nombre', $_POST['nombre']);
    $curso->set('codDocente', $_POST['codDocentes']);
    $cursoscontroller->updateItem($curso);
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
    <?php
    echo $resultado;
    ?>
    <div class="card">
        <a href="../View/docentes.php" class="link">Ir al inicio</a>
        <p class="text">Se elimino el curso exitosamente </p>
    </div>
</body>

</html>