<?php require_once '../templates/header.php'?>
    <div class="add-image-ali">
        <div class="content">
        <div class = "add">
        <h3>Añade un alimento a <?php echo $_GET['food']?>  
            <div class="wrapper">
                    <div class="search-input">
                        <input type="text" name="alimento" id="alimento" placeholder="Busca un alimento...">
                        <ul id="palabras"></ul>
                        <div class="icon"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once '../templates/footer.php'?>
<script src="../js/add.js"></script>
</html>