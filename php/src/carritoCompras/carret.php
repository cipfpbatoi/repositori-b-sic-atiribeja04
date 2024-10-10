<?php
session_start(); 

if (isset($_GET['eliminar'])) {
    $producte_a_eliminar = $_GET['eliminar']; 
    if (isset($_SESSION['carret'][$producte_a_eliminar])) {
        $_SESSION['carret'][$producte_a_eliminar]--;
        if ($_SESSION['carret'][$producte_a_eliminar] <= 0) {
            unset($_SESSION['carret'][$producte_a_eliminar]);
        }
    }
}

var_dump($_SESSION['carret']);
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
</head>
<body>
    <h1>Resumen del carrito</h1>
    
    <?php 
    if (empty($_SESSION['carret'])) {
        echo "<p>El carrito está vacío.</p>";
    } else {
        echo "<ul>";
        foreach ($_SESSION['carret'] as $producte => $quantitat) {
            echo "<li>$producte: $quantitat"; 
            echo " <a href=\"?eliminar=$producte\">Eliminar</a></li>"; 
        }
        echo "</ul>";
    }
    ?>
    
    <a href="main.php">Volver a selección de productos</a>
</body>
</html>
