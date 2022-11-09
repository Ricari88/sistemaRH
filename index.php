<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <title>Asistencias</title>
    <link rel="stylesheet" href="styles/main/main.css">
    <link rel="stylesheet" href="styles/main/tabla.css">
    <link rel="stylesheet" href="styles/main/form.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="styles/bootstrap/css/bootstrap.min.css">
    <script src="styles/bootstrap/js/bootstrap.min.js"></script>
    <script src="scripts/js/jquery-3.6.0.min.js"></script>

</head>
<body>
<?php include('scripts/php/banners/head.php');?>
<!-- inicia formulario -->
<div class="container-fluid">
  <div class="row contenedor-principal"> 
    <div class="form col-3 izquierda">
      <div class="col-12">
      <h2 class="text-center">Buscar registros de asistencia</h2>
        <form>
          <div class="row">
            <div class="col">
              <label for="rpe">R.P.E.</label>
              <input type="text" class="form-control" id="rpe" placeholder="R.P.E." name="rpe" autocomplete="off" style="text-transform:uppercase" maxlength="5">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="rpe">Fecha inicial</label>
              <input type="date" class="form-control" placeholder="Fecha inicial" name="fechaInicial" id="fechaInicial">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="rpe">Fecha de terminación</label>
              <input type="date" class="form-control" placeholder="Fecha terminacion" name="fechaFinal" id="fechaFinal">
            </div>
          </div>
          <button class="btn btn-block btn-primary mt-4" id="buscar">Buscar</button>
        </form>
      </div>
    </div>

    <div class="col-8 derecha">
      <div class="row"></div>
      <div class="row">
        <div id="resultadoBusqueda">
          <span id="result"></span>
        </div>
      </div>
    </div>
  </div>
</div>
</main>


<script>
  $("document").ready(function () {

    $("#rpe").keyup(()=>{
        $("#rpe").css("border-color","lightgray")
        $("#fechaInicial").css("border-color","lightgray")
        $("#fechaFinal").css("border-color","lightgray")
    });

    $("#buscar").click(()=>{
      event.preventDefault()
      var xhttp;
      var rpe = $("#rpe").val();
      var fechaInicial = $("#fechaInicial").val();
      var fechaFinal = $("#fechaFinal").val();

      if (rpe.length == 0) { 
        $("#result").html(`Ingrese la información requerida`);
        $("#rpe").css("border-color","red")
        $("#fechaInicial").css("border-color","red")
        $("#fechaFinal").css("border-color","red")
        return;
      }
      else{
          //$("#result").html(`${rpe} ${fechaInicial} ${fechaFinal}`)

          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
            $("#result").html(this.responseText);
        }
      }
      
    };
    xhttp.open("GET", `scripts/php/queries/ejemplo.php?idempleado=${rpe}&fechaInicial=${fechaInicial}&fechaFinal=${fechaFinal}`, true);
    xhttp.send();
    })
  })


</script>

<?php include('scripts/php/banners/foot.html')?>
</body>
</html>