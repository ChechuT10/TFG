<?php
//funciones

if(isset($_POST['enviar'])){

    $name = $_POST['nombre'];
    $userName = $_POST['usuario'];
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];
    //$pswdRepeat = $_POST['confirmacion'];

    require_once "../class/dbc.php";
    require_once "../class/user.php";
    require_once "functions.php";

    if(emptyInputSignup($name, $userName, $email, $pswd/*, $pswdRepeat*/) !== false){
        header("location: ../registro.php?error=emptyinput");
        exit();
    }
    if(uidExists($userName, $email) != false){
        header("location: ../registro.php?error=usernametaken");
        exit();
    }
    //Los errores de datos los manejamos con rejex   
    createUser($name, $userName, $email, $pswd);

}else{
    header("location: ../registro.php");
    exit();
}