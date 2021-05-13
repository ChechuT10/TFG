<?php require_once '../templates/header.php' ?>
<?php
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
    <canvas id="myCanvas"></canvas>
    <legend class="lege" for="myCanvas"></legend>

</div>

<?php require_once '../templates/footer.php' ?>
<script src="../js/calendario.js"></script>
<script type="text/javascript" src="../js/informes.js"></script>

</html>