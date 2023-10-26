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
    <link rel="stylesheet" href="styles/styles4.css">
    <title>Document</title>
</head>

<body>
    <div class="card">
        <h1 class="title">Lista de docentes</h1>
        <a class="link" href="aggelementos.php">Registrar</a>
        <a class="link" href="../../../index.html">Volver</a>
        <a class="link" href="cursos.php">cursos</a>
        <table>
            <thead>
                <tr>
                    <th class="header">Código</th>
                    <th class="header">Nombre</th>
                    <th class="header">Ocupación</th>
                    <th class="header"></th>
                    <th class="header"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lista as $docentes) {
                    echo '<tr>';
                    echo '  <td class="data">' . $docentes->get('codigo') . '</td>';
                    echo '  <td class="data">' . $docentes->get('nombre') . '</td>';
                    echo '  <td class="data">' . $docentes->get('nombreOcupacion') . '</td>';
                    echo '  <td class="data">';
                    echo '      <a class="link" href="editardocente.php?operacion=update&codigo=' . $docentes->get('codigo') . '">Modificar</a>';
                    echo '  </td>';
                    echo '  <td class="data">';
                    echo '      <a class="link" href="confirmarEliminacion.php?codigo=' . $docentes->get('codigo') . '">Eliminar</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>