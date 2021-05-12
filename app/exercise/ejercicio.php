<?php require_once '../templates/header.php' ?>
<div class="add-image-ejer queryhide">
    <div class="content">
        <div class="registro-diario">
            <h4>Tu registro de ejercicios para: <h4>
            <form id="envia" method="post">
                <input type="date" name="fecha" id="fecha">
            </form>
        </div>
            <div class="ejercicio">
                <div class="cardio">
                    <h3>Cardiovascular</h3>
                    <p>Añadir</p>
                </div>
            </div>
            <div class="ejercicio">
                <div class="otro">
                    <h3>Ejercicios de fuerza</h3>
                    <p>Añadir</p>
                </div>
            </div>
    </div>
</div>
</div>
<script src="../js/calendario.js"></script>
<?php require_once '../templates/footer.php' ?>
<!-- <script src="../datepiker/calendar.js"></script> -->

</html>