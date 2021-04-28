<?php
session_start();
require_once "../class/dbc.php";
require_once "../class/user.php";
//REGISTER
function emptyInputSignup($name,$lastName, $userName, $email, $pswd){
    $result;
    if(empty($name) || empty($lastName) || empty($userName) || empty($email) || empty($pswd)){
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

function createUser($name, $lastName, $userName, $email, $pswd){
    $user = new User();
    if($user->createUsers($name, $lastName, $userName, $email, $pswd)){
        loginUser($userName, $pswd);
        // header("location: ../index.php?msj=exito");
        // exit();
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
    if($uidExist===false || $uidExist===null){
        header("location: ../account/inicioSesion.php?error=wronglogin");
        exit();
    }
    //Aqui obtenemos la contraseña descodificada de la base de datos
    //Hay que recordar que en el metodo de arriba usamos un assosiactive array
    else{
        $pswdHashed = $uidExist["userPswd"];
        $checkPwd = password_verify($pswd, $pswdHashed);

        if($checkPwd===false){
            header("location: ../account/inicioSesion.php?error=wronglogin");
            exit();
        }
        /*Obtenemos el numero generado automaticamente por la base de datos
        esto nos ayudara mas tarde a mostrar paginas personalizadas por usuario*/
        $_SESSION['userId'] = $uidExist["idUser"];
        $_SESSION['userUid'] = $uidExist["nombreUser"];
        header("location: ../index.php");
        exit();
    }
}

// FORMULARIO PESO, EDAD Y ALTURA

function emptyInputAuxForm($age, $height, $weight, $idealw){
    $result;
    if(empty($age)  || empty($height)  || empty($weight) || empty($idealw))  {
        $result = true;
    }else{
       $result = false;
    } 
    return $result;
}

function validateAuxForm($age, $height, $weight, $idealw){
    $result = true;
    if($age < 15 || $age > 80){
        $result = false;
    }
    if($height < 100 || $height > 250){
        $result = false;
    }
    if($height < 30 || $height > 300){
        $result = false;
    }
    if($idealw < 30 || $idealw > 300){
        if($idealw == $weight){
            $result = false;
        }
    }
    return $result;
}

function createUserAux($age, $height, $weight, $idealw){
    $auxId =  $_SESSION['userId'];
    $user = new User();
    if($user->createUsersAux($age, $height, $weight, $idealw, $auxId)){
        if($user->finishAuxForm($auxId)){
            header("location: ../index.php?msj=exito");
            exit();
        }else{
            header("location: ../index.php?error=stmtfailed");//?error=stmtfailed
        exit();
        }
    }else{
        header("location: ../index.php?error=stmtfailed");//?error=stmtfailed
        exit();
    }
}