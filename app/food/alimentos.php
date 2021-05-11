<?php require_once '../templates/header.php' ?>
<?php
    require_once '../class/dbc.php';
    require_once '../class/food.php';

    if(isset($_GET['date'])){
        $_SESSION['date'] = $_GET['date'];
    }else{
        $auxdate = getdate();
        $year = $auxdate['year'];
        $month = $auxdate['mon'];
        $day = $auxdate['mday'];
        $date = "$year-$month-$day";
        $_SESSION['date'] = $date;
    }

    $aux = new Food();
    $breakfast = $aux->getBreakfast($_SESSION['userId'], $_SESSION['date']);
    $launch = $aux->getLaunch($_SESSION['userId'], $_SESSION['date']);
    $dinner = $aux->getDinner($_SESSION['userId'], $_SESSION['date']);
    $alimentos = [];
?>
    <div class="content">
        <div class="registro-diario">
            <h4>Tu registro de alimentos para: <h4>
            <form id="envia" method="post">
                <input type="date" name="fecha" id="fecha">
            </form>
        </div>
            <div class="add">
                <div class="desayuno">
                    <div class = "tit">
                        <h3>Desayuno</h3>
                        <div>
                            <p>Calorias</p>
                            <p>Hidratos</p>
                            <p>Proteinas</p>
                            <p>Grasas</p>
                        </div>
                    </div>
                    <?php if ($breakfast) : ?>
                        <!-- <div class="alimentos"> -->
                            <?php
                            foreach ($breakfast as $a) {
                                echo '<div class="alimentos">';
                                $food = $aux->getFoodById($a['idAlimento']);
                                echo '<p class="nombre">' . $food['nombre'] . '</p>';
                                echo '<div class="datos">
                                        <p>'.$food['calorias'].'</p>
                                        <p>'.$food['hidratos'].'</p>
                                        <p>'.$food['proteinas'].'</p>
                                        <p>'.$food['grasas'].'</p>
                                     </div>
                                     <div class="bottom"></div></div>';
                                array_push($alimentos, $food);
                            }
                            ?>
                        <!-- </div> -->
                    <?php endif ?>
                    <a href="add.php?food=desayuno">
                        <p>Añadir alimento</p>
                    </a>
                </div>
                <div class="comida">
                    <h3>Comida</h3>
                    <?php if ($launch) : ?>
                        <!-- <div class="alimentos"> -->
                            <?php
                            foreach ($launch as $a) {
                                echo '<div class="alimentos">';
                                $food = $aux->getFoodById($a['idAlimento']);
                                echo '<p class="nombre">' . $food['nombre'] . '</p>';
                                echo '<div class="datos">
                                        <p>'.$food['calorias'].'</p>
                                        <p>'.$food['hidratos'].'</p>
                                        <p>'.$food['proteinas'].'</p>
                                        <p>'.$food['grasas'].'</p>
                                     </div>
                                     <div class="bottom"></div></div>';
                                array_push($alimentos, $food);
                            }
                            ?>
                        <!-- </div> -->
                    <?php endif ?>
                    <a href="add.php?food=comida">
                        <p>Añadir alimento</p>
                    </a>
                </div>
                <div class="cena">
                    <h3>Cena</h3>
                    <?php if ($dinner) : ?>
                        <!-- <div class="alimentos"> -->
                            <?php
                            foreach ($dinner as $a) {
                                echo '<div class="alimentos">';
                                $food = $aux->getFoodById($a['idAlimento']);
                                echo '<p class="nombre">' . $food['nombre'] . '</p>';
                                echo '<div class="datos">
                                        <p>'.$food['calorias'].'</p>
                                        <p>'.$food['hidratos'].'</p>
                                        <p>'.$food['proteinas'].'</p>
                                        <p>'.$food['grasas'].'</p>
                                     </div>
                                     <div class="bottom"></div></div>';
                                array_push($alimentos, $food);
                            }
                            ?>
                        <!-- </div> -->
                    <?php endif ?>
                    <a href="add.php?food=cena">
                        <p>Añadir alimento</p>
                    </a>
                </div>
            </div>
    </div>
<script src="../js/calendario.js"></script>
<?php require_once '../templates/footer.php' ?>
</html>