window.onload = function move() {
  
  var elem = document.getElementById("progress"); 

  var length = 0;
  
  var id = setInterval(frame, 10);
  
  function frame() {
    if (length > 100) {
      clearInterval(id);
      alert('Se acabo el tiempo!');
      elem.style.width = "0%";
    } else {
      length = length + .1; 
      elem.style.width = length + '%'; 
    }
  }
}