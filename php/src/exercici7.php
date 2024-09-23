<!DOCTYPE html>
<head>
    <title>Formulario</title>
    <style>
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <h2>Registrate</h2>
    <form id="regForm">
        <label for="name">Nombre:</label>
        <input type="text" id="name" required><br><br>

        <label for="email">Correo:</label>
        <input type="email" id="email" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" required><br><br>

        <label for="confirmPassword">Confirma la contraseña:</label>
        <input type="password" id="confirmPassword" required><br><br>

        <button type="submit">Registrarse</button>
    </form>

    <div id="message" class="error"></div>

    <script>
        document.getElementById('regForm').addEventListener('submit', function(event) {
            event.preventDefault(); 
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const messageDiv = document.getElementById('message');
            messageDiv.className = '';

            if (!name || !email || !password || !confirmPassword) {
                messageDiv.textContent = 'Todos los campos son obligatorios.';
                messageDiv.className = 'error';
                return;
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                messageDiv.textContent = 'Correo no válido.';
                messageDiv.className = 'error';
                return;
            }

            const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{8,}$/;
            if (!passwordPattern.test(password)) {
                messageDiv.textContent = 'La contraseña debe tener 8 carácteres, una letra minúscula, una mayúscula y un número.';
                messageDiv.className = 'error';
                return;
            }

            if (password !== confirmPassword) {
                messageDiv.textContent = 'Las contraseñas no coinciden.';
                messageDiv.className = 'error';
                return;
            }

            messageDiv.textContent = 'Usuario registrado!';
            messageDiv.className = 'success';
        });
    </script>
</body>
</html>
