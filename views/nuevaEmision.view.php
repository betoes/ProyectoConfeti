<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name = "viewport" content="width-device-width">
    <meta name = "author" content="Paola">
    <link rel="stylesheet" href="css/estiloAdmin.css">
    <title>Administrador</title>
  </head>
  <body>
    <div id="body">
        <div>
            <h1 id="titulo">Confetti</h1>
        </div>
        <div class = "options">
        <form action="" method="POST">
			<input type="submit" value="Guardar">
		</form>
            <?php if(!empty($errores)): ?>
                <div class="error">
                    <ul>
                        <?php echo $errores; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
  </div>
  </body>
</html>