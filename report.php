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
  
  <style type="text/css">
    .progress-bar input[type=number], .ui-slider-handle {
      display: none;
    }  
    .progress-bar .ui-slider-track {
      margin: 0px;
    }
  </style>
<?php
  date_default_timezone_set('America/Lima');

  $link = mysql_connect('mysql.hostinger.es', 'u619798287_kusi', '@K1u2s3i4') or die('No se pudo conectar: ' . mysql_error());

  mysql_select_db('u619798287_kusi') or die('No se pudo seleccionar la base de datos');
  
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
        $values = mysql_query("SELECT count(*) cant, sum(ptos) tot FROM cemduc_retos WHERE status='1';");
        $row = mysql_fetch_array($values);
      ?>

  <div data-role="main" class="ui-content">
    
    <h1>RETOS COMPLETADOS: <?php echo $row["cant"]; ?></h1>
    <h1>PUNTAJE ACUMULADO: <?php echo $row["tot"]; ?></h1>
    <div class="progress-bar">
      <input type="range" id="progress-bar" readonly="readonly" value="<?php echo ROUND($row["cant"]/40*100,2); ?>" min="0" max="100"
      data-highlight="true" data-mini="true" />
    </div>
    <h1><?php echo ROUND($row["cant"]/40*100,2); ?> %</h1>
    
    
  </div>
  <!--<div data-role="footer">
    <h1>Insert Footer Text Here</h1>
  </div>-->
</div>

</body>
</html>