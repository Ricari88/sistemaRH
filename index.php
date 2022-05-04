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
<div class="container">
  <div class="col-6">
  <h2>Form Grid</h2>
  <p>Create two form elements that appear side by side with .row and .col:</p>
  <form action="/action_page.php">
    <div class="row">
      <div class="col">
        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
      <div class="col">
        <input type="password" class="form-control" placeholder="Enter password" name="pswd">
      </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
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