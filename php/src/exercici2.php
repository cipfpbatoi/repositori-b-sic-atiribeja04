<html>
    <head>
        <title>Exercici 2 PHP</title>
        <link rel="stylesheet" type="text/css" href="exercici1.css">
        </head>

<body>
    <h1>Exercici 2 PHP</h1>
    <table>
        <thead>
            <tr>
                <th>BUCLE FOR</th>
            </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 1; $i <= 20; $i++) {
            if ($i % 2 == 0) {
                echo "<tr><td>$i</td></tr>";
            } 
        }
        ?>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>BUCLE WHILE</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        while ($i <= 20) {
            if ($i % 2 == 0) {
                echo "<tr><td>$i</td></tr>";
            }
            $i++;
        }
        ?>
        </tbody>
    </table>
</body>
</html>