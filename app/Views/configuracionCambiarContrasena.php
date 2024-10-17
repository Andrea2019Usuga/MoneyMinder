<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Configuración cambiar contraseña</title>
<link rel="stylesheet" href="/MoneyMinder/public/css/configuracionCambiarContrasena.css">
<script src="/MoneyMinder/public/js/configuracionCambiarContrasena.js"></script>
</head>


<body>
    <header>
    <img src="/MoneyMinder/public/img/logo.jpeg" alt="Money Minder Logo" class="logo">
    </header>
    <main>
        <aside class="sidebar">
            <button class="menu-item selected no-pointer">Menú principal</button>
            <a href="/MoneyMinder/index.php/menuPrincipalIngresos" class="menu-item">Ingresos</a>
            <a href="/MoneyMinder/index.php/gastos" class="menu-item">Gastos</a>
            <a href="/MoneyMinder/index.php/metasDeAhorro" class="menu-item">Metas de ahorro</a>
            <a href="/MoneyMinder/index.php/tipsAhorro" class="menu-item">Tips de ahorro</a>
            <div class="dropdown">
                <button class="menu-item selected dropdown-toggle" onclick="toggleDropdown()">Configuración</button>
                <div class="dropdown-content">
                    <a href="/MoneyMinder/index.php/configuracionCambiarContrasena" class="menu-item selected">Cambiar contraseña</a>
                    <a href="/MoneyMinder/index.php/eliminarCuenta" class="menu-item">Eliminar Cuenta</a>
                    <a href="/MoneyMinder/index.php/preguntasFrecuentes" class="menu-item">Preguntas frecuentes</a>
                </div>
            </div>
        </aside>
        <section class="content">
            <h2>Cambiar Contraseña</h2>
            <p>Por seguridad, es importante cambiar tu contraseña regularmente. <br>Ingresa tu contraseña actual y luego introduce una nueva que tenga <br>un mínimo de 8 caracteres y que sea diferente de la anterior.</p>
            
            <form id="change-password-form" action="/MoneyMinder/index.php/cambiarContrasena" method="post">
                <div class="form-group">
                    <label for="current-password">Contraseña actual</label>
                    <input type="password" id="current-password" name="current-password" required>
                </div>
                <div class="form-group">
                    <label for="new-password">Contraseña nueva</label>
                    <input type="password" id="new-password" name="new-password" required>
                    <small>La contraseña debe contener mínimo 8 caracteres</small>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirmar Contraseña nueva</label>
                    <input type="password" id="confirm-password" name="confirm-password" required>
                </div>
                <div id="button-container">
                    <button type="submit" class="update-button">Actualizar</button>
                </div>
            </form>

            <div id="feedback" class="feedback-message"></div> <!-- Para mostrar mensajes de éxito o error -->
        </section>
    </main>

    <script>
        // JavaScript para manejar la validación de la contraseña
        document.getElementById('change-password-form').addEventListener('submit', function(event) {
            const newPassword = document.getElementById('new-password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            const feedback = document.getElementById('feedback');

            if (newPassword !== confirmPassword) {
                event.preventDefault(); // Detener el envío del formulario
                feedback.innerHTML = "Las contraseñas nuevas no coinciden.";
                feedback.style.color = "red";
            } else {
                feedback.innerHTML = ""; // Limpiar el mensaje de retroalimentación
            }
        });
    </script>
</body>
</html>