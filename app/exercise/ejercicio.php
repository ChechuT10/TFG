<?php require_once '../templates/header.php' ?>
<?php
    require_once '../class/dbc.php';
    require_once '../class/exercise.php';

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
    $aux = new Exercise();
    $exercise = $aux->getExercises($_SESSION['userId'], $_SESSION['date']);
    // Lo podemos usar para añadir la suma de los alimentos
    $ejercicios = [];
?>
<div class="add-image-ejer queryhide">
    <div class="content">
        <div class="registro-diario">
            <h4>Tu registro de ejercicios para: <h4>
            <form id="envia" method="post">
                <input type="date" name="fecha" id="fecha">
            </form>
        </div>
        <div class="flex-ejercicio">
            <div class="ejercicio">
                <div class="cardio">
                    <h3>Ejercicio</h3>
                    <p>Añadir</p>
                </div>
            </div>
            <div class="wrapper">
                    <div class="search-input">
                        <input type="text" name="alimento" id="ejercicio" placeholder="Busca un alimento...">
                        <ul id="palabras"></ul>
                        <div class="icon"></div>
                    </div>
            </div>
        </div>
        <?php if ($exercise) : ?>
            <div class = "tit-ejercicios">
                <p>Ejercicio</p>
                <p>Calorias</p>
            </div>
                <?php
                    foreach ($exercise as $e) {
                        echo '<div class="ejercicios">';
                        $ex = $aux->getExerciseById($e['idEjercicio']);
                        echo '<p class="nombre">' . $ex['nombre'] . '</p>';
                        echo '<div class="datos">
                                <p>'.$ex['calorias'].'</p>
                                <div class="idejercicio">'.$e['idActividad'].'</div>
                                <img src="../images/trashicon.png">
                                </div>
                                <div class="bottom"></div></div>';
                        array_push($ejercicios, $ex);
                    }
                ?>
            <?php endif ?>
    </div>
</div>
<?php require_once '../templates/footer.php' ?>
</div>
<script src="../js/calendario.js"></script>
<script>
$(document).ready(function () {
    const add = $('.cardio p')
    const search = $('.wrapper')

    add.on("click",function(){
        search.toggle(800)
    })
})
</script>
<script src="../js/addExercise.js"></script>
<script src="../js/removeExercise.js"></script>
</html>