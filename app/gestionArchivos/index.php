<!doctype html>
<html>
 <head>
  <title>
    MemeLord
  </title>
  <link rel="stylesheet" href="../templates/style.css">
 </head>
 <body>
 <div class="container lightmode">
   <div class="tit">
    <h2>Cargar Ficheros</h2>
   </div>

  <div class="formulario">
    <form method="POST" action="CargarArchivos.php" enctype="multipart/form-data">
     <input class="content center" type="file" name="file"/><br>
     <button type="submit">Cargar Fichero</button>
    </form>
   </div>
  
  
   <div class="tit mgtop">
     <h3>Descargas Disponibles</h3>
   </div>
   <div>
     <table>
        <thead>
          <tr>
             <th width="7%"></th>
             <th width="70%">Nombre del Archivo</th>
             <th width="13%" >Descargar</th>
             <th width="10%">Eliminar</th>
          </tr>
        </thead>
        <tbody>
           <?php
            $archivos=scandir("subidasdaw");
            $num=0;
            for($i=2;$i<count($archivos);$i++)
            {$num++;
            ?>
            <p></p>
            <tr>
              <th scope="row"><?php echo $num;?></th>
              <td><?php echo $archivos[$i]; ?></td>
              <td>
                 <a title="Descargar Archivo"
                    href="subidasdaw/<?php echo $archivos[$i]; ?>"
                    download="<?php echo $archivos[$i]; ?>"
                    style="color:blue; font-size:18px"
                 >Descargar
                 </a>
              </td>
              <td>
                 <a 
                   title="Eliminar Archivo"
                   href="Eliminar.php?name=subidasdaw/<?php echo $archivos[$i]; ?>"
                   style="color:red; font-size:18px"
                   onclick="return confirm('Esta seguro de eliminar el archivo?');"
                  >Eliminar
                  </a>
              </td>
            </tr>
          <?php }?>
        </tbody>
     </table>
   </div>
      <div class="redirect mgtop">
        <a href="../index.php">Volver a la página anterior</a>
      </div>
      <div class="night">
            <img src="">
      </div>
    </div>
 </body>
 <script src="../templates/js.js"></script>
</html>
