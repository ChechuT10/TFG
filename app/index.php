<?php require_once 'templates/header.php'?>

<?php
    $msj = "";
    if(isset($_GET['msj'])){
        if($_GET['msj']=="exito"){
            $msj = '¡Registrado con éxito!';
        }
    }
?>

<?php
    if(isset($_SESSION['userUid'])){
		echo '<div class="msg">';
		echo '<p>¡Bienvenido '.$_SESSION['userUid'].'!</p>';
        echo "</div>";
        echo '<div class="redirect">';
        echo '<p>Para gestionar archivos <a href="gestionArchivos/index.php">pulse aquí</a></p>';
        echo "</div>";
        require_once 'class/dbc.php';
        require_once 'class/food.php';
        $aux2 = new Food();
        $food = $aux2->getFood();
        echo '<div class="wrapper">
             <div class="search-input">
             <input type="text" name="alimento" id="alimento" placeholder="Busca un alimento...">
             <ul id="palabras"></ul>
             <div class="icon"></div>
             </div></div>';
	 }
?>

    <div class="msg">
            <p class="bold white"><?php echo $msj?></p>
    </div>

<?php require_once 'templates/footer.php'?>

<script type="text/javascript">
let val;
const alimentos = <?php echo json_encode($food); ?>;
console.log(alimentos.length)

function damePalabras(raiz){
    palabras=[]
    if (raiz!=""){
        alimentos.forEach(el=>{
            if(el.name.toLowerCase().indexOf(raiz.toLowerCase())==0){
                palabras.push(el)
            }
        })
    }
    return palabras
}

if(bus!=null && pal!=null){
    bus.addEventListener('keyup',function(){
        // val = null
        let click = false;
        var cont = this.value;
        pal.textContent = "";
        aux = damePalabras(cont)
        // console.log(aux)
        
        aux.forEach(el=>{
            let li = document.createElement('li')
            li.textContent = el.name;
            pal.appendChild(li)
            li.addEventListener('click',function(){               
                bus.value = this.textContent
                pal.textContent = "";
                click = true
                console.log(click)
            })
            // console.log(click)
            // if(bus.value.toLowerCase() == el.name.toLowerCase()){
            //     click = true
            // }
            if(click == true){
                console.log('s')
                val = el;
            }
        })
        console.log(click)
        // console.log(pal)
        // console.log(cont)
    })
}

let icon = document.querySelector('.icon')
icon.addEventListener('click',function(){
    console.log('click')
    console.log(val)
    // if(val.name == bus.value){
    //     console.log(val)
    // }
     if(bus.value.length>0){
        console.log('no')
    }
     if(bus.value.length==0){
        console.log('vacio')
    }
})

 </script>
</html>