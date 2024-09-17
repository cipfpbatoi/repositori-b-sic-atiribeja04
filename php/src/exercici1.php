<html>
    <head>
        <title>Exercici 1 PHP</title>
        <link rel="stylesheet" type="text/css" href="exercici1.css">
        </head>
        <body>
    <h1>Exercici 1 PHP</h1>
    <table>
        <thead>
            <tr>
                <th>OPERACIÓN</th>
                <th>RESULTADO</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $a = 5;
            $b = 3;

            $suma = $a + $b;
            $mult = $a * $b;
            $div = $a / $b;
            $rest = $a % $b;
            $igual = $a == $b;

            echo "<tr><td>Suma de $a + $b</td><td>$suma</td></tr>";
            echo "<tr><td>Multiplicación de $a * $b</td><td>$mult</td></tr>";
            echo "<tr><td>División de $a / $b</td><td>$div</td></tr>";
            echo "<tr><td>Resto de la división de $a % $b</td><td>$rest</td></tr>";
            echo "<tr><td>$a es igual a $b</td><td>".($a == $b)."</td></tr>";
            ?>
        </tbody>
    </table>
</body>
</html>