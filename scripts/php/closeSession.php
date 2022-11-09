<?php
session_start();
if(isset($_SESSION['nombre'])){
    session_destroy();
    header("location: ../../index.php");
}

?>