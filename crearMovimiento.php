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

<div class="container"><!-- CONTAINER -->
  <div class="row"> <!-- ROW -->
    <div class="col-md"> </div>
    <div class="col-md"> 
<h3 class="text-center pb-3"> Registrar nueva movimiento</h3>
<?php
if(isset($_POST['cod_operacion'])){
date_default_timezone_set('UTC');

$Fecha = $_POST['fecha_venta'];

$fecha = DateTime::createFromFormat('m/d/Y', $Fecha);
$Fecha  = $fecha->format('Y-m-d');
$bool = true;
$date = date('Y-m-d');

if($date < $Fecha){
$bool = false;
}
$Fecha = "'".$Fecha."'";

if($bool){
include('conexion.php');

$cod_operacion = $_POST["cod_operacion"];
$cod_producto = $_POST["cod_producto"];
$cant_movimiento = $_POST["cant_movimiento"];
if($_POST["desc_movimiento"]==""){
$desc_movimiento = "DEFAULT";
}else{
$desc_movimiento = "'".$_POST["desc_movimiento"]."'";
}

$val_producto = mysqli_query($conn, 'SELECT val_producto FROM producto WHERE cod_producto ='.$cod_producto);
$row_val_producto = mysqli_fetch_array($val_producto);
$val_movimiento = $row_val_producto[0] * $cant_movimiento;
}

if (@mysqli_query($conn,"INSERT INTO movimiento VALUES('',$cod_operacion,$cod_producto,$cant_movimiento,$desc_movimiento,$Fecha,$val_movimiento)")) { ?>
<div class="alert alert-success" role="alert">
  Registro agregado con exito, espere unos segundos...
</div>
<script type="text/javascript">
  setTimeout("reSend()", 3500);
</script>
<?php } else { ?>
<div class="alert alert-danger" role="alert">
  No puede ingresar una fecha mayor a la actual intentelo nuevamente.
</div>
<?php }

}
?>


<form action="crearMovimiento.php" method="POST">

  <div class="form-group">
    <label for="cod_operacion">Tipo de operaci&oacute;n</label>
    <select class="form-control" id="cod_operacion" name="cod_operacion">
      <?php
      include_once("conexion.php");
      $resultado =  mysqli_query($conn, 'SELECT * FROM operacion');
      while($row = mysqli_fetch_array($resultado)){
        echo "<option value=$row[0]>$row[1]</option>";
      }
      ?>
    </select>
  </div>

  <div class="form-group">
    <label for="cod_producto">Seleccione un producto</label>
    <select class="form-control" id="cod_producto" name="cod_producto">
      <?php
      include_once("conexion.php");
      $resultado =  mysqli_query($conn, 'SELECT * FROM producto');
      while($row = mysqli_fetch_array($resultado)){
        echo "<option value=$row[0]>$row[1] -> $row[2] C/U</option>";
      }
      ?>
    </select>
  </div>

  <div class="form-group">
     <label for="cant_movimiento">Cantidad</label>
     <input name="cant_movimiento" type="number" class="form-control" id="cant_movimiento" min="1" max="10000"  step="any" required>
  </div>

  <div class="form-group">
     <label for="desc_movimiento">Descripci&oacute;n del movimiento</label>
     <textarea name="desc_movimiento" class="form-control" id="desc_movimiento" rows="3" placeholder="(Opcional)"></textarea>
  </div>

  <div class="form-row">
    <div class="col">
      <label for="datepicker">Fecha del movimiento</label>
      <input name="fecha_venta" id="datepicker" width="276" autocomplete="off" required />
      <script>
          $('#datepicker').datepicker({
              uiLibrary: 'bootstrap4'
          });
      </script>
    </div>
  </div>

  <button type="submit" class="btn btn-primary mt-3">Agregar movimiento</button>

</form>
<a class="btn btn-outline-primary mt-3" href="finanzas.php">Volver</a>


    </div>
        <div class="col-md"> </div>
  </div><!-- ROW -->
</div><!-- CONTAINER -->


<footer class="footer pt-3">
  <div class="container">
    <p>Copyright 2017 &copy; by UEB-IEEE-Computer</p>
  </div>
</footer>
</body>
</html>