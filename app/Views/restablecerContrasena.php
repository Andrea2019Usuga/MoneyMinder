<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña - Money Minder</title>
    <link rel="stylesheet" href="/MoneyMinder/public/css/restablecerContrasena.css">
</head>
<body>
    <main>
        <section class="form-container">
        <img src="/MoneyMinder/public/img/logo.jpeg" alt="Money Minder Logo" class="logo-login">
            <h1>Restablecer Contraseña</h1>
        
            <div class="description-container">
                <p class="description">
                    Para recordar tu contraseña, ingresa tu <br>correo electrónico a continuación. <br> Recibirás un correo con la contraseña.
                </p>
                
                <form id="reset-form" action="/MoneyMinder/index.php/requestReset" method="post">


                 <label for="email"><br>Correo electrónico</label>
                 <input type="email" id="email" name="email" required>
                 <div class="button-container">
                    <a href="/MoneyMinder/index.php/anuncioRestablecerContrasena" class="button-link">Enviar contraseña</a>
                 </div>

             </form>


            </div>
        </section>
        
        <section class="side-background"></section>
    </main>
   
</body>
</html>