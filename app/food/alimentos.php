<?php require_once '../templates/header.php' ?>
<?php
require_once '../class/dbc.php';
require_once '../class/food.php';
$aux = new Food();
$breakfast = $aux->getBreakfast($_SESSION['userId']);
$launch = $aux->getLaunch($_SESSION['userId']);
$dinner = $aux->getDinner($_SESSION['userId']);
$alimentos = [];
?>
    <div class="content">
        <div class="add">
            <div class="desayuno">
                <h3>Desayuno</h3>
                <?php if ($breakfast) : ?>
                    <div class="alimentos">
                        <?php
                        foreach ($breakfast as $a) {
                            $food = $aux->getFoodById($a['idAlimento']);
                            echo '<p>' . $food['nombre'] . '</p>';
                            array_push($alimentos, $food);
                        }
                        ?>
                        <!-- <input type="hidden" name="calorias" value="'.$food['calorias'].'">
                    <input type="hidden" name="hidratos" value="'.$food['hidratos'].'">
                    <input type="hidden" name="proteinas" value="'.$food['proteinas'].'">
                    <input type="hidden" name="grasas" value="'.$food['grasas'].'">'; -->
                    </div>
                <?php endif ?>
                <a href="add.php?food=desayuno">
                    <p>Añadir alimento +</p>
                </a>
            </div>
            <div class="comida">
                <h3>Comida</h3>
                <?php if ($launch) : ?>
                    <div class="alimentos">
                        <?php
                        foreach ($launch as $a) {
                            $food = $aux->getFoodById($a['idAlimento']);
                            echo '<p>' . $food['nombre'] . '</p>';
                            array_push($alimentos, $food);
                        }
                        ?>
                    </div>
                <?php endif ?>
                <a href="add.php?food=comida">
                    <p>Añadir alimento +</p>
                </a>
            </div>
            <div class="cena">
                <h3>Cena</h3>
                <?php if ($dinner) : ?>
                    <div class="alimentos">
                        <?php
                        foreach ($dinner as $a) {
                            $food = $aux->getFoodById($a['idAlimento']);
                            echo '<p>' . $food['nombre'] . '</p>';
                            array_push($alimentos, $food);
                        }
                        ?>
                    </div>
                <?php endif ?>
                <a href="add.php?food=cena">
                    <p>Añadir alimento +</p>
                </a>
            </div>
        </div>
    </div>
</div>
<?php require_once '../templates/footer.php' ?>
</html>