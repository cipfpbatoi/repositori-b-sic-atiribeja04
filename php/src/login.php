<?php
session_start();

$usuarios = [
    'usuario1@u1.com' => 'user1',
    'usuario2@u2.com' => 'user2'
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isset($usuarios[$email]) && $usuarios[$email] == $password) {
        $_SESSION['email'] = $email;

        if (isset($_POST['remember'])) {
            setcookie('email', $email, time() + (86400 * 30), "/"); // 30 días
        }

        header("Location: index.php");
        exit(); 
    } else {
        echo "Correo o contraseña incorrectos.";
    }
}
?>