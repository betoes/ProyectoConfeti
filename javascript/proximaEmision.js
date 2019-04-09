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