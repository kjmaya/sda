<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Datos de la persona</h1>
    <?php
        if(!isset($estudiante)){
            echo '<p>El registro no existe</p>';
            die();
        }
    ?>
    <form action="accionEstudiante.php" method="post">
        <input type="hidden" name="operacion" value="<?php echo $operacion; ?>">
        <div>
            <label>Código:</label>
            <input type="text" name="codigo" require value="<?php echo $docente->get('codigo'); ?>" <?php  echo $operacion == 'update'?'readonly':''; ?>>
        </div>
        <div>
            <label>Nombre:</label>
            <input type="text" name="nombre" require value="<?php echo $docente->get('nombre'); ?>">
        </div>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>