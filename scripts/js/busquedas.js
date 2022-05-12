function buscar() {
  event.preventDefault();
  var xhttp;
  var rpe = document.getElementById("rpe").value;
  var fechaInicial = document.getElementById("fechaInicial").value;
  var fechaFinal = document.getElementById("fechaFinal").value;

  if (rpe.length == 0) { 
    document.getElementById("resultadoBusqueda").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      event.preventDefault();
      document.getElementById("resultadoBusqueda").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", `php/queries/ejemplo.php?idempleado=${rpe}&fechaInicial=${fechaInicial}&fechaFinal=${fechaFinal}`, true);
  xhttp.send();   
}