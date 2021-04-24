<?php require_once '../templates/header.php'?>
    <?php require_once '../templates/subheader.php'?>

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
                <?php foreach($foods as $food){ ?>
                <div class="food">
                    <h4><?php echo $food['nombre']?></h4>
                    <p>Gramos: <?php echo $food['calorias']?></p>
                    <p>Kcal: <?php echo $food['proteinas']?></p>
                </div>
                <?php } ?>
            </div>
        <?php else: ?>
            <div class="msg">
                <p class="bold white">No se encuentra dicho alimento en nuestra base de datos</p>
            </div>
        <?php endif ?>
    </div>
<?php require_once '../templates/footer.php'?>
</html>