 <?php
   include('conexion.php');
   session_start();
   if($_POST){
      $usuario = $_POST['user'];
      $password =  $_POST['password'];
   
      $query= mysqli_query($conexion,"SELECT * FROM `superusers` WHERE `usuario`='$usuario' AND `password` ='$password'");  
      $resultCheck = mysqli_num_rows($query);
   
     if ($resultCheck > 0) { 
      $row = mysqli_fetch_array($query); 
      $_SESSION["usuario"] = $row['usuario'];
      $_SESSION["nombre"] = $row['nombre'];
      $_SESSION["cargo"] = $row['cargo_cargo'];
      $_SESSION["area"] = $row['area_area'];
      $_SESSION["logged"] = true;
      header("location: ../../index.php");
      //echo $_SESSION["usuario"];
      }
      else{
         header("location: ../../index.php");
     }
   }
  ?>