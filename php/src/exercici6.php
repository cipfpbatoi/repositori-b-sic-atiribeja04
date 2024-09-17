<html>
    <head>
        <title>Exercici 6 PHP</title>
        <link rel="stylesheet" type="text/css" href="exercici1.css">
        </head>
        <body>
    <h1>Exercici 6 PHP</h1>
    <table>
        <thead>
            <tr>
                <th>NOTA</th>
                <th>RESULTADO</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $notas = array(
                10,8,6,5,4
            );

            foreach ($notas as $nota) {
                $resultado = match (true) {
                    $nota == 10 => 'Excelente',
                    $nota >= 8 => 'Muy bien',
                    $nota >= 5 => 'Bien',
                    default => 'Insuficiente',
                };
            
                echo "<tr><td>$nota</td><td>$resultado</td></tr>";
            }

            ?>
        </tbody>
    </table>
</body>
</html>