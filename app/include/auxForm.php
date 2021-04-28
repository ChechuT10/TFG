<?php
//funciones

if(isset($_POST['enviar'])){

    $age = $_POST['edad'];
    $height = $_POST['altura'];
    $weight = $_POST['peso'];
    $idealw = $_POST['pesoideal'];

    require_once "../class/dbc.php";
    require_once "../class/user.php";
    require_once "functions.php";

    if(emptyInputAuxForm($age, $height, $weight, $idealw) !== false){
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    if( validateAuxForm($age, $height, $weight, $idealw) == false){
        header("location: ../index.php?error=invalidform");
        exit();
    }
    //Los errores de datos los manejamos con rejex   
    createUserAux($age, $height, $weight, $idealw);

}else{
    header("location: ../account/registro.php");
    exit();
}