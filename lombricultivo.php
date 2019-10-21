<!DOCTYPE html>
<html>
<head>
	<title>Lombricultivo</title>
<?php
include("configHead.php");
?>
<style type="text/css">
.footer {
    bottom: 0;
    width: 100%;
    height: 30px;
    line-height: 30px;
}
</style>
</head>
<body>
<!--           -->
<!-- NAVEGADOR -->
<!--           -->
<?php include("header.php");?>
<!--           -->
<!-- NAVEGADOR -->
<!--           -->


<!-- CONTENEDOR -->
<div class="container">
<!--            -->


<!--           -->
<!-- NAVEGADOR -->
<!--           -->
<div class="row pt-3">

<div class="card w-100">
  <div class="card-body">
    <h5 class="card-title">Formatos lombricultivo</h5>
<div class="btn-group d-block">
<a href="crearLombricultivo.php" class="btn btn-outline-primary">Subir nuevo formato de lombricultivo</a>
<a href="verLombricultivo.php" class="btn btn-outline-primary">Ver todos los formatos de lombricultivo</a>
</div>

<p class="font-weight-bold pt-3">Agregados recientemente</p>
<table class="table table-bordered table-responsive">
  <thead>
       <tr>
        <th>Fecha</th>
        <th>Hora</th>
        <th>PH</th>
        <th>Humedad</th>
        <th>Temperatura</th>
        <th>Control de oxígeno</th>
        <th>Riego</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include('conexion.php');
        $resultado =  mysqli_query($conn, 'SELECT * FROM lombricultivo ORDER BY cod_lombricultivo DESC');
        $cont = 0;
        while($row3 = mysqli_fetch_array($resultado) and $cont <3){ ?>
        <tr>
         <td> <?php  echo $row3['fecha_lombricultivo']; ?></td>
         <td> <?php  echo $row3['hora_lombricultivo']; ?></td>
         <td> <?php  echo $row3['ph']; ?></td>
         <td> <?php  echo $row3['humedad']; ?></td>
         <td> <?php  echo $row3['temperatura']; ?></td>
         <td> <?php  echo $row3['oxigeno']; ?></td>
         <td> <?php  echo $row3['riego']; ?></td>
       </tr>
      <?php $cont = $cont + 1; }
      ?>
    </tbody>
</table>
  </div>
</div>

</div>



<!-- CONTENEDOR -->
</div>
<!--            -->

<!--          -->
<!--  FOOTER  -->
<!--          -->
<?php include("footer.php");?>
<!--          -->
<!--  FOOTER  -->
<!--          -->

</body>
</html>