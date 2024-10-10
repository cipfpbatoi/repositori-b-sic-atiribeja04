<?php
session_start();

if (!isset($_SESSION['email'])) {
    if (isset($_COOKIE['email'])) {
        $_SESSION['email'] = $_COOKIE['email'];
    } else {
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION['email']; ?>!</h2>
    <p>Elige un juego para comenzar:</p>
    <ul>
        <li><a href="/ahogado/main.php">El Ahorcado</a></li>
        <li><a href="/4enraya/main.php">4 en Raya</a></li>
    </ul>

    <form method="POST" action="logout.php">
        <button type="submit">Cerrar sesión</button>
    </form>
</body>
</html>
