<?php

session_start();
require_once '../class/dbc.php';
require_once '../class/food.php';
$aux = new Food();
$breakfast = $aux->getBreakfast($_SESSION['userId']);
$launch = $aux->getLaunch($_SESSION['userId']);
$dinner = $aux->getDinner($_SESSION['userId']);
$alimentos = [];

if($breakfast){
    foreach($breakfast as $a){
        $food = $aux->getFoodById($a['idAlimento']);
        array_push ($alimentos, $food);
    }
}

if($launch){
    foreach($launch as $a){
        $food = $aux->getFoodById($a['idAlimento']);
        array_push ($alimentos, $food);
    }
}

if($dinner){
    foreach($dinner as $a){
        $food = $aux->getFoodById($a['idAlimento']);
        array_push ($alimentos, $food);
    }
}

echo json_encode($alimentos)

?>