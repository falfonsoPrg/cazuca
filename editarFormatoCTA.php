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
<?php
if(isset($_GET['id'])){
$id = $_GET['id'];
include('conexion.php');
$res = mysqli_query($conn,"SELECT * FROM cuartocta WHERE ID_CuartoCTA = $id");
$data = mysqli_fetch_array($res);
}
?>


<div class="container"><!-- CONTAINER -->
  <div class="row"> <!-- ROW -->
    <div class="col-md"> 
<h3 class="text-center pb-3"> Editando el formato con ID # <?php echo $data[0]; ?></h3> 

<?php
if(isset($_POST['Verde'])){
$Verde = $_POST['Verde'];
$Azul = $_POST['Azul'];
$Gris = $_POST['Gris'];
$Negra = $_POST['Negra'];
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
if (@mysqli_query($conn,"UPDATE cuartocta SET Verde=$Verde,Azul=$Azul,Gris=$Gris,Negra=$Negra,Fecha=$Fecha WHERE ID_CuartoCTA=$id")) { ?>
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
<form action="editarFormatoCTA.php?id=<?php echo $id; ?>" method="POST">
  <div class="form-row">
    <div class="col">
      <label class="text-success" for="ip1">Caneca verde</label>
      <input name="Verde" type="number" id="ip1" class="form-control" value="<?php echo $data[1]; ?>" min="0" required step="any">
    </div>
    <div class="col">
      <label class="text-primary" for="ip2">Caneca azul</label>
      <input name="Azul" type="number" id="ip2" class="form-control" value="<?php echo $data[2]; ?>" min="0" required step="any">
    </div>
  </div>
  <div class="form-row">
    <div class="col">
      <label class="text-secondary" for="ip3">Caneca gris</label>
      <input name="Gris" type="number" id="ip3" class="form-control" value="<?php echo $data[3]; ?>" min="0" required step="any">
    </div>
    <div class="col">
      <label for="ip4">Caneca negra</label>
      <input name="Negra" type="number" id="ip4" class="form-control" value="<?php echo $data[4]; ?>" min="0" required step="any">
    </div>
  </div>
  <div class="form-row">
    <div class="col">
      <label for="datepicker">Fecha del formato</label>
      <input name="Fecha" id="datepicker" value="<?php echo $data[5]; ?>" width="276" autocomplete="off" required readonly />
      <script>
          $('#datepicker').datepicker({
              uiLibrary: 'bootstrap4'
          });
      </script>
    </div>
  </div>

  <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>

</form>
<a class="btn btn-outline-primary mt-3" href="formatos.php">Volver</a>


    </div>
  </div><!-- ROW -->
</div><!-- CONTAINER -->


<footer class="footer pt-3">
  <div class="container">
    <p>Copyright 2017 &copy; by UEB-IEEE-Computer</p>
  </div>
</footer>
</body>
</html>