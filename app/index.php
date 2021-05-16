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
<body class="lightmode">
<div class="container lightmode">
    <?php if(isset($_SESSION['userId'])): ?>
            <header>
                <a href="index.php" class="logo"><img src="images/logo_small.png"></a>
                <div class="msg">
                    <p>¡Bienvenido <?php echo $_SESSION['userUid']?>!</p>
                </div>
                <nav>
                    <div class="lines">
                            <div class="line1"></div>
                            <div class="line2"></div>
                            <div class="line3"></div>
                    </div>
                    <ul class="nav-links">
                        <li><a href="food/alimentos.php"><p>Alimentos</p><div></div></a></li>  
                        <li><a href="exercise/ejercicio.php"><p>Ejercicio</p><div></div></a></li>  
                        <li><a href=""><p>Informes</p><div></div></a></li> 
                        <li><a href="account/ajustes.php"><p>Ajustes</p><div></div></a></li>
                        <li><a href="include/logout.php"><p>Cerrar Sesion</p><div></div></a></li>
                        <li><a class="night"><img src="images/luna2.png"></a></li>
                    </ul>
                </nav>
            </header>
            <!-- Hacerlo con una variable de user s/n y cuando el usuario rellene estos datos que se marque como completa -->
            <?php
                    $aux = new User();
                    $user = $aux->getUserById($_SESSION['userId']);
                    if($user['auxForm'] == 'N'){
                        echo '<div class="fullscreen-container">
                                <div class="other-form">
                                <h2>Solo falta un poco</h2>
                                <form action="include/auxForm.php" method="POST">
                                <input type="number" name="edad" placeholder="Introduce tu edad..."> 
                                <input type="number" name="altura" placeholder="Altura actual...">  
                                <input type="number" name="peso" placeholder="Peso actual...">  
                                <input type="number" name="pesoideal" placeholder="Peso a lograr...">  
                                <button type="submit" name="enviar">Enviar</button>
                            </form>
                        </div></div>';
                    }
            ?>
            <div class="content">

            </div>
                <footer>
                    <div class="contacto">
                            <div class="redes">
                                <h3>Síguenos en</h3>
                                <a href="https://twitter.com/"><img src="images/tw.png">Twitter</a>
                                <a href="https://www.instagram.com/"><img src="images/insta.png">Instagram</a>
                                <a href="https://www.facebook.com/"><img src="images/facebook.png">Facebook</a>
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
                <p>Copyright &copy; MMN | Todos los derechos reservados</p>
                </footer>
    <?php else: ?>
        <div class="back-image">
            <header>
                <a href="index.php" class="logo"><img src="images/logo_small.png"></a>
                <nav>
                    <div class="lines">
                            <div class="line1"></div>
                            <div class="line2"></div>
                            <div class="line3"></div>
                    </div>
                    <ul class="nav-links">
                        <li><a href="account/inicioSesion.php"><p>Inicio de sesion</p><div></div></a></li>
                        <li><a href="account/registro.php"><p>Registrarse</p><div></div></a></li>
                        <li><a class="night"><img src="images/luna2.png"></a></li>;
                    </ul>
                </nav>
            </header>
            <div class="small-back-image">
                <div class="mensaje">
                    <div>
                        <h1 id="primero">Binevenido</h2>
                        <h1 id="segundo">a</h2>
                        <h1 id="tercero">NutriLife</h2>
                    </div>
                    <p>En esta aplicación te ayudaremos a controlar tu ingesta calórica
                        y tu actividad física durante el tiempo que estes con nosotros.
                        En ella verás los nutrientes, calorias y otros aspectos que influiran
                        en tí para mejorar tu salud y te aydara a perder, ganar o mantener tu
                        forma fisica.
                    </p>
                    <a href="">Comencemos</a>
                </div>
                <div class="info">
                </div>
            </div>
        </div>
            <div class="content">

            </div>
                <footer>
                    <div class="contacto">
                            <div class="redes">
                                <h3>Síguenos en</h3>
                                <a href="https://twitter.com/"><img src="images/tw.png">Twitter</a>
                                <a href="https://www.instagram.com/"><img src="images/insta.png">Instagram</a>
                                <a href="https://www.facebook.com/"><img src="images/facebook.png">Facebook</a>
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
                <p>Copyright &copy; MMN | Todos los derechos reservados</p>
                </footer>
    <?php endif ?>
</div> 
</body>
<script src="js/js.js"></script>
</html>