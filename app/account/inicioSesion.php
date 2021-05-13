<?php require_once '../templates/header.php' ?>
    <div class="content nochanges">
        <div class="main-forms">
            <div class = "register login">
                <h2>Inicia Sesión</h2>
                <form action="../include/loginForm.php" method="POST">
                    <input type="text" name="usuario" placeholder="Nombre de Usuario o email...">
                    <input type="password" name="pswd" placeholder="Contraseña...">
                    <button type="submit" name="enviar">Iniciar Sesion</button>
                </form>
                <div class="msg">
                    <p>Para crear una cuenta <a href="">Pincha aquí</a></p>
                </div>
            </div>            
            <div class="card back">
                <div>
                    <h2>Bienvenido</h2>
                    <p>Por favor introduce los datos necesarios</p>
                    <a>Iniciar sesion</a>
                </div>
            </div>
        </div>
    </div>
            <?php
            $error = "";
            if(isset($_GET['error'])){
                if($_GET['error']=="emptyinput"){
                    $error = '¡Debes rellenar todos los datos!';
                }
                if($_GET['error']=="wronglogin"){
                    $error = '¡Usuario o contraseña inválidas!';
                }
            }
            ?>
            <div class="msg">
                <p><?php echo $error?></p>
            </div>
	<?php require_once '../templates/footer.php' ?>
</html>