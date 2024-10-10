<?php
session_start(); 

if (!isset($_SESSION['carret'])) {
    $_SESSION['carret'] = array();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producte = $_POST['producte'];

    if (isset($_SESSION['carret'][$producte])) {
        $_SESSION['carret'][$producte]++;
    } else {
        $_SESSION['carret'][$producte] = 1;
    }
    header('Location: carret.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Selecció de productes</title>
</head>
<body>
    <h1>Afegir productes al carret</h1>
    <form action="" method="POST">
        <label for="producte">Tria un producte:</label>
        <select name="producte" id="producte">
            <option value="Poma">Poma</option>
            <option value="Plàtan">Plàtan</option>
            <option value="Taronja">Taronja</option>
        </select>
        <input type="submit" value="Afegir al carret">
    </form>
    <a href="carret.php">Veure carret</a>
</body>
</html>
