<?php
include __DIR__ . '/../models/docente.php';
include __DIR__ . '/../controllers/entityController.php';
include __DIR__ . '/../controllers/database/databaseController.php';
include __DIR__ . '/../controllers/docentes/docenteController.php';

use App\models\Docente;
use App\controllers\docentes\DocenteController;

$operacion = isset($_GET['operacion']) ? $_GET['operacion'] : '';
$docente = new Docente();

if ($operacion == 'update') {
    $controlador = new DocenteController();
    $docente = $controlador->getItem(isset($_GET['codigo']) ? $_GET['codigo'] : '');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Datos del docente</h1>
    <?php
    if (!isset($docente)) {
        echo '<p>El registro no existe</p>';
        //die();
    }
    ?>
    <form action="accionEstudiante.php" method="post">
        <input type="hidden" name="operacion" value="<?php echo $operacion; ?>">
        <div>
            <label>Código:</label>
            <input type="text" name="codigo" required value="<?php echo $docente->get('codigo'); ?>" <?php echo ($operacion == 'update') ? 'readonly' : ''; ?>>
        </div>
        <div>
            <label>Nombre:</label>
            <input type="text" name="nombre" required value="<?php echo $docente->get('nombre'); ?>">
        </div>
        <div>
            <label>curso:</label>
            <input type="text" name="nombre" required value="<?php echo $docente->get('nombre'); ?>">
        </div>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
