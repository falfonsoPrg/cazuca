<!DOCTYPE html>
<html>
<head>
  <title>Agregar movimiento</title>
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
<?php include("header.php");?>
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
$val_producto = $_POST["val_producto"];
$val_movimiento = $val_producto * $cant_movimiento;
}

if (@mysqli_query($conn,"INSERT INTO movimiento VALUES('',$cod_operacion,$cod_producto,$cant_movimiento,$val_movimiento,$desc_movimiento,$Fecha,$val_movimiento)")) { ?>
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
        echo "<option value=$row[0]>$row[1]</option>";
      }
      ?>
    </select>
  </div>

  <div class="form-group">
     <label for="cant_movimiento">Cantidad</label>
     <input name="cant_movimiento" type="number" class="form-control" id="cant_movimiento" min="1" max="10000"  step="any" required>
  </div>

  <div class="form-group">
    <label for="val_producto">Valor por unidad</label>
    <input type="numer" class="form-control" id="val_producto" name="val_producto">
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


<!--          -->
<!--  FOOTER  -->
<!--          -->
<?php include("footer.php");?>
<!--          -->
<!--  FOOTER  -->
<!--          -->
</body>
</html>