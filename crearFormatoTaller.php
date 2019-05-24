<!DOCTYPE html>
<html>
<head>
	<title>Diligenciar formato Taller de producci&oacute;n</title>
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
<h3 class="text-center pb-3"> Registrar un nuevo formato para el taller de producci&oacute;n</h3>   
<?php
if(isset($_POST['papel'])){
date_default_timezone_set('UTC');
$papel = $_POST['papel'];
$carton = $_POST['carton'];
$botellas = $_POST['botellas'];
$empaquesm = $_POST['empaquesm'];
$empaquesp = $_POST['empaquesp'];
$tetrapack = $_POST['tetrapack'];
$icopor = $_POST['icopor'];
$vidrio = $_POST['vidrio'];
$tela = $_POST['tela'];

$Fecha = $_POST['Fecha'];

$fecha = DateTime::createFromFormat('m/d/Y', $Fecha);
$Fecha  = $fecha->format('Y-m-d');
$bool = true;
$date = date('Y-m-d', strtotime("+0 day"));
if($date < $Fecha){
$bool = false;
}
$Fecha = "'".$Fecha."'";

if($bool){
include('conexion.php');
}

if (@mysqli_query($conn,"INSERT INTO tallerproduccion VALUES ('',$papel,$carton,$botellas,$empaquesm,$empaquesp,$tetrapack,$icopor,$vidrio,$tela,$Fecha,DEFAULT)")) { ?>
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
<form action="crearFormatoTaller.php" method="POST">
  <div class="form-row">
    <div class="col">
      <label for="ip1">Papel</label>
      <input name="papel" type="number" id="ip1" class="form-control" placeholder="Peso (Kg)" min="0" max="10000"  required step="any">
    </div>
    <div class="col">
      <label for="ip2">Cart&oacute;n</label>
      <input name="carton" type="number" id="ip2" class="form-control" placeholder="Peso (Kg)" min="0" max="10000"  required step="any">
    </div>
    <div class="col">
      <label for="ip3">Botellas</label>
      <input name="botellas" type="number" id="ip3" class="form-control" placeholder="Peso (Kg)" min="0" max="10000"  required step="any">
    </div>
  </div>
  <div class="form-row">
    <div class="col">
      <label for="ip4">Empaques metalizados</label>
      <input name="empaquesm" type="number" id="ip4" class="form-control" placeholder="Peso (Kg)" min="0" max="10000"  required step="any">
    </div>
    <div class="col">
      <label for="ip5">Empaques pl&aacute;sticos</label>
      <input name="empaquesp" type="number" id="ip5" class="form-control" placeholder="Peso (Kg)" min="0" max="10000"  required step="any">
    </div>
    <div class="col">
      <label for="ip6">Tetrapack</label>
      <input name="tetrapack" type="number" id="ip6" class="form-control" placeholder="Peso (Kg)" min="0" max="10000"  required step="any">
    </div>
  </div>
  <div class="form-row">
    <div class="col">
      <label for="ip7">Icopor</label>
      <input name="icopor" type="number" id="ip7" class="form-control" placeholder="Peso (Kg)" min="0" max="10000"  required step="any">
    </div>
    <div class="col">
      <label for="ip8">Vidrio</label>
      <input name="vidrio" type="number" id="ip8" class="form-control" placeholder="Peso (Kg)" min="0" max="10000"  required step="any">
    </div>
    <div class="col">
      <label for="ip9">Tela</label>
      <input name="tela" type="number" id="ip9" class="form-control" placeholder="Peso (Kg)" min="0" max="10000"  required step="any">
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