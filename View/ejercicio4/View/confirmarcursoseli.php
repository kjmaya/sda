<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/styles4.css">
    <title>Document</title>
</head>

<body>
    <div class="card">
        <form action="accionCursos.php" method="post" class="text">
            <h1>Confirmar operación</h1>
            <p>¿desea eliminar el registro ?</p>
            <input type="hidden" name="codigo" value="<?php echo $_GET['codigo'] ?>">
            <input type="hidden" name="operacion" value="delete">
            <button class="link confirm-button" type="submit">si</button>
            <a href="../View/docentes.php" class="link">No</a>
        </form>
    </div>
</body>

</html>