<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="container-form">
        <form class="form" id="form">
            <div class="form-logo">
                <img src="images/logo.png" alt="Logo" class="form-logo-img">
                <h2 class="form-logo-text"><span>My</span>Lotes</h2>
            </div>
            <h2 class="form-title">Inicio de sesión</h2>
            <div class="form-contentInput">
                <input type="email" name="email" class="form-contentInput-input" placeholder="Correo electrónico" autocomplete="off">
                <i class="fas fa-user form-contentInput-icon"></i>
            </div>
            <div class="form-contentInput">
                <input type="password" name="password" class="form-contentInput-input" placeholder="Contraseña" autocomplete="off">
                <i class="fas fa-lock form-contentInput-icon"></i>
            </div>
            <div class="form-contentInput">
                <input type="submit" class="form-contentInput-button" value="Entrar">
            </div>
        </form>
        <div class="message success" id="message">
            <p class="message-text">
                ¡Creación exitosa!
            </p>
            <i class="fas fa-check message-icon"></i>
        </div>
    </main>
    <script src="js/login.js"></script>
</body>
</html>