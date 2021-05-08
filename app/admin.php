<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/admin.css"/>
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <!-- <script src="js/jquery.js"></script> -->
    <!-- <script src="js/jquerytest.js"></script>  -->
</head>
<body>
<div class="container ">
    <?php if(isset($_SESSION['userId'])): ?>
        <header>
        <h2><a href="index.php">Inicio</a></h2>
        <ul>
            <li><a href="include/logout.php"><p>Cerrar Sesion</p><div></div></a></li>
        </ul>
        <!-- Si esta muy vacio podria añadir una lista de usuario o alimentos -->
        <!-- https://windmill-dashboard.vercel.app/index.html -->
        </header>
        <div class="content">
            <h2>Bienvenido a la vista de administrador</h2>
            <h4>Añade un alimento</h4>
            <form action="../include/adminAddFood.php" method="POST">
                <input type="text" name="nombre" placeholder="Nombre del alimento">
                <input type="number" name="calorias" placeholder="Calorias">
                <input type="number" name="hidratos" placeholder="Hidratos">
                <input type="number" name="proteinas" placeholder="Proteinas">
                <input type="number" name="grasas" placeholder="grasas">
                <button type="submit" name="enviar">Guardar</button>
            </form>
        </div>

    <?php else: ?>
        <p>No tienes permiso</p>
    <?php endif ?> 
</div> 
</body>
</html>