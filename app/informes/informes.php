<?php require_once '../templates/header.php' ?>
<?php
    require_once '../class/dbc.php';
    require_once '../class/user.php';
    require_once '../class/food.php';
    require_once '../class/exercise.php';
    require_once '../include/foodExercise.php';

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

    $aux = new User();
    $user = $aux->getAuxForm($_SESSION['userId']);
?>

<div class="content">
<div class="registro-diario">
            <h4>Tus informes para: <h4>
            <form id="envia" method="post">
                <input type="date" name="fecha" id="fecha">
            </form>
        </div>
    <div class="flex">
        <div class="canva">
            <canvas id="myCanvas"  width="100"></canvas>
            <legend class="lege" for="myCanvas"></legend>
        </div>
        <div class="datos-informe">
            <table>
                <tr>
                    <th>Kcal Diarias</th>
                </tr>
                <tr>
                    <td>2000</td>
                </tr>
            </table>
            <div class="table2">
                <table>
                    <tr>
                        <th>Kcal Consumidas</th>
                    </tr>
                    <tr>
                        <td><?php echo $sumaAlimentos?></td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <th>Kcal Quemadas</th>
                    </tr>
                    <tr>
                        <td><?php echo $sumaEjercicios?></td>
                    </tr>
                </table>
            </div>
            <table>
                <tr>
                    <th>Kcal Restantes</th>
                </tr>
                <tr>
                    <td><?php echo $auxneto?></td>
                </tr>
            </table>
            <div class="progressDiv">
                <div class="progress-pie-chart" data-percent="<?php echo $auxneto?>"><!--Pie Chart -->
                    <div class="ppc-progress">
                        <div class="ppc-progress-fill"></div>
                    </div>
                    <div class="ppc-percents">
                    <div class="pcc-percents-wrapper">
                        <span>%</span>
                    </div>
                    </div>
                </div><!--End Chart -->
        </div>
        </div>
    </div>
    <?php if($user['genero'] == 'H'):?>
    <?php else: ?>
    <?php endif ?>
    </div>

<?php require_once '../templates/footer.php' ?>

<script type="text/javascript" src="../js/informes.js"></script>
<script src="../js/calendario.js"></script>
<script>
$(function(){
    var $ppc = $('.progress-pie-chart'),
        percent = parseInt($ppc.data('percent')),
        deg = 360*percent/100;
    if (percent > 50) {
        $ppc.addClass('gt-50');
    }else{
        $ppc.addClass('gt-0');
    }
    if(deg == 0){
        $('.ppc-progress-fill').css({ transition: "transform 1s",transform:  "rotate(" + 1 + "deg)" });
    }else{
        $('.ppc-progress-fill').css({ transition: "transform 1s",transform:  "rotate(" + deg + "deg)" });
    }
    $('.ppc-percents span').html(percent+'%');
});
   </script>
</html>