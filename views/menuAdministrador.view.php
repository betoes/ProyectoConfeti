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
    <div id="contenedor" display="inline">
        <div id="logo">
            <h1 id="titulo">Bienvenido</h1>
        </div>
        <a href="cerrar.php" id="cerrar" algin=right>Cerrar sesion</a>
        <div id="imagen">
        <img src="img/usuario.png" WIDTH="100" HEIGHT="100" alt="Imagen">
        </div>
    </div>
    <div id="opciones" align ="center"  >
        <a href="nuevaEmision.php"><button id="botonStream">Administrar Transmisiones</button></a>
        <a href=""><button id="botonAsk">Administrar preguntas</button></a>
        <a href=""><button id="botonScore">Control de puntaje</button></a>   
    </div>
  </body>
</html>