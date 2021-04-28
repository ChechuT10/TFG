<?php
    session_start();
    require_once "class/dbc.php";
    require_once "class/user.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/jquerytest.js"></script>
</head>
<body>
<div class="container lightmode">
        <header>
            <h2><a href="index.php">Inicio</a></h2>
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
                        if(isset($_SESSION['userUid'])){
                            echo '<li><a href="account/perfil.php?id='.$_SESSION["userId"].'"><p>Perfil</p></a></li>
                                  <li><a href="include/logout.php"><p>Cerrar Sesion</p></a></li>
                                  <li><a class="night lightmode"><img src="images/luna.png"></a></li>';
                        }else{
                            echo '<li><a href="account/inicioSesion.php"><p>Inicio de sesion</p></a></li>
                                  <li><a href="account/registro.php"><p>Registrarse</p></a></li>
                                  <li><a class="night lightmode"><img src="images/luna.png"></a></li>';
                        }
                    
                    ?>
                </ul>
            </nav>
        </header>
        <?php
            if(isset($_SESSION['userUid'])){
                echo '<div class="subheader"><ul>
                      <li><a href="">Mi pagina de inicio</a></li>  
                      <li><a href="food/alimentos.php">Alimento</a></li>  
                      <li><a href="exercise/ejercicio.php">Ejercicio</a></li>  
                      <li><a href="">Informes</a></li>  
                      </ul></div>';
            }
        ?>
        <!-- Hacerlo con una variable de user s/n y cuando el usuario rellene estos datos que se marque como completa -->
        <?php
            if(isset($_SESSION['userUid'])){
                $aux = new User();
                $user = $aux->getUserById($_SESSION['userId']);
                if($user['auxForm'] == 'N'){
                    echo '<div class="other-form">
                            <form action="include/auxForm.php" method="POST">
                            <input type="number" name="edad" placeholder="Introduce tu edad..."> 
                            <input type="number" name="altura" placeholder="Altura actual...">  
                            <input type="number" name="peso" placeholder="Peso actual...">  
                            <input type="number" name="pesoideal" placeholder="Peso ideal...">  
                            <button type="submit" name="enviar">Enviar</button>
                        </form>
                      </div>';
                }
            }
        ?>
        <div class="content">
            <div class="resumen">
                <h3>Resumen</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Dolorum molestias, accusantium ab saepe necessitatibus laborum facilis 
                    quod numquam ipsa quae magni eaque dicta perferendis repellat harum officia 
                    blanditiis vero dolores?</p>
            </div>
            <div class="grafica">
                <img src="images/graphic.png">
            </div>
        </div>
            <footer>
                <div class="contacto">
                        <div class="redes">
                            <h3>Síguenos en</h3>
                            <a href=""><img src="images/tw.png">Twitter</a>
                            <a href=""><img src="images/insta.png">Instagram</a>
                            <a href=""><img src="images/facebook.png">Facebook</a>
                        </div>
                        <div class="preguntas">
                            <h3>Conócenos</h3>
                            <a href="">¿Quiénes somos?</a>
                            <a href="">Ayuda</a>
                            <a href="">Preguntas Frecuentes</a>
                        </div>
                        <div class="legal">
                            <h3>Legal</h3>
                            <a href="">Condiciones de uso</a>
                            <a href="">Politica de Privacidad</a>
                            <a href="">Cookies</a>
                        </div>
                </div>
            <p>Copyright &copy; MMN | Todos los dereechos reservados</p>
            </footer>
</div> 
</body>
<script src="js/js.js"></script>
</html>