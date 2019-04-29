<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verificación Telefono</title>
    <link rel="stylesheet" href="css/estilosRegistro.css">
</head>
<body>

    <div class="side-image">
    
    </div>

    <div class="formulario-container">

        <h1 class="titulo">Verificación 2 pasos</h1>
        <h3 class="paso">Por favor ingresa el codigo enviado por SMS al numero agregado </h3>
        <form class="formulario" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <input type="text" placeholder="pin" class="pin" name="pin" maxlength="3">
            
            <input type="submit" onclick="login.submit()" value="Enviar codigo">

            <!--Errores-->
            <?php if(!empty($errores)): ?>
                <div class="error">
                    <ul>
                        <?php echo $errores; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if(!empty($exito)): ?>
                <div class="exito">
                    <ul>
                        <?php echo $exito; ?>
                    </ul>
                </div>
            <?php endif; ?>

        </form>
        <p class="texto-cerrar" id="texto-cerrar">
            ¿No quieres hacerlo ahora?
            <a href="cerrar.php">Cerrar sesión</a>
        </p>
    </div>

</body>

</html>