<?php
include __DIR__ . '/../controller/database/databasecController.php';
include __DIR__ . '/../controller/entityController.php';
include __DIR__ . '/../controller/ocupacion/ocupacionController.php';
include __DIR__ . '/../controller/docentes/docentesController.php';
use taller4\controllers\docente\DocentesController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $seleccion = $_POST['seleccion'];

    if ($seleccion === 'docente') {
        $codigo= $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $id_ocupacion = $_POST['id_ocupacion'];
        $docenteController = new DocentesController();
        $mensaje = $docenteController->addItem($codigo,$nombre, $id_ocupacion);
    }elseif ($seleccion === 'curso') {
        $nombre_curso = $_POST['nombre_curso'];
    }
}
?>
