<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Ejer1.css">
</head>

<body>
    <div class="card">
        <h1>Ejercicio 1</h1>
        <?php
        $listaOriginal = [4, 2, 7, 1, 9, 5, 8, 3, 6];
        echo " Lista original: " . implode(", ", $listaOriginal) . '<br>';
        sort($listaOriginal);
        echo " Lista ordenada de menor a mayor: \n" . implode(", ", $listaOriginal) . '<br>';

        $listaPares = [];
        for ($i = 0; $i < count($listaOriginal); $i++) {
            if ($listaOriginal[$i] % 2 == 0) {
                $listaPares[] = $listaOriginal[$i];
            }
        }
        rsort($listaPares);
        echo "Lista de números pares ordenada de mayor a menor:\n " . implode(", ", $listaPares) . '<br>';

        $listaImpares = [];
        for ($i = 0; $i < count($listaOriginal); $i++) {
            if ($listaOriginal[$i] % 2 != 0) {
                $listaImpares[] = $listaOriginal[$i];
            }
        }
        sort($listaImpares);
        echo " Lista de números impares ordenada de menor a mayor:\n " . implode(", ", $listaImpares) . '<br>';
        ?>
        <a href="../../index.html" class="btn">Volver</a>
    </div>
</body>

</html>