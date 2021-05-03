<?php
require_once "functions.php";

$opcion = $_REQUEST['data'];
$datos = json_decode($opcion);
$url = "exito";

if(emptyEdit($datos) !== false){
    $url = "vacio";
}
if(userNameTaken($datos) != false){
    $url = "no valido";
}

echo json_encode($url);
?>