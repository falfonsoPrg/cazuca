<!DOCTYPE html>
<html>
<head>
	<title></title>
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
  window.location = "finanzas.php";
}
</script>
</head>

<body>
<!--           -->
<!-- NAVEGADOR -->
<!--           -->
<nav class="navbar navbar-expand-lg sticky-top navbar-light" style="background:rgba(255,255,255,0.9);">
<a class="navbar-brand" href="index.php">
   <img src="./img/logo.png" class="d-inline-block align-top" width="40px" height="40px"  alt="inicio">Cazuca
</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item pr-5">
        <a class="btn btn-outline-danger" href="index.php">Inicio</a>
      </li>
      <li class="nav-item pr-5">
        <a class="btn btn-outline-danger" href="informacion.php">Informaci&oacute;n</a>
      </li>
      <li class="nav-item pr-5">
        <a class="btn btn-outline-danger" href="formatos.php">Formatos</a>
      </li>
      <li class="nav-item pr-5">
        <a class="btn btn-outline-danger" href="finanzas.php">Finanzas</a>
      </li>
    </ul>
  </div>
</nav>
<!--           -->
<!-- NAVEGADOR -->
<!--           -->

<div class="container">
<div class="row pt-3">
    <div class="col-md">

<center><a class="btn btn-outline-primary mb-3" href="finanzas.php">Volver</a></center>

<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0"><center>
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Ventas
        </button></center>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">

<table class="table table-bordered table-responsive">
  <thead>
       <tr>
        <th>Nombre del producto</th>
        <th>Cantidad</th>
        <th>Descripci&oacute;n</th>
        <th>Fecha de la venta</th>
        <th>Valor total de la venta</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include('conexion.php');
        $resultado =  mysqli_query($conn, 'SELECT nom_producto,cant_movimiento,desc_movimiento,fecha_movimiento,val_movimiento FROM movimiento,producto WHERE cod_operacion = 1 AND movimiento.cod_producto = producto.cod_producto ORDER BY cod_movimiento DESC');
        while($row3 = mysqli_fetch_array($resultado)){ ?>
        <tr>
         <td> <?php  echo $row3['nom_producto']; ?></td>
         <td> <?php  echo $row3['cant_movimiento']; ?></td>
         <td> <?php  echo $row3['desc_movimiento']; ?></td>
         <td> <?php  echo $row3['fecha_movimiento']; ?></td>
         <td> <?php  echo $row3['val_movimiento']; ?></td>
       </tr>
      <?php } ?>

    </tbody>
</table>

      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0"><center>
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Compras
        </button></center>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">

<table class="table table-bordered table-responsive">
  <thead>
       <tr>
       <tr>
        <th>Nombre del producto</th>
        <th>Cantidad</th>
        <th>Descripci&oacute;n</th>
        <th>Fecha de la venta</th>
        <th>Valor total de la venta</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include('conexion.php');
        $resultado =  mysqli_query($conn, 'SELECT nom_producto,cant_movimiento,desc_movimiento,fecha_movimiento,val_movimiento FROM movimiento,producto WHERE cod_operacion = 2 AND movimiento.cod_producto = producto.cod_producto ORDER BY cod_movimiento DESC');
        while($row3 = mysqli_fetch_array($resultado)){ ?>
        <tr>
         <td> <?php  echo $row3['nom_producto']; ?></td>
         <td> <?php  echo $row3['cant_movimiento']; ?></td>
         <td> <?php  echo $row3['desc_movimiento']; ?></td>
         <td> <?php  echo $row3['fecha_movimiento']; ?></td>
         <td> <?php  echo $row3['val_movimiento']; ?></td>
       </tr>
      <?php } ?>

    </tbody>
</table>

      </div>
    </div>
  </div>
</div>




</div>
</div>
</div>

<footer class="footer pt-3">
  <div class="container">
    <p>Copyright 2017 &copy; by UEB-IEEE-Computer</p>
  </div>
</footer>
</body>
</html>