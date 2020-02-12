<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <!-- Include meta tag to ensure proper rendering and touch zooming -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Include jQuery Mobile stylesheets -->
  <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <!-- Include the jQuery library -->
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <!-- Include the jQuery Mobile library -->
  <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
  
  
<?php
  date_default_timezone_set('America/Lima');

  $link = mysql_connect('mysql.hostinger.es', 'u619798287_kusi', '@K1u2s3i4') or die('No se pudo conectar: ' . mysql_error());

  mysql_select_db('u619798287_kusi') or die('No se pudo seleccionar la base de datos');
  
if (isset($_POST["status"])) {
  mysql_query("UPDATE cemduc_retos SET rsp='$_POST[rsp]', status='$_POST[status]', ejec='$_POST[ejec]', obs='$_POST[obs]'  WHERE id=$_POST[id];");
}
?>
</head>
<body>
<div data-role="page" id="edit">
  <div data-role="header">
    <a href="http://hospedajesaunakusi.com/cemduc/retos/list.php" data-ajax="false" class="ui-btn ui-btn-left ui-corner-all ui-shadow ui-icon-home ui-btn-icon-left">Inicio</a>
    <h1>Retos Cemduc</h1>
    <a href="http://hospedajesaunakusi.com/cemduc/retos/report.php" data-ajax="false" class="ui-btn ui-btn-rigth ui-corner-all ui-shadow ui-icon-bars ui-btn-icon-left">Reporte</a>
  </div>
  <?php
        $id = $_GET["id"];
        $values = mysql_query("SELECT * FROM cemduc_retos WHERE id=$id;");
        $row = mysql_fetch_array($values);
      ?>

  <div data-role="main" class="ui-content">
    <?php 
      $values_i = mysql_query("SELECT id FROM  `cemduc_retos` WHERE  `status` =  $row[status] AND id < $id  ORDER BY id DESC LIMIT 1");
      $row_i = mysql_fetch_array($values_i);
      if (mysql_num_rows($values_i)>0) { $id_a=$row_i["id"]; ?>
      <a href="http://hospedajesaunakusi.com/cemduc/retos/edit.php?id=<?php echo $id_a; ?>" data-ajax="false" data-role="button" data-inline="true">Anterior</a>
    <?php } 
          $values_j = mysql_query("SELECT id FROM  `cemduc_retos` WHERE  `status` =  $row[status] AND id > $id LIMIT 1");
          $row_j = mysql_fetch_array($values_j);
          if (mysql_num_rows($values_j)>0) { $id_s=$row_j["id"]; ?>
      <a href="http://hospedajesaunakusi.com/cemduc/retos/edit.php?id=<?php echo $id_s; ?>" data-ajax="false" data-role="button" data-inline="true">Siguiente</a>
    <?php } ?>
    <form method="POST" action="#">
     <label for="text"><?php echo "RETO " . $row["id"] . ": " . $row["dsc"]; ?></label>
     <?php if($row["url"]!="") {?> 
      <center><a href="<?php echo $row["url"] ?>" target="_blank"><img src="play.png" /></a></center>
     <?php } ?>
    <label for="text-basic">Responsable:</label>
    <input type="text" name="rsp" id="rsp" value="<?php echo $row["rsp"]; ?>">
    <label for="text-basic">Participantes:</label>
    <textarea cols="40" rows="8" name="ejec" id="ejec"><?php echo $row["ejec"]; ?></textarea>
    <label for="slider2">Estado:</label>
    <select name="status" id="status" data-role="slider">
        <option value="0" <?php echo ($row["status"]=='0')?"selected":""; ?> >Falta</option>
        <option value="1" <?php echo ($row["status"]=='1')?"selected":""; ?> >Hecho</option>
    </select>
    <label for="text-basic">Observación:</label>
    <textarea cols="40" rows="8" name="obs" id="obs"><?php echo $row["obs"]; ?></textarea>
     <input type="hidden" name="id" value="<?php echo  $row["id"]; ?>" />
    <input type="submit" value="Actualizar" data-icon="edit" data-theme="a">
    </form>
  </div>
  <!--<div data-role="footer">
    <h1>Insert Footer Text Here</h1>
  </div>-->
</div>

</body>
</html>