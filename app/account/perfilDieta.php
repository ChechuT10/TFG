<?php 
include('../templates/header.php'); 
require_once '../class/dbc.php';
require_once '../class/user.php';
    //detalles de cada usuario
    if(isset($_SESSION['userId'])){

        $id = $_SESSION['userId'];
        $aux = new User();
        $data = $aux->getAuxForm($id);
    }
?>
<div class = "content">
    <?php if(isset($data)):?>
        <div class = "">
            <form action="../include/editAuxForm.php" method="POST">
                <label for="fname">Edad: </label>
                <input type="text" name = "edad">
                <label for="fname">Altura: </label>
                <input type="text" name = "altura">
                <label for="fname">Peso Inicial: </label>
                <input type="text" name = "peso">
                <!-- <label for="fname">Peso Actual: </label>
                <input type="text" name = "pesoActual"> -->
                <label for="fname">Peso Ideal: </label>
                <input type="text" name = "pesoideal">
                <button type="submit" name = "enviar">Actualizar Perfil</button>
            </form>
        </div>
    <?php else: ?>
        <div class="msg">
        <p>No tienes acceso</p>
        </div>
    <?php endif ?>   
</div>
<?php include('../templates/footer.php'); ?>
<script type="text/javascript">

    const datos = <?php echo json_encode($data); ?>;
    let edadInput = document.querySelector('input[name=edad]')
    let altInput = document.querySelector('input[name=altura]')
    let pesoInput = document.querySelector('input[name=peso]')
    // let pesoActInput = document.querySelector('input[name=pesoActual]')
    let pesoIdInput = document.querySelector('input[name=pesoideal]')
    edadInput.value = datos.edad
    altInput.value = datos.altura
    pesoInput.value = datos.peso
    // pesoActInput.value = datos.peso
    pesoIdInput.value = datos.pesoIdeal

</script>
</html>