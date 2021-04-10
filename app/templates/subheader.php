<?php
            if(isset($_SESSION['userUid'])){
                echo '<div class="subheader"><ul>
                      <li><a href="../index.php">Mi pagina de inicio</a></li>  
                      <li><a href="../food/alimentos.php">Alimento</a></li>  
                      <li><a href="../exercise/ejercicio.php">Ejercicio</a></li>  
                      <li><a href="">Informes</a></li>  
                      </ul></div>';
            }
?>