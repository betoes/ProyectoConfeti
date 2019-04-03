<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name = "viewport" content="width-device-width">
    <meta name = "author" content="Jethran Enrique">
    <link rel="stylesheet" type="text/css" href="css/estiloInicio.css">
    <<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Confeti</title>

<script>
    const getRemainingTime = deadline => {
  let now = new Date(),
      remainTime = (new Date(deadline) - now + 1000) / 1000,
      remainSeconds = ('0' + Math.floor(remainTime % 60)).slice(-2),
      remainMinutes = ('0' + Math.floor(remainTime / 60 % 60)).slice(-2),
      remainHours = ('0' + Math.floor(remainTime / 3600 % 24)).slice(-2);

  return {
    remainSeconds,
    remainMinutes,
    remainHours,
    remainTime
  }
};

const countdown = (deadline,h,m,s) => {
  const horas = document.getElementById(h);
  const minutos = document.getElementById(m);
  const segundos = document.getElementById(s);

  const timerUpdate = setInterval( () => {
    let time = getRemainingTime(deadline);
    hh.innerHTML = `${time.remainHours}`;
    mm.innerHTML =  `${time.remainMinutes}`;
    ss.innerHTML = `${time.remainSeconds}`;

    if(time.remainTime <= 1) {
      clearInterval(timerUpdate);
    }

  }, 1000)
};
</script>

  </head>
  <body>
    <div id="contenedor">
        <div id="logo">
            <h1>
              <span class="titulo">Confeti</span>
            </h1>
        </div>
        
        <div id="boton">
          <a href="cerrar.php" id="bCerrar" >Cerrar sesion</a>
        </div>
        
        <div id="imagen">
          <i class="fa fa-user-circle fa-4x" aria-hidden="true"></i>
        </div>
    </div>

    <div id="contador">
      <div id="hh">
      </div>

      <div id="sep">:</div>

      <div id="hrs">Horas</div>
      
      <div id="mm">
      </div>

      <div id="sepp">:</div>

      <div id="mins"> Minutos</div>

      <div id="ss">
      </div>

      <div id="segs">Segundos</div>
    </div>

    <script>countdown("Apr 31 2019 21:34:40 GMT-0600", "hh", "mm", "ss");</script>

  </body>
</html>
