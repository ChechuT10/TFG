<?php

session_start();
require_once '../class/dbc.php';
require_once '../class/food.php';

if(isset($_GET['date'])){
    $_SESSION['date'] = $_GET['date'];
}else{
    $auxdate = getdate();
    $year = $auxdate['year'];
    $month = $auxdate['mon'];
    $day = $auxdate['mday'];
    $date = "$year-$month-$day";
    $_SESSION['date'] = $date;
}

$aux = new Food();
$breakfast = $aux->getBreakfast($_SESSION['userId'], $_SESSION['date']);
$launch = $aux->getLaunch($_SESSION['userId'], $_SESSION['date']);
$dinner = $aux->getDinner($_SESSION['userId'], $_SESSION['date']);
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