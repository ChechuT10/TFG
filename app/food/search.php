<?php require_once '../templates/header.php' ?>
<?php
    require_once "../class/dbc.php";
    require_once "../class/user.php";
    require_once "../class/food.php";

    $msj = "";
    if (isset($_GET['search'])) {
        if ($_GET['search'] != "") {
            $aux2 = new Food();
            $msj = $_GET['search'];
            $foods = $aux2->getFoodByName($msj);
        }
    }
?>
<div class="content">
    <?php if ($foods) : ?>
        <div class="food-search">
            <h3>Búsqueda nuestra base de datos de alimentos por nombre: </h3>
            <input type="text" value="<?php echo $msj ?>" readonly>
            <h3>Resultados coincidentes</h3>
        </div>
        <div class="search-flex">
            <div class="resultado">
                <?php foreach ($foods as $food) : ?>
                    <div class="food">
                        <div class="preview">
                            <h4><?php echo $food['nombre'] ?></h4>
                            <p>100g | <?php echo $food['calorias'] ?>Kcal | ... </p>
                        </div>
                        <div class="resultados">
                            <p>Calorias: <?php echo $food['calorias'] ?></p>
                            <p>Hidratos: <?php echo $food['hidratos'] ?></p>
                            <p>Proteinas: <?php echo $food['proteinas'] ?></p>
                            <p>Grasas: <?php echo $food['grasas'] ?></p>
                        </div>
                    <form action="../include/addFood.php" method="POST">
                        <input type="hidden" name="idUser" value="<?php echo $_SESSION["userId"] ?>">
                        <input type="hidden" name="idFood" value="<?php echo $food['idalimentos'] ?>">
                        <input type="hidden" name="tipo" value="<?php echo $_GET['food'] ?>">
                        <label>Introduce la cantidad:</label>
                        <input type="number" name="cantidad">
                        <br>
                        <button type="submit" name="enviar" class="botonEnviar">Añadir</button>
                    </form>
                    </div>
                <?php endforeach ?>
            </div>
            <div class = "copy-food"></div>
        </div>
    <?php else : ?>
        <div class="msg">
            <p class="bold white">No se encuentra dicho alimento en nuestra base de datos</p>
        </div>
    <?php endif ?>
</div>
<?php require_once '../templates/footer.php' ?>
<script>
    let foods = document.querySelectorAll('.food')
    let div = document.querySelector('.copy-food')

    foods.forEach(el=>{
        el.addEventListener("click",function(){
            div.textContent = ""
            let form = el.querySelector('form')
            let res = el.querySelector('.resultados')
            let cloneform = form.cloneNode(true)
            let clone = res.cloneNode(true)
            div.appendChild(clone)
            div.appendChild(cloneform)
        })
    })
</script>
</html>