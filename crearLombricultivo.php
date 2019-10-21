<!DOCTYPE html>
<html>
<head>
  <title>Diligenciar formato de Lombricultivo</title>
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

<div class="container"><!-- CONTAINER -->
  <div class="row"> <!-- ROW -->
    <div class="col-md"> 
<h3 class="text-center pb-3"> Registrar un nuevo formato de lombricultivo</h3>   
<?php
if(isset($_POST['hour'])){
date_default_timezone_set('UTC');

$hora = $_POST['hour'];
$minuto = $_POST['minute'];
$am = $_POST['am'];
$ph = $_POST['ph'];
$humedad = "'".$_POST['humedad']."%'";
$temperatura = "'".$_POST['temperature']."°C'";
$oxigeno = "'".$_POST['oxigen']."'";
$riego = "'".$_POST['riego']."'";

$hour = "'".$hora.":".$minuto.$am."'";

$Fecha = $_POST['Fecha'];

$fecha = DateTime::createFromFormat('m/d/Y', $Fecha);
$Fecha  = $fecha->format('Y-m-d');
$bool = true;
$date = date('Y-m-d', strtotime("-1 day")); #Varia entre -1 y +0
if($date < $Fecha){
$bool = false;
}
$Fecha = "'".$Fecha."'";

if($bool){
include('conexion.php');
}

if (@mysqli_query($conn,"INSERT INTO lombricultivo VALUES ('',$Fecha,$hour,$ph,$humedad,$temperatura,$oxigeno,$riego)")) { ?>
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

<form action="crearLombricultivo.php" method="POST">
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
    <div class="col">
      <label for="hour">Hora</label>
      <input name="hour" type="number" id="hour" class="form-control" placeholder="Hora (1-12)" min="1" max="12"  required step="any">
    </div>
    <div class="col">
      <label for="minute">Minuto</label>
      <input name="minute" type="number" id="minute" class="form-control" placeholder="Minuto (0-60)" min="0" max="60"  required step="any">
    </div>
    <div class="col">
      <label for="minute">AM o PM</label>
      <select class="form-control" id="am" name="am">
        <option value="AM">AM</option>
        <option value="PM">PM</option>
      </select>
    </div>
  </div>
  <div class="form-row pt-3">
    <div class="col">
      <label for="ph">PH</label>
      <input name="ph" type="number" id="ph" class="form-control" placeholder="6,8 o 7,5" min="0" max="10000"  required step="any">
    </div>
    <div class="col">
      <label for="humedad">Humedad</label>
      <input name="humedad" type="number" id="humedad" class="form-control" placeholder="80 o 90" min="0" max="100"  required step="any">
    </div>
    <div class="col">
      <label for="temperature">Temperatura</label>
      <input name="temperature" type="number" id="temperature" class="form-control" placeholder="En grados °C" min="0" max="10000"  required step="any">
    </div>
  </div>
  <div class="form-row pt-3">
    <div class="col">
      <label for="ip5">Control de ox&iacute;geno</label>
      <select class="form-control" id="oxigen" name="oxigen">
        <option value="Cumple">Cumple</option>
        <option value="No cumple">No cumple</option>
      </select>
    </div>
    <div class="col">
      <label for="ip5">Riego</label>
      <select class="form-control" id="riego" name="riego">
        <option value="Cumple">Cumple</option>
        <option value="No cumple">No cumple</option>
      </select>
    </div>
  </div>

  <button type="submit" class="btn btn-primary mt-3">Agregar formato</button>
</form>
<a class="btn btn-outline-primary mt-3" href="lombricultivo.php">Volver</a>

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