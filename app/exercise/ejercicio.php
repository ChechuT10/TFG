<?php require_once '../templates/header.php'?>       
    <div class="content">
    <input name="dateTimePicker" value="<?php echo date("Y-m-d");?>" />
            <div class="ejercicios">
                <div class="cardio">
                    <h3>Cardiovascular</h3>
                    <p>Añadir</p>
                </div>
                <div class="otro">
                    <h3>Ejercicios de fuerza</h3>
                    <p>Añadir</p>
                </div>
            </div>

            <div class="notas">
                <h3>Notas sobre el ejercicio de hoy</h3>
                <textarea placeholder="Añade una nota"></textarea >
            </div>
    </div>   
<?php require_once '../templates/footer.php'?>
<script src="../datepiker/calendar.js"></script>
</html>