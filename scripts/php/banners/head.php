<?php
/*session_start();
$_SESSION['name'] = "rc";*/
?>

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

<header class="head-banner">
        <div class="header">
            <div class="">
                <div class="row head-banner-control">
                    <div class="col-4 logo">
                        <img src="assets/img/CFE-logo-blanco.png" alt="Logo CFE" class="main-logo">
                    </div>
                    <div class="col-4 text-center">
                        <div class="titulo">
                            <h1 class="titulo-principal">
                                Residencia General de Cerro Prieto
                                <h4 class="titulo-secundario">
                                    Departamento de Recursos Humanos
                                </h4>
                            </h1>

                        </div>
                    </div>
                    <div class="col-4"></div>
                </div>
            </div>
        </div>
    </header>
<main>
  


<!-- boton desaparece si se encuentra una sesion iniciada -->

<!-- banner aparece cuando hay una sesion activa -->
<?php
if(isset($_SESSION["name"])){
    $nombre = "Hola ".$_SESSION['name'];
    echo "<script>alert('$nombre')</script>";
    include('main-banner.php');
}
else{
    ?>
    <!-- boton iniciar sesion -->
    <div class="mt-2">
        <div class="d-flex flex-row-reverse">
            <div class="p-2">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Launch demo modal
                </button>
            </div>
        </div>
    </div>
    <?php
}
?>



<!-- modal para formulario de inicio de sesion -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Inicio de sesion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Usuario</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="R.P.E." style="text-transform:uppercase" maxlength="5">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Contrase&ntilde;a</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
                <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
                <button type="submit" class="btn btn-primary" style="width:100%;">Entrar</button>
        </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-danger">No tengo cuenta</button>
      </div>
    </div>
  </div>
</div>