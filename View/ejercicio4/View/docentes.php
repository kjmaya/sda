<?php
include __DIR__ . '/../model/Docentes.php';
include __DIR__ . '/../controller/entityController.php';
include __DIR__ . '/../controller/database/databasecController.php';
include __DIR__ . '/../controller/docentes/docentesController.php';
include __DIR__ . '/../controller/ocupacion/ocupacionController.php';
use taller4\controllers\docente\DocentesController;

$docentesController = new DocentesController();
$lista = $docentesController->allData();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Lista de docentes</h1>
    <a href="aggelementos.php">Registrar</a>
    <a href="../../../index.html">Volver</a>
    <a href="cursos.php">cursos</a>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Ocupación</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($lista as $docentes) {
                echo '<tr>';
                echo '  <td>' . $docentes->get('codigo') . '</td>';
                echo '  <td>' . $docentes->get('nombre') . '</td>';
                echo '  <td>' . $docentes->get('nombreOcupacion') . '</td>';
                echo '  <td>';
                echo '      <a href="editardocente.php?operacion=update&codigo=' . $docentes->get('codigo') . '">Modificar</a>';
                echo '  </td>';
                echo '  <td>';
                echo '      <a href="confirmarEliminacion.php?codigo=' . $docentes->get('codigo') . '">Eliminar</a>';
                echo '  </td>';
                echo '</tr>';
            }
            
            ?>
        </tbody>
    </table>

</body>

</html>