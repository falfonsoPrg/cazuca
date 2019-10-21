<!DOCTYPE html>
<html>
<head>
	<title>Diligenciar formato CLA</title>
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
  window.location = "formatos.php";
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
    <div class="col-md"> 
<h3 class="text-center pb-3"> Registrar un nuevo formato para el cuarto CLA</h3>
<?php
if(isset($_POST['Verde'])){
date_default_timezone_set('UTC');
$Verde = $_POST['Verde'];
$Azul = $_POST['Azul'];
$Gris = $_POST['Gris'];
$Negra = $_POST['Negra'];
$Fecha = $_POST['Fecha'];


$fecha = DateTime::createFromFormat('m/d/Y', $Fecha);
$Fecha  = $fecha->format('Y-m-d');
$bool = true;
$date = date('Y-m-d', strtotime("-1 day"));
if($date < $Fecha){
$bool = false;
}
$Fecha = "'".$Fecha."'";

if($bool){
include('conexion.php');
}

if (@mysqli_query($conn,"INSERT INTO cuartocta VALUES ('',$Verde,$Azul,$Gris,$Negra,$Fecha,DEFAULT)")) { ?>
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
<form action="crearFormatoCTA.php" method="POST">
  <div class="form-row">
    <div class="col">
      <label class="text-success" data-toggle="tooltip" data-placement="top" title="Recuerda que en la caneca VERMICOMPOST van: Residuos orgánicos crudos, excepto los cítricos." for="ip1">Caneca verde</label>
      <input name="Verde" type="number" id="ip1" class="form-control" placeholder="Peso (Kg)" min="0" max="10000"  required step="any">
    </div>
    <div class="col">
      <label class="text-primary" data-toggle="tooltip" data-placement="top" title="Recuerda que en la caneca PLÁSTICOS van: Botellas plásticas, Empaques metalizados, Empaques plásticos, Icopor, Tetrapack, Vidrio, Tela mojada  y seca" for="ip2">Caneca azul</label>
      <input name="Azul" type="number" id="ip2" class="form-control" placeholder="Peso (Kg)" min="0" max="10000"  required step="any">
    </div>
  </div>
  <div class="form-row">
    <div class="col">
      <label class="text-secondary" data-toggle="tooltip" data-placement="bottom" title="Recuerda que en la caneca PAPEL Y CARTÓN van: Papel y Cartón En buenas condiciones limpios y secos" for="ip3">Caneca gris</label>
      <input name="Gris" type="number" id="ip3" class="form-control" placeholder="Peso (Kg)" min="0" max="10000"  required step="any">
    </div>
    <div class="col">
      <label for="ip4" data-toggle="tooltip" data-placement="top" title="Recuerda que en la caneca NO APROVECHABLES van: Papel higiénico Polvo del barrido Servilletas o papel sucio de algún químico (en mal estado)">Caneca negra</label>
      <input name="Negra" type="number" id="ip4" class="form-control" placeholder="Peso (Kg)" min="0" max="10000"  required step="any">
    </div>
  </div>
  <div class="form-row">
    <div class="col">
      <label for="datepicker">Fecha del formato</label>
      <input name="Fecha" id="datepicker" width="276" autocomplete="off" required />
      <script>
          $('#datepicker').datepicker({
              uiLibrary: 'bootstrap4'
          });
      </script>
    </div>
  </div>

  <button type="submit" class="btn btn-primary mt-3">Agregar formato</button>

</form>
<a class="btn btn-outline-primary mt-3" href="formatos.php">Volver</a>

    </div>
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