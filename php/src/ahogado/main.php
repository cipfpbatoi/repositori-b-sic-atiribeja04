<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Ahorcado</title>
    <style>
        .correcta { color: green; }
        .incorrecta { color: red; }
    </style>
</head>
<body>

<?php
include 'functions.php';

$palabra = "ahorcado";
$letra_introducida = isset($_POST['letra']) ? strtolower($_POST['letra']) : '';
$progreso = inicializar_progreso(strlen($palabra));

if ($letra_introducida) {
    $letra_correcta = verificar_letra($palabra, $letra_introducida, $progreso);
    if ($letra_correcta) {
        echo "<p class='correcta'>Letra correcta: $letra_introducida</p>";
    } else {
        echo "<p class='incorrecta'>Letra incorrecta: $letra_introducida</p>";
    }
}

echo "<p>Progreso actual: " . imprimir_progreso($progreso) . "</p>";
?>

<form method="POST">
    <label for="letra">Introduce una letra:</label>
    <input type="text" id="letra" name="letra" maxlength="1" required>
    <button type="submit">Enviar</button>
</form>

</body>
</html>
