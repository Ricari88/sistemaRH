<?php   
    include('scripts/php/banners/head.php');
    include("scripts/php/conexion.php");
    include("scripts/php/checadas.php");
    include("scripts/php/queries/busquedas.php");
?>
<main>
  <!-- boton iniciar sesion -->
<div class="mt-2">
  <div class="d-flex flex-row-reverse">
    <div class="p-2"><a href="#" class="btn btn-primary">Iniciar Sesion</a></div>
  </div>
</div>

<!-- inicia formulario -->
<div class="container-fluid">
  <div class="div row"> 
    <div class="form col-3">
      <div class="col-12">
        <h2>Buscar registros de asistencia</h2>
        <form action="#.php">
          <div class="row">
            <div class="col">
              <label for="rpe">R.P.E.</label>
              <input type="text" class="form-control" id="rpe" placeholder="R.P.E." name="rpe">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="rpe">Fecha inicial</label>
              <input type="date" class="form-control" placeholder="Fecha inicial" name="fini">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="rpe">Fecha de terminación</label>
              <input type="date" class="form-control" placeholder="Fecha terminacion" name="ffinal">
            </div>
          </div>
          <button type="submit" class="btn btn-primary mt-3" onclick="buscar()">Buscar</button>
        </form>
      </div>
    </div>

    <div class="col-8">
      <span id="resultadoBusqueda"></span>
    </div>
  </div>
</div>
</main>


<script src="scripts/js/busquedas.js"></script>
<?php
    include('scripts/php/banners/foot.php');
?>