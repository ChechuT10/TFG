<?php require_once '../templates/header.php'?>
    <?php require_once '../templates/subheader.php'?>
       
    <div class="content">
            <div class="registro">
                <p>Tu registro de ejercicios para</p>
                <div class="fecha">
                    <div class="left-arrow"></div>
                    <div class="registro-dia"></div>
                    <div class="right-arrow"></div>
                </div>
                <div class="calendar-icon"></div>
                <div class="calendar">
                    <div class="month">
                        <i class="fas fa-angle-left prev"></i>
                        <div class="date">
                            <h1></h1>
                            <p></p>
                        </div>
                        <i class="fas fa-angle-right next"></i>
                    </div>
                    <div class="weekdays">
                        <div>Lun</div>
                        <div>Mar</div>
                        <div>Mie</div>
                        <div>Jue</div>
                        <div>Vie</div>
                        <div>Sab</div>
                        <div>Dom</div>
                    </div>
                    <div class="days"></div>
                </div>
            </div>
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
<script src="../js/calendario.js"></script>
</html>