<?php
include __DIR__ . '/models/docente.php';
include __DIR__ . '/controllers/entityController.php';
include __DIR__ . '/controllers/database/databaseController.php';
include __DIR__ . '/controllers/docentes/docenteController.php';

use App\controllers\docentes\DocenteController;

$docenteController = new DocenteController();
$lista = $docenteController->allData();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Docentes</title>
</head>

<body>
    <h1>Lista de Docentes</h1>
    <a href="views/formularioDocente.php?operacion=add">Registrar</a>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Curso</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($lista as $docente) {
                echo '<tr>';
                echo '  <td>' . $docente->get('codigo') . '</td>';
                echo '  <td>' . $docente->get('nombre') . '</td>';
                echo '  <td>'. $docente->get('curso') . '</td>';; 
                echo '      <a href="views/formularioDocente.php?operacion=update&codigo=' . $docente->get('codigo') . '">Modificar</a>';
                echo '  </td>';
                echo '  <td>'; 
                echo '      <a href="views/confirmarEliminacion.php?codigo=' . $docente->get('codigo') . '">Eliminar</a>';
                echo '  </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>

</html>