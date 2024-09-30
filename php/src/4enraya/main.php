<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4 en Ratlla</title>
    <style>
        table { border-collapse: collapse; }
        td {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 10px dotted #fff;
            background-color: #000;
            display: inline-block;
            margin: 10px;
            color: white;
            font-size: 2rem;
            text-align: center;
            vertical-align: middle;
        }
        .player1 { background-color: red; }
        .player2 { background-color: yellow; }
        .buid { background-color: white; border-color: #000; }
    </style>
</head>
<body>

<?php
include 'functions.php';

$jugadorActual = isset($_POST['jugadorActual']) ? $_POST['jugadorActual'] : 1;
$columnaSeleccionada = isset($_POST['columna']) ? $_POST['columna'] : -1;
$graella = inicializarGraella();

if ($columnaSeleccionada >= 0) {
    mover($graella, $columnaSeleccionada, $jugadorActual);
    $jugadorActual = ($jugadorActual == 1) ? 2 : 1;
}

pintarGraella($graella);
?>

<form method="POST">
    <label for="columna">Selecciona columna (0 a 6):</label>
    <input type="number" id="columna" name="columna" min="0" max="6" required>
    <input type="hidden" name="jugadorActual" value="<?php echo $jugadorActual; ?>">
    <button type="submit">Jugar</button>
</form>

</body>
</html>
