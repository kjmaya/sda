<?php
include __DIR__ . '/../controller/database/databasecController.php'; 
include __DIR__ . '/../controller/entityController.php';
include __DIR__ . '/../controller/cursos/cursosContoller.php';
include __DIR__ . '/../controller/docentes/docentesController.php';

use taller4\controllers\curso\CursosController;


$operacion=$_POST['operacion'];
$resultado = '';
$cursoscontroller = new CursosController();
if($operacion =='delete'){
    $resultado = $cursoscontroller->deleteItem($_POST['codigo']);
}elseif( $resultado = $operacion=='update'){
    $cursoscontroller->updateItem($curso);
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
    <?php
    echo $resultado;
    ?>
    <a href="cursos.php">Ir al inicio</a>
</body>
</html>