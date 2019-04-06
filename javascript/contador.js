window.onload = function move() {
  
  var elem = document.getElementById("progress"); 

  var length = 0;
  
  var id = setInterval(frame, 1000);
  
  function frame() {
    if (length == 100) {
      clearInterval(id);
      alert('Se acabo el tiempo!');
      elem.style.width = "0%";
    } else {
      length = length + 10; 
      elem.style.width = length + '%'; 
    }
  }
}