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
    <title>Document</title>
</head>

<body>
    <h1>Lista de cursos</h1>
    <a href="aggelementos.php">Registrar</a>
    <a href="docentes.php">Volver</a>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Docentes</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($lista as $cursos) {
                echo '<tr>';
                echo '  <td>' . $cursos->get('codigo') . '</td>';
                echo '  <td>' . $cursos->get('nombre') . '</td>';
                echo '  <td>' . $cursos->get('codDocente') . '</td>';
                echo '  <td>';
                echo '      <a href="editarCursos.php?operacion=update&codigo=' . $cursos->get('codigo') . '">Modificar</a>';
                echo '  </td>';
                echo '  <td>';
                echo '      <a href="confirmarcursoseli.php?codigo=' . $cursos->get('codigo') . '">Eliminar</a>';
                echo '  </td>';
                echo '</tr>';
            }
            
            ?>
        </tbody>
    </table>

</body>

</html>