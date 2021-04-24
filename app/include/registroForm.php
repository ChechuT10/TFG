<?php
//funciones

if(isset($_POST['enviar'])){

    $name = $_POST['nombre'];
    $lastName = $_POST['apellidos'];
    $userName = $_POST['usuario'];
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];
    $age = $_POST['edad'];
    $weight = $_POST['peso'];
    //$pswdRepeat = $_POST['confirmacion'];

    require_once "../class/dbc.php";
    require_once "../class/user.php";
    require_once "functions.php";

    if(emptyInputSignup($name, $lastName, $userName, $email, $pswd, $age, $weight/*, $pswdRepeat*/) !== false){
        header("location: ../account/registro.php?error=emptyinput");
        exit();
    }
    if(uidExists($userName, $email) != false){
        header("location: ../account/registro.php?error=usernametaken");
        exit();
    }
    //Los errores de datos los manejamos con rejex   
    createUser($name, $lastName, $userName, $email, $pswd, $age, $weight);

}else{
    header("location: ../account/registro.php");
    exit();
}