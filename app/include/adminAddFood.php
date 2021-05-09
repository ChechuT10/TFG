<?php
//funciones

if(isset($_POST['enviar'])){

    $name = $_POST['nombre'];
    $calorias = $_POST['calorias'];
    $hidratos = $_POST['hidratos'];
    $proteinas = $_POST['proteinas'];
    $grasas = $_POST['grasas'];

    require_once "functions.php";

    if(emptyInputAdmin($name, $calorias, $hidratos, $proteinas, $grasas) !== false){
        header("location: ../admin.php?error=emptyinput");
        exit();
    }
    if(foodExists($name) != false || foodExists($name) != null){
        header("location: ../account/registro.php?error=usernametaken");
        exit();
    }
    //Los errores de datos los manejamos con rejex   
    addFoodAdmin($name, $calorias, $hidratos, $proteinas, $grasas);

}else{
    header("location: ../account/admin.php");
    exit();
}