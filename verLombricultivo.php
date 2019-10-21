<!DOCTYPE html>
<html>
<head>
	<title>Ver formatos de lombricultivo</title>
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
<script type="text/javascript">
function reSend(){
  window.location = "lombricultivo.php";
}
</script>
</head>

<body>
<!--           -->
<!-- NAVEGADOR -->
<!--           -->
<?php include("header.php");?>
<!--           -->
<!-- NAVEGADOR -->
<!--           -->

<div class="container">
<div class="row pt-3">
    <div class="col-md">


<center><a class="btn btn-outline-primary mb-3" href="lombricultivo.php">Volver</a></center>

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
        while($row3 = mysqli_fetch_array($resultado)){ ?>
        <tr>
         <td> <?php  echo $row3['fecha_lombricultivo']; ?></td>
         <td> <?php  echo $row3['hora_lombricultivo']; ?></td>
         <td> <?php  echo $row3['ph']; ?></td>
         <td> <?php  echo $row3['humedad']; ?></td>
         <td> <?php  echo $row3['temperatura']; ?></td>
         <td> <?php  echo $row3['oxigeno']; ?></td>
         <td> <?php  echo $row3['riego']; ?></td>
       </tr>
      <?php }
      ?>
    </tbody>
</table>

</div>
</div>
</div>

<!--          -->
<!--  FOOTER  -->
<!--          -->
<?php include("footer.php");?>
<!--          -->
<!--  FOOTER  -->
<!--          -->
</body>
</html>