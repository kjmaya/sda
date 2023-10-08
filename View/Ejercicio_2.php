<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $figura = $_POST['figura'];
        $resultado = 0;
        
        switch ($figura) {
            case 'circulo':
                $radio = floatval($_POST['radio']);
                $resultado = ($radio ** 2) * M_PI;
                break;
            case 'cuadrado':
                $lado = $_POST['lado'];
                $resultado = $lado * $lado;
                break;
            case 'triangulo':
                $altura = $_POST['altura'];
                $base = $_POST['base'];
                $resultado = ($base * $altura) / 2;
                break;
            case 'rectangulo':
                $altura = $_POST['altura'];
                $base = $_POST['base'];
                $resultado = $base * $altura;
                break;
        }
        
        $_SESSION['resultado'] = $resultado;
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
                <input type="radio" name="figura" value="circulo" checked> Circulo
            </label>
            <label class="radio-label">
                <input type="radio" name="figura" value="cuadrado"> Cuadrado
            </label>
            <label class="radio-label">
                <input type="radio" name="figura" value="triangulo"> Triangulo
            </label>
             <label class="radio-label">
                <input type="radio" name="figura" value="rectangulo"> Rectangulo
            </label>
            <br />
            <label for="radio">Radio</label>
            <input type="number" id="radio" name="radio" />
            <br />
            <label for="lado">Lado</label>
            <input type="number" id="lado" name="lado" />
            <br />
            <label for="base">Base</label>
            <input type="number" id="base" name="base" />
            <br />
            <label for="altura">Altura</label>
            <input type="number" id="altura" name="altura" />
            <br />
            <input type="submit">
            <?php
            if (isset($_SESSION['resultado'])) {
                echo 'El resultado es ' . $_SESSION['resultado'];
                unset($_SESSION['resultado']);
            }

            ?>
        </form>
        <a href="../index.html" class="btn">Volver</a>
    </div>

</body>

</html>