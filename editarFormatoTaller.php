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
<?php
if(isset($_GET['id'])){
$id = $_GET['id'];
include('conexion.php');
$res = mysqli_query($conn,"SELECT * FROM tallerproduccion WHERE id = $id");
$data = mysqli_fetch_array($res);
}
?>

<div class="container"><!-- CONTAINER -->
  <div class="row"> <!-- ROW -->
    <div class="col-md"> 
<h3 class="text-center pb-3"> Editando el formato con ID # <?php echo $id; ?></h3>      
<form action="editarFormatoTaller.php?id=<?php echo $id; ?>" method="POST">
<?php
if(isset($_POST['papel'])){
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
$bool = true;

if(strpos($Fecha,"/") !== false){
$fecha = DateTime::createFromFormat('m/d/Y', $Fecha);
$Fecha  = $fecha->format('Y-m-d');
$date = date('Y-m-d', strtotime("-1 day"));

if($date < $Fecha){

$bool = false;
}

}
$Fecha = "'".$Fecha."'";
if($bool){
if (@mysqli_query($conn,"UPDATE tallerproduccion SET papel=$papel,carton=$carton,botellas=$botellas,empaquesm=$empaquesm,empaquesp=$empaquesp,tetrapack=$tetrapack,icopor=$icopor,vidrio=$vidrio,tela=$tela,Fecha=$Fecha WHERE id=$id") and $bool) { ?>
<div class="alert alert-success" role="alert">
  Registro actualizado con exito, espere unos segundos...
</div>
<script type="text/javascript">
  setTimeout("reSend()", 3500);
</script>
<?php } } else { ?>
<div class="alert alert-danger" role="alert">
  No puede ingresar una fecha mayor a la actual intentelo nuevamente.
</div>
<?php }

}
?>

  <div class="form-row">
    <div class="col">
      <label for="ip1">Papel</label>
      <input name="papel" type="number" id="ip1" class="form-control" value="<?php echo $data[1]; ?>" min="0" required step="any">
    </div>
    <div class="col">
      <label for="ip2">Cart&oacute;n</label>
      <input name="carton" type="number" id="ip2" class="form-control" value="<?php echo $data[2]; ?>" min="0" required step="any">
    </div>
    <div class="col">
      <label for="ip3">Botellas</label>
      <input name="botellas" type="number" id="ip3" class="form-control" value="<?php echo $data[3]; ?>" min="0" required step="any">
    </div>
  </div>
  <div class="form-row">
    <div class="col">
      <label for="ip4">Empaques metalizados</label>
      <input name="empaquesm" type="number" id="ip4" class="form-control" value="<?php echo $data[4]; ?>" min="0" required step="any">
    </div>
    <div class="col">
      <label for="ip5">Empaques pl&aacute;sticos</label>
      <input name="empaquesp" type="number" id="ip5" class="form-control" value="<?php echo $data[5]; ?>" min="0" required step="any">
    </div>
    <div class="col">
      <label for="ip6">Tetrapack</label>
      <input name="tetrapack" type="number" id="ip6" class="form-control" value="<?php echo $data[6]; ?>" min="0" required step="any">
    </div>
  </div>
  <div class="form-row">
    <div class="col">
      <label for="ip7">Icopor</label>
      <input name="icopor" type="number" id="ip7" class="form-control" value="<?php echo $data[7]; ?>" min="0" required step="any">
    </div>
    <div class="col">
      <label for="ip8">Vidrio</label>
      <input name="vidrio" type="number" id="ip8" class="form-control" value="<?php echo $data[8]; ?>" min="0" required step="any">
    </div>
    <div class="col">
      <label for="ip9">Tela</label>
      <input name="tela" type="number" id="ip9" class="form-control" value="<?php echo $data[9]; ?>" min="0" required step="any">
    </div>
  </div>
  <div class="form-row">
    <div class="col">
      <label for="datepicker">Fecha del formato</label>
      <input name="Fecha" id="datepicker" value="<?php echo $data[10]; ?>" width="276" autocomplete="off" required readonly />
      <script>
          $('#datepicker').datepicker({
              uiLibrary: 'bootstrap4'
          });
      </script>
    </div>
  </div>

  <button type="submit" class="btn btn-primary mt-3">Guardar cambios</button>
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