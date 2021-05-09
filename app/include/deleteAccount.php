<?php
if(isset($_POST['borrar'])){
    require_once "functions.php";
    deleteUser($_SESSION['userId']);
}else{
    header("location: ../account/eliminarCuenta.php");
    exit();
}