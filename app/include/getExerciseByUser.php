<?php

session_start();
require_once '../class/dbc.php';
require_once '../class/exercise.php';

$aux = new Exercise();
$actividad = $aux->getExercises($_SESSION['userId'], $_SESSION['date']);
$ejercicios = [];

function array_push_assoc($array, $key, $value){
    $array[$key] = $value;
    return $array;
}

if($actividad){
    foreach($actividad as $a){
        $ex = $aux->getExerciseById($a['idEjercicio']);
        $ex = array_push_assoc($ex,'minutos',$a['minutos']);
        array_push ($ejercicios, $ex);
    }
}
echo json_encode($ejercicios)

?>