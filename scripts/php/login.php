<?php
session_start();

session_destroy();

   include("conexion.php");
   
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();
         echo "Welcome ";
         $_SESSION['nombre'] = $_POST['user'];
         header("location: ../../index.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
?>