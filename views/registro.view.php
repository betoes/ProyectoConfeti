<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Contacto</title>
    <link rel="stylesheet" href="css/estilosRegistro.css">
</head>
<body>

    <div class="side-image"></div>

    <div class="formulario-container">

        <h1 class="titulo">Registro de usuario</h1>
        <form class="formulario" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <input type="text" placeholder="Nombre" class="nombre" name="nombre">
            <input type="text" placeholder="Apellido" class="apellido" name="apellido"> 
            <input type="email" placeholder="Correo" class="correo" name="correo">
            <input type="password" placeholder="Contraseña" class="password" name="password">
            <input type="password" placeholder="Repetir contraseña" class="password2" name="password2">
            <input type="text" placeholder="Telefono" class="telefono" name="telefono">
            <input type="submit" onclick="login.submit()" value="Enviar">

            <!--Errores-->
            <?php if(!empty($errores)): ?>
                <div class="error">
                    <ul>
                        <?php echo $errores; ?>
                    </ul>
                </div>
            <?php endif; ?>

        </form>
    </div>

</body>

</html>