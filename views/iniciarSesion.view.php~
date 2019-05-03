<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name = "viewport" content="width-device-width">
    <meta name = "author" content="Jethran Enrique">
    <link rel="stylesheet" href="css/estiloIniciarSesion.css">
    <title>Inicar sesión</title>
  </head>
  <body>
    <div id="body">
        <div id="izquierda">
            <h1>
              <span class = "confetti"> Confetti </span>
              <span class = "Proyect"> Proyect </span>
            </h1>
        </div>

        <div id="derecha">
          <h1>
            <span class = "Inicia"> Inicia y</span>
            <span class = "Diviertete"> Diviertete </span>
          </h1>
          <form class="formulario" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <div class = "form-group">
              <input type="text" id="usuario" name="usuario" class="usuario" placeholder="Usuario">
              <input type="password" id="password" name="password" class="password" placeholder="Contraseña">
              <input type="submit" id="biniciar" onclick="login.submit()" value="Enviar">
            </div>

             <!--Errores-->
            <?php if(!empty($errores)): ?>
                <div class="error">
                    <ul>
                        <?php echo $errores; ?>
                    </ul>
                </div>
            <?php endif; ?>

          </form>

          <p class="texto-registrate" id="texto-registro">
            ¿No tienes cuenta?
            <a href="registro.php">Registrate</a>
          </p>
        </div>
  </div>
  </body>
</html>
