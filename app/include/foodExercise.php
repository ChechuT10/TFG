<?php

function array_push_assoc($array, $key, $value){
    $array[$key] = $value;
    return $array;
}

$aux = new Exercise();
$actividad = $aux->getExercises($_SESSION['userId'], $_SESSION['date']);
$ejercicios = [];

if($actividad){
    foreach($actividad as $a){
        $ex = $aux->getExerciseById($a['idEjercicio']);
        $ex = array_push_assoc($ex,'minutos',$a['minutos']);
        array_push ($ejercicios, $ex);
    }
}


$aux = new Food();
$breakfast = $aux->getBreakfast($_SESSION['userId'], $_SESSION['date']);
$launch = $aux->getLaunch($_SESSION['userId'], $_SESSION['date']);
$dinner = $aux->getDinner($_SESSION['userId'], $_SESSION['date']);
$alimentos = [];


if($breakfast){
    foreach($breakfast as $a){
        $food = $aux->getFoodById($a['idAlimento']);
        $food = array_push_assoc($food,'cantidad',$a['cantidad']);
        array_push ($alimentos, $food);
    }
}

if($launch){
    foreach($launch as $a){
        $food = $aux->getFoodById($a['idAlimento']);
        $food = array_push_assoc($food,'cantidad',$a['cantidad']);
        array_push ($alimentos, $food);
    }
}

if($dinner){
    foreach($dinner as $a){
        $food = $aux->getFoodById($a['idAlimento']);
        $food = array_push_assoc($food,'cantidad',$a['cantidad']);
        array_push ($alimentos, $food);
    }
}


$sumaEjercicios = 0;
$sumaAlimentos = 0;

foreach($ejercicios as $ej){
    $sumaEjercicios += intval($ej['calorias']*($ej['minutos']));
}
foreach($alimentos as $a){
    $sumaAlimentos += intval($a['calorias']*($a['cantidad']/100));
}

$neto = $sumaAlimentos-$sumaEjercicios;
$auxneto = 0;

if ($neto > 100) {
    $auxneto = 100;
}
else if ($neto < 0) {
    $auxneto = 0;
}else{
    $auxneto = $neto;
}

?>