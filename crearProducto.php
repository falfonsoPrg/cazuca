<!DOCTYPE html>
<html>
<head>
	<title></title>
<?php
include("configHead.php");
?>
<script type="text/javascript">
function reSend(){
  window.location = "productos.php";
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

if(isset($_POST['nom_producto'])){

$nom_producto =  "'".$_POST['nom_producto']."'";
$val_producto = $_POST['val_producto'];
$img_producto = "'".$_FILES['imagen']['name']."'";

$image = $_FILES['imagen']['name'];
include_once('conexion.php');
if (@mysqli_query($conn,"INSERT INTO producto VALUES('',$nom_producto,$val_producto,$img_producto)")) { 
move_uploaded_file( $_FILES['imagen']['tmp_name'], "./productos/$image");?>
<div class="alert alert-success" role="alert">
  Registro agregado con exito, espere unos segundos...
</div>
<script type="text/javascript">
  setTimeout("reSend()", 3500);
</script>
<?php } else { ?>
<div class="alert alert-danger" role="alert">
  Error al subir el producto intentelo nuevamente
</div>
<?php }


}
?>

<!-- CONTENEDOR -->
<div class="container">
<!--            -->


<form action="crearProducto.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="nom_producto">Nombre</label>
    <input type="text" class="form-control" id="nom_producto" name="nom_producto">
  </div>
  <div class="form-group">
    <label for="val_producto">Valor por unidad</label>
    <input type="numer" class="form-control" id="val_producto" name="val_producto">
  </div>
   <div class="form-group">
    <label for="imagen">Example file input</label>
    <input type="file" class="form-control-file" id="imagen" name="imagen">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

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