<?php
session_start();
ob_start(); // Inicia el buffer de salida

include 'functions.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['email'])) {
    header("Location: ../login.html");
    exit();
}

// Inicializar o cargar el estado del juego desde la sesión
if (!isset($_SESSION['graella']) || isset($_POST['reiniciar'])) {
    $_SESSION['graella'] = inicializarGraella();
    $_SESSION['jugadorActual'] = 1;
    $_SESSION['ganador'] = null; 
}

// Recuperar el estado
$graella = $_SESSION['graella'];
$jugadorActual = $_SESSION['jugadorActual'];
$ganador = $_SESSION['ganador'];

// Comprobar si se ha seleccionado una columna y si no hay ganador
if ($ganador === null && isset($_POST['columna'])) {
    $columnaSeleccionada = $_POST['columna'];
    
    mover($graella, $columnaSeleccionada, $jugadorActual);

    if (comprobarVictoria($graella, $jugadorActual)) {
        $_SESSION['ganador'] = $jugadorActual; 
        $ganador = $jugadorActual;
    } else {
        $_SESSION['jugadorActual'] = ($jugadorActual == 1) ? 2 : 1;
    }

    $_SESSION['graella'] = $graella;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4 en Ratlla</title>
    <link rel="stylesheet" href="4enraya.css">
</head>
<body>

<!-- Formulario para seleccionar la columna -->
<form method="POST">
    <div style="text-align: center;">
        <?php if ($ganador === null): ?>
            <?php for ($col = 0; $col < 7; $col++): ?>
                <button type="submit" name="columna" value="<?php echo $col; ?>">Columna <?php echo $col + 1; ?></button>
            <?php endfor; ?>
        <?php endif; ?>
    </div>
</form>

<!-- Pintar el tablero -->
<?php pintarGraella($graella); ?>

<?php if ($ganador !== null): ?>
    <h2 style="text-align: center;">¡Jugador <?php echo $ganador; ?> ha ganado!</h2>
<?php endif; ?>

<!-- Botón de reiniciar el juego -->
<form method="POST" style="text-align: center; margin-top: 20px;">
    <button type="submit" name="reiniciar">Reiniciar</button>
</form>

<form method="GET" action="../index.php" style="text-align: center; margin-top: 20px;">
    <button type="submit">Volver al inicio</button>
</form>

<!-- Cerrar sesión -->
<form method="GET" action="../logout.php" style="text-align: center; margin-top: 20px;">
    <button type="submit">Cerrar sesión</button>
</form>

</body>
</html>


