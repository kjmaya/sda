<?php
include __DIR__ . '/../models/docente.php';
include __DIR__ . '/../controllers/entityController.php';
include __DIR__ . '/../controllers/database/databaseController.php';
include __DIR__ . '/../controllers/docentes/docenteController.php';

use App\models\Docente;
use App\controllers\docentes\DocenteController;

$operacion = $_POST['operacion'];
$resultado = '';
$docenteController= new DocenteController();

if($operacion=='delete'){
    $resultado = $docenteController->deleteItem($_POST['codigo']);
}else{
    $docente = new Docente();
    $docente->set('codigo', $_POST['codigo']);
    $docente->set('nombre', $_POST['nombre']);
    $resultado = $operacion=='update'
        ? $docenteController->updateItem($docente)
        : $docenteController->addItem($docente);
}

// si $resultado == true -> guardo el registro;

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
    <a href="../index.php">Ir al inicio</a>
</body>
</html>