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
                <tr class="nombretr">
                    <td><h4>NOMBRE</h4></td>
                    <td><p><?php echo $user['nombre'];?></p></td>
                    <td><p class="edit nombre">Editar</p></td>
                </tr>
                <tr class="apellidotr">
                    <td><h4>NOMBRE</h4></td>
                    <td><p><?php echo $user['apellidos'];?></p></td>
                    <td><p class="edit apellido">Editar</p></td>
                </tr>
                <tr class="usernametr">
                    <td><h4>NOMBRE DE USUARIO</h4></td>
                    <td><p><?php echo $user['nombreUser']; ?></p></td>
                    <td><p class="edit username">Editar</p></td>
                </tr>
                <tr>
                    <td><h4>CORREO ELECTRÓNICO<h4></td>
                    <td><p><?php echo $user['email']; ?></p></td>
                </tr>        
            </table>
        </div>
        <div class="save">
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

    let editName = document.querySelector('.nombre')
    let editLastName = document.querySelector('.apellido')
    let editUsername = document.querySelector('.username')
    let edit = document.querySelectorAll('.edit')
    let save = document.querySelector('.save')


function sendData(data){
    let url = "../include/editUserInfo.php";
    let params = {
        method: 'post',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'data=' + JSON.stringify(data)
    }
    fetch(url,params)
    .then(function(respuesta){
        return respuesta.json();
        // return respuesta.text;
    }).then(function(datos){
        console.log(datos)
    })
}


function guardar(btn){
    btn.addEventListener("click",function(){
        data = {}
        let inputs = document.querySelectorAll('input')
        inputs.forEach(el=>{
            if (el.name == "nombre"){
                data.nombre = el.value
            }
            if (el.name == "apellidos"){
                data.apellidos = el.value
            }
            if (el.name == "username"){
                data.username = el.value
            }
        })
        sendData(data)
        editarDatos()
    })
}

// console.log(edit)
function editarDatos(){
    edit.forEach(el=>{
        el.addEventListener("click",function(){
            save.textContent = ""
            let input = document.createElement('input')
            let button = document.createElement('button')
            input.type = "text"
            button.type = "submit"
            button.textContent="Guardar"
            if(this == editName){
                let p = document.querySelector('.nombretr p')
                input.value = p.textContent 
                input.name = "nombre"
                p.textContent = ""
                p.append(input)
            }
            if(this == editLastName){
                let p = document.querySelector('.apellidotr p')
                input.value = p.textContent 
                p.textContent = ""
                input.name = "apellidos"
                p.append(input)
            }
            if(this == editUsername){
                let p = document.querySelector('.usernametr p')
                input.value = p.textContent 
                p.textContent = ""
                input.name = "username"
                p.append(input)
            }
            save.append(button)
            guardar(button)
        })
    })
}


window.addEventListener('load', function(){
    editarDatos()
})

</script>
</html>

