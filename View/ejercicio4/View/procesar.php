<?php
include __DIR__ . '/../controller/database/databasecController.php';
include __DIR__ . '/../controller/entityController.php';
include __DIR__ . '/../controller/ocupacion/ocupacionController.php';
include __DIR__ . '/../controller/docentes/docentesController.php';
include __DIR__ . '/../controller/cursos/cursosContoller.php';
include __DIR__ . '/../model/Docentes.php';

use taller4\controllers\curso\CursosController;
use taller4\controllers\docente\DocentesController;
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
    <?php
    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $seleccion = $_POST['seleccion'];

    if ($seleccion === 'docente') {
        $codigo= $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $id_ocupacion = $_POST['id_ocupacion'];
        $docenteController = new DocentesController();
        $mensaje = $docenteController->addItem($codigo,$nombre, $id_ocupacion);
    }elseif ($seleccion === 'curso') {
        $codigo= $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $codDocentes = $_POST['codDocentes'];
        $cursoscontroller = new CursosController();
        $mensaje = $cursoscontroller->addItem($codigo,$nombre, $codDocentes);
    }
}
    ?>
    </div>
</body>
</html>