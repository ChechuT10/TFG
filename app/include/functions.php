<?php
require_once "../class/dbc.php";
require_once "../class/user.php";
//REGISTER
function emptyInputSignup($name, $userName, $email, $pswd/*, $pswdRepeat*/){
    $result;
    if(empty($name)  || empty($userName) || empty($email) || empty($pswd)/* || empty($pswdRepeat)*/)  {
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

function createUser($name, $userName, $email, $pswd){
    $user = new User();
    if($user->createUsers($name, $userName, $email, $pswd)){
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
    $pswdHashed = $uidExist["userPswd"];
    $checkPwd = password_verify($pswd, $pswdHashed);

    if($checkPwd===false){
        header("location: ../account/inicioSesion.php?error=wronglogin");
        exit();
    }else if($checkPwd===true){

        session_start();
        /*Obtenemos el numero generado automaticamente por la base de datos
        esto nos ayudara mas tarde a mostrar paginas personalizadas por usuario*/
        $_SESSION['userId'] = $uidExist["userId"];
        $_SESSION['userUid'] = $uidExist["userUid"];
        header("location: ../index.php");
        exit();
    }

}