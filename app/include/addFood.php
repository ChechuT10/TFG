<?php
//funciones

if(isset($_POST['enviar'])){

    $idUser = $_POST['idUser'];
    $idFood = $_POST['idFood'];
    $type = $_POST['tipo'];

    require_once "functions.php";

    if($type == 'desayuno'){
        addBreakfast($idUser, $idFood);
    }
    else if($type == 'comida'){
        addLaunch($idUser, $idFood);
    }
    else if($type == 'cena'){
        addDinner($idUser, $idFood);
    }else{
        header("location: ../food/alimentos.php?msj=fail");
        exit();
    }

}else{
    header("location: ../food/alimentos.php");
    exit();
}