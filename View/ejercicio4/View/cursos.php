<?php
include __DIR__ . '/../model/Docentes.php';
include __DIR__ . '/../controller/entityController.php';
include __DIR__ . '/../controller/database/databasecController.php';
include __DIR__ . '/../controller/docentes/docentesController.php';
include __DIR__ . '/../controller/ocupacion/ocupacionController.php';
include __DIR__ . '/../controller/cursos/cursosContoller.php';
include __DIR__ . '/../model/Cursos.php';

use taller4\controllers\curso\CursosController;

$cursoscontroller = new CursosController();
$lista = $cursoscontroller->allData();
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
        <h1 class="title">Lista de cursos</h1>
        <a class="link" href="aggelementos.php">Registrar</a>
        <a class="link" href="docentes.php">Volver</a>
        <table>
            <thead>
                <tr>
                    <th class="header">Código</th>
                    <th class="header">Nombre</th>
                    <th class="header">Docentes</th>
                    <th class="header"></th>
                    <th class="header"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lista as $cursos) {
                    echo '<tr>';
                    echo '  <td class="data">' . $cursos->get('codigo') . '</td>';
                    echo '  <td class="data">' . $cursos->get('nombre') . '</td>';
                    echo '  <td class="data">' . $cursos->get('codDocente') . '</td>';
                    echo '  <td class="data">';
                    echo '      <a class="link" href="editarCursos.php?operacion=update&codigo=' . $cursos->get('codigo') . '">Modificar</a>';
                    echo '  </td>';
                    echo '  <td class="data">';
                    echo '      <a  class="link" href="confirmarcursoseli.php?codigo=' . $cursos->get('codigo') . '">Eliminar</a>';
                    echo '  </td>';
                    echo '</tr>';
                }

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>