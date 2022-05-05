<?php   
    include('scripts/php/banners/head.php');
    include("scripts/php/conexion.php");
    include("scripts/php/checadas.php");
    include("scripts/php/queries/busquedas.php");
?>
<main>
<div class="mt-2">
  <div class="d-flex flex-row-reverse">
    <div class="p-2"><a href="#" class="btn btn-primary">Iniciar Sesion</a></div>
  </div>
</div>
<div class="form">
  <div class="col-6">
  <h2>Registros de asistencia</h2>
  <!-- <p>Create two form elements that appear side by side with .row and .col:</p> -->
  <form action="#.php">
    <div class="row">
      <div class="col-4">
        <label for="rpe">R.P.E.</label>
        <input type="text" class="form-control" id="rpe" placeholder="R.P.E." name="rpe">
      </div>
    </div>
    <div class="row">
    <div class="col-4">
        <label for="rpe">Fecha inicial</label>
        <input type="date" class="form-control" placeholder="Fecha inicial" name="fini">
      </div>
    </div>
    <div class="row">
    <div class="col-4">
        <label for="rpe">Fecha de terminación</label>
        <input type="date" class="form-control" placeholder="Fecha terminacion" name="ffinal">
      </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Buscar</button>
  </form>
  </div>
  <div class="col-6">
      result
  </div>
</div>
</main>
<?php
    include('scripts/php/banners/foot.php');
?>