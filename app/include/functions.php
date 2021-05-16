<?php
session_start();
require_once "../class/dbc.php";
require_once "../class/user.php";
require_once "../class/food.php";
require_once "../class/exercise.php";

//REGISTER
function emptyInputSignup($name,$lastName, $userName, $email, $pswd){
    $result=null;
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
    $result=null;
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
        // Probablemente se pueda comprobar si el usuario es admin if($uidExist['admin'] == 'S')
        if($uidExist['admin'] == 'S'){
            if($uidExist["userPswd"] == $pswd){
                $_SESSION['userId'] = $uidExist["idUser"];
                header("location: ../admin.php");
                exit();
            }else{
                header("location: ../account/inicioSesion.php?error=wronglogin");
                exit();
            }
        }
        
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


// ELIMINAR USUARIO

function deleteUser($id){
    $user = new User();
    if($user->deleteAccount($id)){
        header("location: ../index.php");
        exit();
    }else{
        header("location: ../account/eliminarCuenta.php?error=stmtfailed");//?error=stmtfailed
        exit();
    }
}

// FORMULARIO PESO, EDAD Y ALTURA

function emptyInputAuxForm($age, $height, $weight, $idealw){
    $result=null;
    if(empty($age)  || empty($height)  || empty($weight) || empty($idealw))  {
        $result = true;
    }else{
       $result = false;
    } 
    return $result;
}

function validateAuxForm($age, $height, $weight, $idealw){
    if($age < 15 || $age > 80){
        return false;
    }
    if($height < 100 || $height > 250){
        return false;
    }
    if($weight < 30 || $weight > 300){
        return false;
    }
    if($idealw < 30 || $idealw > 300){
        if($idealw == $weight){
            return false;
        }
    }
    return true;
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

function updateUserAux($age, $height, $weight, $idealw){
    $auxId =  $_SESSION['userId'];
    $user = new User();
    if($user->updateAuxForm($age, $height, $weight, $idealw, $auxId)){
        header("location: ../account/perfilDieta.php");
        exit();
    }else{
        header("location: ../index.php?error=stmtfailed");//?error=stmtfailed
        exit();
    }
}


// Editar datos de usuario

function emptyEdit($data){
    $vacio = 0;
    if(isset($data->nombre)){
        if($data->nombre == ""){
            $vacio++;
        }
    }
    if(isset($data->apellidos)){
        if($data->apellidos == ""){
            $vacio++;
        }
    }
    if(isset($data->username)){
        if($data->username == ""){
            $vacio++;
        }
    }
    if($vacio == 0){
        return false;
    }else{
        return true;
    }
}

function userNameTaken($data){
    $user = new User();
    $uidExist = $user->getUserByUsername($data->username);
    if($uidExist === false || $uidExist === null){
        return false;
    }else{
        return true;
    }
}


function changeUserFirstName($data){
    $user = new User();
    if($user->updateUserFirstName($data->nombre, $_SESSION['userId'])){
        return true;
    }else{
        return false;
    }
}

function changeUserLastName($data){
    $user = new User();
    if($user->updateUserLastName($data->apellidos, $_SESSION['userId'])){
        return true;
    }else{
        return false;
    }
}

function changeUsername($data){
    $user = new User();
    if($user->updateUsername($data->username, $_SESSION['userId'])){
        return true;
    }else{
        return false;
    }
}


// Añadir desayuno

function addBreakfast($idUser, $idFood){
    $food = new Food();
    if($food->addToBreakfast($idUser, $idFood, $_SESSION['date'])){
        header("location: ../food/alimentos.php");
        exit();
    }else{
        header("location: ../food/alimentos.php?msj=fail");
        exit();
    }
}

function removeBreakfast($idFood){
    $food = new Food();
    if($food->removeFromBreakfast($_SESSION['userId'], $idFood, $_SESSION['date'])){
        return "alimentos.php";
    }else{
        return "alimentos.php?msj=fail";
    }
}

function addLaunch($idUser, $idFood){
    $food = new Food();
    if($food->addToLaunch($idUser, $idFood, $_SESSION['date'])){
        header("location: ../food/alimentos.php");
        exit();
    }else{
        header("location: ../food/alimentos.php?msj=fail");
        exit();
    }
}


function removeLaunch($idFood){
    $food = new Food();
    if($food->removeFromLaunch($_SESSION['userId'], $idFood, $_SESSION['date'])){
        return "alimentos.php";
    }else{
        return "alimentos.php?msj=fail";
    }
}

function addDinner($idUser, $idFood){
    $food = new Food();
    if($food->addToDinner($idUser, $idFood, $_SESSION['date'])){
        header("location: ../food/alimentos.php");
        exit();
    }else{
        header("location: ../food/alimentos.php?msj=fail");
        exit();
    }
}

function removeDinner($idFood){
    $food = new Food();
    if($food->removeFromDinner($_SESSION['userId'], $idFood, $_SESSION['date'])){
        return "alimentos.php";
    }else{
        return "alimentos.php?msj=fail";
    }
}


// ADMINISTRADOR

function emptyInputAdmin($name, $calorias, $hidratos, $proteinas, $grasas){
    $result=null;
    if(empty($name) || empty($calorias) || empty($hidratos) || empty($proteinas) || empty($grasas))  {
        $result = true;
    }else{
       $result = false;
    } 
    return $result;
}

function emptyInputAdminEx($name, $calorias){
    $result=null;
    if(empty($name) || empty($calorias))  {
        $result = true;
    }else{
       $result = false;
    } 
    return $result;
}

function exerciseExists($name){
    $ex = new Exercise();
    return $ex->checkExerciseByName($name);
}

function foodExists($name){
    $food = new Food();
    return $food->checkFoodByName($name);
}

function addExerciseAdmin($name, $calorias){
    $ex = new Exercise();
    if($ex->addExerciseAdmin($name, $calorias)){
        header("location: ../admin.php?msj=added");
        exit();
    }else{
        header("location: ../admin.php?msj=fail");
        exit();
    }
}

function addFoodAdmin($name, $calorias, $hidratos, $proteinas, $grasas){
    $food = new Food();
    if($food->addFood($name, $calorias, $hidratos, $proteinas, $grasas)){
        header("location: ../admin.php?msj=added");
        exit();
    }else{
        header("location: ../admin.php?msj=fail");
        exit();
    }
}


// EJERCICIOS

function addExercise($idUser, $idEx, $cantidad){
    $ex = new Exercise();
    if($ex->addExerciseUser($idEx, $idUser, $_SESSION['date'], $cantidad)){
        header("location: ../exercise/ejercicio.php");
        exit();
    }else{
        header("location: ../exercise/ejercicio.php");
        exit();
    }
}

function removeExercise($idEx){
    $ex = new Exercise();
    if($ex->deleteExercise($_SESSION['userId'], $idEx, $_SESSION['date'])){
        return "ejercicio.php";
    }else{
        return "ejercicio.php";
    }
}