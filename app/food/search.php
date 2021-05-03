<?php require_once '../templates/header.php'?>
    <div class="content">
        <?php
        require_once "../class/dbc.php";
        require_once "../class/user.php";
        require_once "../class/food.php";
        
        $msj = "";
        if(isset($_GET['search'])){
            if($_GET['search'] != ""){
                $aux2 = new Food();
                $msj = $_GET['search'];
                $foods = $aux2->getFoodByName($msj);
            }
        } 
        ?>
        <?php if($foods):?>
            <div class="food">
                <h3>Búsqueda nuestra base de datos de alimentos por nombre: </h3>
                <input type="text" value="<?php echo $msj?>" readonly>
            </div>
            <div class="resultado">
                <h3>Resultados coincidentes</h3>
                <?php foreach($foods as $food): ?>
                <div class="food">
                    <h4><?php echo $food['nombre']?></h4>
<<<<<<< HEAD
                    <p>Gramos: <?php echo $food['calorias']?></p>
                    <p>Kcal: <?php echo $food['hidratos']?></p>
                    <p>Kcal: <?php echo $food['proteinas']?></p>
                    <p>Kcal: <?php echo $food['grasas']?></p>
                    <form action="../include/addFood.php" method="POST">
                        <input type="hidden" name="idUser" value="<?php echo $_SESSION["userId"] ?>">
                        <input type="hidden" name="idFood" value="<?php echo $food['idalimentos'] ?>">
                        <input type="hidden" name="tipo" value="<?php echo $_GET['food'] ?>">
                        <button type="submit" name="enviar">Añadir</button>
                    </form>
=======
                    <p>Calorias: <?php echo $food['calorias']?></p>
                    <p>Hidratos: <?php echo $food['hidratos']?></p>
                    <p>Proteinas: <?php echo $food['proteinas']?></p>
                    <p>Grasas: <?php echo $food['grasas']?></p>
                    <input type="Submit" name="elegir" value="Elegir" id="valor">
                    <input type="hidden" name="hd" value="valor">
>>>>>>> 63d1349c61ef61e2c96f556b78a74f56cb4229b9
                </div>
                <?php endforeach ?>
            </div>
        <?php else: ?>
            <div class="msg">
                <p class="bold white">No se encuentra dicho alimento en nuestra base de datos</p>
            </div>
        <?php endif ?>
    </div>
<?php require_once '../templates/footer.php'?>
</html>