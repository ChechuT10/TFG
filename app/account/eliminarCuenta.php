<?php 
include('../templates/header.php'); 
?>
<div class = "content">
    <?php if(isset($_SESSION['userId'])):?>
        <div class = "delete-Account">
            <h2>Borrar Cuenta</h2>
            <hr>
            <div class="info">
                <h4>ANTES DE CONTINUAR: </h4>
                <p>Entiendo que esto eliminará de forma permanente mi cuenta en MyFitnessPal, 
                que no podré recuperar mi información y que esta acción no se puede deshacer.
                <Br>
                Entiendo que perderé para siempre el acceso a todos los datos asociados con mi perfil, 
                incluidas las entradas de alimentos, las rutinas, las entradas de pasos, las entradas de peso
                , las notas, las publicaciones en el canal de noticias y las fotos.</p>
            </div>
            <p>¿Estas seguro que deseas borrar tu cuenta?</p>
            <form action="../include/deleteAccount.php" method="POST">
                <button type="submit" name="borrar">Borrar Mi Cuenta</button>
            </form>
            <a href="">Cancelar</a>
        </div>
    <?php else: ?>
        <div class="msg">
        <p>No tienes acceso</p>
        </div>
    <?php endif ?>   
</div>
<?php include('../templates/footer.php'); ?>
</html>