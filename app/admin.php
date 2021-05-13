<?php
    session_start();
    require_once "class/dbc.php";
    require_once "class/user.php";
    require_once "class/food.php";
    $aux = new Food();
    $food = $aux->getFoodCount();
    $aux2 = new User();
    $users = $aux2->getUsersCount();
    // print_r($food);
    // echo (count($food))
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/admin.css"/>
    <script src="js/jquery.js"></script>
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- <script src="js/jquery.js"></script> -->
    <!-- <script src="js/jquerytest.js"></script>  -->
</head>
<body>
<div class="container ">
    <?php if(isset($_SESSION['userId'])): ?>
        <header>
        <a href="" class="index"><img src="images/logo_white_large.png"></a>
        <div class="section">
            <img src="images/houseIcon.png">
            <p>Inicio<p>
        </div>
        <div class="section sfood">
            <img src="images/foodicon2.png">
            <p>Comida<p>
        </div>
        <div class="section sexe">
            <img src="images/exerciseicon.png">
            <p>Ejercicio<p>
        </div>
        <!-- Si esta muy vacio podria añadir una lista de usuario o alimentos -->
        <!-- https://windmill-dashboard.vercel.app/index.html -->
        </header>
        <div class="content">
            <a class="logout" href="include/logout.php"><img src="images/power.png"></a>
            <h2>Bienvenido a la vista de administrador</h2>
            <div class="info">
                <div class="card">
                    <img src="images/foodIcon.png">
                    <p class = "tit">Total Alimentos</p>
                    <?php if(isset($food)): ?>
                        <p class = "count"><?php echo $food ?></p>
                    <?php else:?>
                        <p class = "count">0</p>
                    <?php endif ?>
                </div>
                <div class="card">
                <img src="images/usersIcon.png">
                    <p class = "tit">Total Usuarios</p>
                    <?php if(isset($users)): ?>
                        <p class = "count"><?php echo $users ?></p>
                    <?php else:?>
                        <p class = "count">0</p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form">
                <div class="add-food">
                    <h4>Añade un alimento</h4>
                    <form action="include/adminAddFood.php" method="POST">
                        <input type="text" name="nombre" placeholder="Nombre del alimento">
                        <input type="number" name="calorias" placeholder="Calorias">
                        <input type="number" name="hidratos" placeholder="Hidratos">
                        <input type="number" name="proteinas" placeholder="Proteinas">
                        <input type="number" name="grasas" placeholder="grasas">
                        <button type="submit" name="enviar">Guardar</button>
                    </form>
                </div>
                <div class="add-exercise">
                    <h4>Añade un ejercicio</h4>
                    <form action="include/adminAddExercise.php" method="POST">
                        <input type="text" name="nombre" placeholder="Nombre del ejercicio">
                        <input type="number" name="calorias" placeholder="Calorias quemadas">
                        <button type="submit" name="enviar">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    <?php else: ?>
        <p>No tienes permiso</p>
    <?php endif ?> 
</div> 
</body>
<script>

$(document).ready(function () {
    let ex = $('.sexe')
    let food = $('.sfood')

    let f = $('.add-food')
    let e = $('.add-exercise')

    ex.on("click",function(){
        f.fadeOut(400,function(){
            e.fadeIn(400)
        }) 
    })

    food.on("click",function(){
        e.fadeOut(400,function(){
            f.fadeIn(400)
        }) 
    })

})

</script>
</html>