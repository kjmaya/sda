<?php
session_start();

$figura = isset($_POST['figura']) ? $_POST['figura'] : '';
$resultado = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    switch ($figura) {
        case 'circulo':
            $radio = isset($_POST['radio']) ? validarNumero($_POST['radio']) : 0;
            $resultado = ($radio ** 2) * M_PI;
            break;
        case 'cuadrado':
            $lado = isset($_POST['lado']) ? validarNumero($_POST['lado']) : 0;
            $resultado = $lado * $lado;
            break;
        case 'triangulo':
            $altura = isset($_POST['altura']) ? validarNumero($_POST['altura']) : 0;
            $base = isset($_POST['base']) ? validarNumero($_POST['base']) : 0;
            $resultado = ($base * $altura) / 2;
            break;
        case 'rectangulo':
            $altura = isset($_POST['altura']) ? validarNumero($_POST['altura']) : 0;
            $base = isset($_POST['base']) ? validarNumero($_POST['base']) : 0;
            $resultado = $base * $altura;
            break;
    }

    $_SESSION['resultado'] = $resultado;
}

function validarNumero($valor)
{
    // Validar y convertir a float
    $valor = str_replace(',', '.', $valor); // Reemplazar coma por punto para decimales
    if (preg_match('/^-?\d+\.?\d*$/', $valor)) {
        return floatval($valor);
    }
    return 0; // Valor predeterminado si no es un número válido
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Ejer2.css">
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <label class="radio-label">
                <input type="radio" name="figura" value="circulo" <?php echo ($figura === 'circulo') ? 'checked' : ''; ?>> Circulo
            </label>
            <label class="radio-label">
                <input type="radio" name="figura" value="cuadrado" <?php echo ($figura === 'cuadrado') ? 'checked' : ''; ?>> Cuadrado
            </label>
            <label class="radio-label">
                <input type="radio" name="figura" value="triangulo" <?php echo ($figura === 'triangulo') ? 'checked' : ''; ?>> Triangulo
            </label>
            <label class="radio-label">
                <input type="radio" name="figura" value="rectangulo" <?php echo ($figura === 'rectangulo') ? 'checked' : ''; ?>> Rectangulo
            </label>
            <br />

            <?php if ($figura === 'circulo') : ?>
                <label for="radio">Radio</label>
                <input type="text" id="radio" name="radio" />
            <?php elseif ($figura === 'cuadrado') : ?>
                <label for="lado">Lado</label>
                <input type="text" id="lado" name="lado" />
            <?php elseif ($figura === 'triangulo' || $figura === 'rectangulo') : ?>
                <label for="base">Base</label>
                <input type="text" id="base" name="base" />
                <br />
                <label for="altura">Altura</label>
                <input type="text" id="altura" name="altura" />
            <?php endif; ?>

            <br />
            <input type="submit" class="btn_enviar">
            <?php
            if (isset($_SESSION['resultado'])) {
                echo 'El resultado es ' . $_SESSION['resultado'];
                unset($_SESSION['resultado']);
            }
            ?>
            <a href="../index.html" class="btn">Volver</a>
        </form>
    </div>
</body>

</html>
