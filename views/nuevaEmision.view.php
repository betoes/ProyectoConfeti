<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name = "viewport" content="width-device-width">
    <meta name = "author" content="Paola">
    <link rel="stylesheet" href="css/estiloEmision.css">
    <title>Emision</title>
  </head>
  <body>
    <div id="contenedor" display="inline">
      <div id="logo">
        <h1 id="titulo">Confetti</h1>
      </div>
      <a href="cerrar.php" algin=right><button id="cerrar">Cerrar sesion</button></a>
      <div id="imagen">
        <img src="img/usuario.png" WIDTH="100" HEIGHT="100" alt="Imagen">
      </div>
      <div id="Form">
        <form id="emision">
          <input type="date" name="bday" placeholder="Fecha">
        </form >
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