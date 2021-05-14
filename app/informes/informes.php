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
?>

<div class="content">
    <form id="envia" method="post">
        <input type="date" name="fecha" id="fecha">
    </form>
    <div class="flex">
        <div class="canva">
            <canvas id="myCanvas"  width="100"></canvas>
            <legend class="lege" for="myCanvas"></legend>
        </div>
        <div class="datos">
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
                        <td>2000</td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <th>Kcal Quemadas</th>
                    </tr>
                    <tr>
                        <td>2000</td>
                    </tr>
                </table>
            </div>
            <table>
                <tr>
                    <th>Kcal Restantes</th>
                </tr>
                <tr>
                    <td>2000</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php require_once '../templates/footer.php' ?>

<script type="text/javascript" src="../js/informes.js"></script>
<script src="../js/calendario.js"></script>
</html>