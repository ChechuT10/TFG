<?php
require_once "../class/dbc.php";
require_once "../class/user.php";
//REGISTER
function emptyInputSignup($name,$lastName, $userName, $email, $pswd, $age, $weight/*, $pswdRepeat*/){
    $result;
    if(empty($name)  || empty($lastName)  || empty($userName) || empty($email) || empty($pswd) || empty($age) || empty($weight)/* || empty($pswdRepeat)*/)  {
        $result = true;
    }else{
       $result = false;
    } 
    return $result;
}

function uidExists($userName , $email){
     $user = new User();
     return $user->getUser($userName , $email);
}

function createUser($name, $lastName, $userName, $email, $pswd, $age, $weight){
    $user = new User();
    if($user->createUsers($name, $lastName, $userName, $email, $pswd, $age, $weight)){
        header("location: ../index.php?msj=exito");
        exit();
    }else{
        header("location: ../account/registro.php?error=stmtfailed");//?error=stmtfailed
        exit();
    }
}


//LOGIN

function emptyInputLogin($userName, $pswd){
    $result;
    if(empty($userName) || empty($pswd))  {
        $result = true;
    }else{
       $result = false;
    } 
    return $result;
}

function loginUser($userName, $pswd){
    $uidExist =  uidExists($userName , $userName);

    if($uidExist===false){
        header("location: ../account/inicioSesion.php?error=wronglogin");
        exit();
    }
    //Aqui obtenemos la contraseña descodificada de la base de datos
    //Hay que recordar que en el metodo de arriba usamos un assosiactive array
    $pswdHashed = $uidExist["pswdUser"];
    $checkPwd = password_verify($pswd, $pswdHashed);

    if($checkPwd===false){
        header("location: ../account/inicioSesion.php?error=wronglogin");
        exit();
    }
    session_start();
    /*Obtenemos el numero generado automaticamente por la base de datos
    esto nos ayudara mas tarde a mostrar paginas personalizadas por usuario*/
    $_SESSION['userId'] = $uidExist["iduser"];
    $_SESSION['userUid'] = $uidExist["nombreUser"];
    header("location: ../index.php");
    exit();

}