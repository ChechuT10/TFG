<?php require_once '../templates/header.php' ?>
<div class="content">
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
    <?php if ($foods) : ?>
        <div class="food">
            <h3>Búsqueda nuestra base de datos de alimentos por nombre: </h3>
            <input type="text" value="<?php echo $msj ?>" readonly>
        </div>
        <div class="resultado">
            <h3>Resultados coincidentes</h3>
            <?php foreach ($foods as $food) : ?>
                <div class="food">
                    <h4><?php echo $food['nombre'] ?></h4>
                    <div class="resultados">
                        <p>Calorias: <?php echo $food['calorias'] ?></p>
                        <hr class="linea">
                        <p>Hidratos: <?php echo $food['hidratos'] ?></p>
                        <hr class="linea">
                        <p>Proteinas: <?php echo $food['proteinas'] ?></p>
                        <hr class="linea">
                        <p>Grasas: <?php echo $food['grasas'] ?></p>
                    </div>
                    <form action="../include/addFood.php" method="POST">
                        <input type="hidden" name="idUser" value="<?php echo $_SESSION["userId"] ?>">
                        <input type="hidden" name="idFood" value="<?php echo $food['idalimentos'] ?>">
                        <input type="hidden" name="tipo" value="<?php echo $_GET['food'] ?>">
                        <br>
                        <button type="submit" name="enviar" class="botonEnviar">Añadir</button>
                    </form>
                </div>
            <?php endforeach ?>
        </div>
    <?php else : ?>
        <div class="msg">
            <p class="bold white">No se encuentra dicho alimento en nuestra base de datos</p>
        </div>
    <?php endif ?>
</div>
</div>
<?php require_once '../templates/footer.php' ?>
</div>

</html>