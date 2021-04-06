<?php 
include('../templates/header.php'); 
require_once '../class/dbc.php';
require_once '../class/user.php';
require_once '../class/food.php';

    //detalles de cada usuario
    if(isset($_GET['id']) && $_GET['id'] == $_SESSION['userId']){

        $id = $_GET['id'];
        $aux = new User();
        $user = $aux->getUserById($id);
    }
?>

    <?php if(isset($user)):?>
        <div>
            <!--Duda de si se puede añadir padding a una tabla-->
            <table>
                <tr>
                    <th><h2>Información personal</h2></th>
                </tr>
                <tr>
                    <td><h4>NOMBRE</h4></td>
                    <td><p><?php echo $user['userName'];?></p></td>
                </tr>
                <tr>
                    <td><h4>NOMBRE DE USUARIO</h4></td>
                    <td><p><?php echo $user['userUid']; ?></p></td>
                </tr>
                <tr>
                    <td><h4>CORREO ELECTRÓNICO<h4></td>
                    <td><p><?php echo $user['userEmail']; ?></p></td>
                </tr>        
            </table>
        </div>
    <?php else: ?>
        <div class="msg">
        <p>No tienes acceso</p>
        </div>
    <?php endif ?>    

    <div class="redirect mgtop">
        <a href="../index.php">Volver a la página anterior</a>
    </div>

    <?php include('../templates/footer.php'); ?>
    <script type="text/javascript">
    let al = [];
    var a = <?php echo json_encode($food); ?>;
    a.forEach(el => {
            console.log(el)



    });


 </script>
</html>

