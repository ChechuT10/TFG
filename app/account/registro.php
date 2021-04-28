<?php require_once '../templates/header.php'?>
    <div class="content">
            <div class = "register">
            <form action="../include/registroForm.php" method="POST">
                <input type="text" name="nombre" placeholder="Nombre y Apellidos...">
                <p>Debe incluir solo letras y espacios</p>
                <input type="text" name="apellidos" placeholder="Apellidos...">
                <p>Entre 5 y 12 caracteres</p>
                <input type="text" name="usuario" placeholder="Nombre de Usuario...">
                <p>Entre 5 y 12 caracteres</p>
                <input type="email" name="email" placeholder="Email...">
                <p>Comprueba que es correcto</p>
                <input type="password" name="pswd" placeholder="Contraseña...">         
                <p>Entre 8 y 20 caracteres</p>  
                <!-- <input type="number" name="edad" placeholder="Introduce tu edad...">         
                <p>Entre 8 y 20 caracteres</p>  
                <input type="number" name="peso" placeholder="Peso actual...">         
<<<<<<< HEAD
                <p>Entre 8 y 20 caracteres</p>   -->
=======
                <p>Entre 8 y 20 caracteres</p>
                <input type="number" name="altura" placeholder="Altura actual...">         
                <p>Entre 8 y 20 caracteres</p>
>>>>>>> 07332963087269dc283a479aecbf7d5ff7652dda
                <button type="submit" name="enviar">Enviar</button>
            </form>
            </div>
            <?php
            $error = "";
            if(isset($_GET['error'])){
                if($_GET['error']=="emptyinput"){
                    $error = '¡Debes rellenar todos los datos!';
                }
                if($_GET['error']=="usernametaken"){
                    $error = '¡El nombre de usuario o email ya está en uso!';
                }
                if($_GET['error']=="stmtfailed"){
                    $error = '¡Algo fue mal, intentálo de nuevo!';
                }
            }
            ?>
            <div class="msg">
                <p><?php echo $error?></p>
            </div>
        </div>
    <?php require_once '../templates/footer.php'?>
    <script src="../js/regex.js"></script>
</html>