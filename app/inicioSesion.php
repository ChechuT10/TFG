<?php require_once 'templates/header.php' ?>

            <div class="contenido">
                <form action="include/loginForm.php" method="POST">
                    <input type="text" name="usuario" placeholder="Nombre de Usuario o email...">
                    <input type="password" name="pswd" placeholder="Contraseña...">
                    <button type="submit" name="enviar">Enviar</button>
                </form>
                <div class="redirect">
                <p>Todavía no eres miembro? <a href="registro.php">Pincha aquí</a></p>
                </div> 
            </div>            
        <?php
        $error = "";
        if(isset($_GET['error'])){
            if($_GET['error']=="emptyinput"){
                $error = '¡Debes rellenar todos los datos!';
            }
            if($_GET['error']=="wronglogin"){
                $error = '¡Usuario o contraseña inválidas o no existen!';
            }
        }
        ?>
        <div class="msg">
            <p><?php echo $error?></p>
        </div>

	<?php require_once 'templates/footer.php' ?>
</html>