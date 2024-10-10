<?php
session_start();
ob_start();

// Incluir las funciones desde el archivo externo
include 'functions.php';

// Define la palabra del juego
define('PALABRA', 'ahorcado');

// Comprobar que el usuario esté logueado
if (!isset($_SESSION['email'])) {
    header("Location: ../login.html");
    exit();
}

// Comprobar si hay cookies guardadas
if (isset($_COOKIE['data_serializada'])) {
    $data = unserialize($_COOKIE['data_serializada']);
} else {
    // Inicializa los datos si no hay cookies
    $data = [
        'palabra' => PALABRA,
        'progreso' => inicializar_progreso(strlen(PALABRA)),
        'fallos' => 0,
        'intentos' => 5
    ];
}

if (isset($_POST['reiniciar'])) {
    // Restablecer los datos del juego
    $data = [
        'palabra' => PALABRA,
        'progreso' => inicializar_progreso(strlen(PALABRA)),
        'fallos' => 0,
        'intentos' => 5
    ];
    setcookie('data_serializada', serialize($data), time() + (86400 * 30), "/");
    header("Location: main.php");
    exit();
}

// Comprobar si se ha introducido una letra
$letra_introducida = isset($_POST['letra']) ? strtolower($_POST['letra']) : '';

// Comprobar la letra y actualizar el progreso
if ($letra_introducida) {
    if (verificar_letra($data['palabra'], $letra_introducida, $data['progreso'])) {
        echo "<p class='correcta'>Letra correcta: $letra_introducida</p>";
    } else {
        $data['fallos']++;
        $data['intentos']--;
        echo "<p class='incorrecta'>Letra incorrecta: $letra_introducida</p>";
        echo "<p class='incorrecta'>Fallos: {$data['fallos']}</p>";
    }
}

// Actualizar las cookies con el progreso actual
setcookie('data_serializada', serialize($data), time() + (86400 * 30), "/");

// Comprobar si el juego ha terminado
if ($data['intentos'] == 0) {
    echo "<p class='incorrecta'>Has perdido! La palabra era: {$data['palabra']}</p>";
} elseif (implode('', $data['progreso']) == $data['palabra']) {
    echo "<p class='correcta'>Felicidades, has ganado!</p>";
}

// Mostrar el progreso actual
echo "<p>Progreso actual: " . imprimir_progreso($data['progreso']) . "</p>";
echo "<p>Intentos restantes: {$data['intentos']}</p>";
?>

<!-- Introducir letra -->
<form method="POST">
    <label for="letra">Introduce una letra:</label>
    <input type="text" id="letra" name="letra" maxlength="1" required>
    <button type="submit">Enviar</button>
</form>

<!-- Botón reinicio, solo reinicia el juego -->
<form method="POST">
    <button type="submit" name="reiniciar">Reiniciar</button>
</form>

<form method="GET" action="../index.php">
    <button type="submit">Volver al inicio</button>
</form>

<!-- Cerrar sesión -->
<form method="GET" action="../logout.php">
    <button type="submit">Cerrar sesión</button>
</form>
