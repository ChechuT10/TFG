<?php

if(isset($_POST['enviar'])){

    $userName = $_POST['usuario'];
    $pswd = $_POST['pswd'];

    require_once "../class/dbc.php";
    require_once "../class/user.php";
    require_once "functions.php";

    if(emptyInputLogin($userName, $pswd) !== false){
        header("location: ../inicioSesion.php?error=emptyinput");//?error=emptyinput
        exit();
    }

    loginUser($userName, $pswd);


}else{
    header("location: ../inicioSesion.php");
    exit();
}