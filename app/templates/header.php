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
    <link rel="stylesheet" type="text/css" href="../css/alimentos.css"/>
    <link rel="stylesheet" type="text/css" href="../css/ejercicio.css"/>
    <link rel="stylesheet" type="text/css" href="../css/forms.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <!-- jqury -->
    <script src="../js/jquery.js"></script>
    <script src="../js/jquerytest.js"></script>
    
    <!-- date picker -->
    <link rel="stylesheet" href="../datepiker/dtsel.css" />
    <script src="../datepiker/dtsel.js"></script>

</head>
<body>
<div class="container lightmode">
        <header>
            <h2><a href="../index.php">Inicio</a></h2>
            <?php
                if(isset($_SESSION['userUid'])){
                    echo '<div class="msg">';
                    echo '<p>¡Bienvenido '.$_SESSION['userUid'].'!</p>';
                    echo "</div>";
                }
            ?>
            <nav>
                <div class="lines">
                        <div class="line1"></div>
                        <div class="line2"></div>
                        <div class="line3"></div>
                </div>
                <ul class="nav-links">
                    <?php
                    // Obtenemos el nombre de la pagina actual
                    $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
                        if(isset($_SESSION['userUid'])){
                            // echo $curPageName;
                            if($curPageName == 'alimentos.php'){
                                echo '<li><a href="../food/alimentos.php"><p>Alimentos</p><div class="active"></div></a></li>  
                                  <li><a href="../exercise/ejercicio.php"><p>Ejercicio</p><div></div></a></li>  
                                  <li><a href="../informes/informes.php"><p>Informes</p><div></div></a></li> 
                                  <li><a href="../account/ajustes.php"><p>Ajustes</p><div></div></a></li>
                                  <li><a href="../include/logout.php"><p>Cerrar Sesion</p><div></div></a></li>
                                  <li><a class="night lightmode"><img src="../images/luna2.png"></a></li>';
                            }else if($curPageName == 'ejercicio.php'){
                                echo '<li><a href="../food/alimentos.php"><p>Alimentos</p><div></div></a></li>  
                                  <li><a href="../exercise/ejercicio.php"><p>Ejercicio</p><div class="active"></div></a></li>  
                                  <li><a href="../informes/informes.php"><p>Informes</p><div></div></a></li> 
                                  <li><a href="../account/ajustes.php"><p>Ajustes</p><div></div></a></li>
                                  <li><a href="../include/logout.php"><p>Cerrar Sesion</p><div></div></a></li>
                                  <li><a class="night lightmode"><img src="../images/luna2.png"></a></li>';
                            }else{

                            echo '<li><a href="../food/alimentos.php"><p>Alimentos</p><div></div></a></li>  
                                  <li><a href="../exercise/ejercicio.php"><p>Ejercicio</p><div></div></a></li>  
                                  <li><a href="../informes/informes.php"><p>Informes</p><div></div></a></li> 
                                  <li><a href="../account/ajustes.php"><p>Ajustes</p><div></div></a></li>
                                  <li><a href="../include/logout.php"><p>Cerrar Sesion</p><div></div></a></li>
                                  <li><a class="night lightmode"><img src="../images/luna2.png"></a></li>';
                            }
                        }else{
                            if($curPageName == 'inicioSesion.php'){
                                echo '<li><a href="inicioSesion.php"><p>Inicio de sesion</p><div class="active"></div></a></li>
                                      <li><a href="registro.php"><p>Registrarse</p><div></div></a></li>
                                      <li><a class="night lightmode"><img src="../images/luna2.png"></a></li>';
                            }else if($curPageName == 'registro.php'){
                                echo '<li><a href="inicioSesion.php"><p>Inicio de sesion</p><div></div></a></li>
                                      <li><a href="registro.php"><p>Registrarse</p><div class="active"></div></a></li>
                                      <li><a class="night lightmode"><img src="../images/luna2.png"></a></li>';
                            }else{
                                echo '<li><a href="inicioSesion.php"><p>Inicio de sesion</p><div></div></a></li>
                                      <li><a href="registro.php"><p>Registrarse</p><div></div></a></li>
                                      <li><a class="night lightmode"><img src="../images/luna2.png"></a></li>';
                            }
                        }
                    
                    ?>
                </ul>
            </nav>
        </header>
