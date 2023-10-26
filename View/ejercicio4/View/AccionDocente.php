<?php
include __DIR__ . '/../controller/database/databasecController.php';
include __DIR__ . '/../model/Docentes.php';
include __DIR__ . '/../controller/entityController.php';
include __DIR__ . '/../controller/ocupacion/ocupacionController.php';
include __DIR__ . '/../controller/docentes/docentesController.php';

use taller4\controllers\docente\DocentesController;
use taller4\models\Docentes;

$docenteController = new DocentesController();

$operacion = $_POST['operacion'];
$resultado = '';
$docentescontroller = new DocentesController();
$docente = new Docentes();
if ($operacion == 'delete') {
    $resultado = $docentescontroller->deleteItem($_POST['codigo']);
} else {
    $docente->set('codigo', $_POST['codigo']);
    $docente->set('nombre', $_POST['nombre']);
    $docente->set('idOcupacion', $_POST['id_ocupacion']);
    $docentescontroller->updateItem($docente);
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
        <p class="text">Se elimino el docente exitosamente </p>
    </div>
</body>

</html>