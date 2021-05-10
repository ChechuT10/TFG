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
        <form id="envia" method="post">
            <input type="date" name="fecha" id="fecha">
        </form>
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
<script src="../js/calendario.js"></script>
<?php require_once '../templates/footer.php' ?>
</html>