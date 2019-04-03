<!DOCTYPE html>
<html>
<head>
	<title></title>
<?php
include("configHead.php");
?>

</head>
<body>
<!--           -->
<!-- NAVEGADOR -->
<!--           -->
<?php include("header.php");?>
<!--           -->
<!-- NAVEGADOR -->
<!--           -->


<!-- CONTENEDOR -->
<div class="container">
<!--            -->
<center>
<a class="btn btn-success mt-5" href="crearProducto.php">Crear un nuevo producto</a>
</center>

<div class="pt-5"><!-- PADDING TOP DE PRODUCTOS -->
<div class="card w-100"><!-- CARD -->
<h5 class="card-header text-center">Productos</h5>
  <div class="card-body"><!-- CARD BODY -->

  	<table class="table table-striped table-bordered">
  		<thead>
  		<tr>
  			<th>Imagen</th>
  			<th>Nombre del producto</th>
  			<th>Valor del producto</th>
  			<th>N&uacute;mero de unidades vendidas</th>
  		</tr>
  		</thead>
  		<tbody>
  		<?php
  		include('conexion.php');
        $resultado =  mysqli_query($conn, 'SELECT * FROM producto');
  		while($row = mysqli_fetch_array($resultado)){?>
  			<tr>
  			<td><img class="img-fluid rounded" height="90" width="90" src="./productos/<?php echo $row[3];?>"></td>
  			<td class="text-center"><?php echo $row[1];?></td>
  			<td class="text-center"><?php echo $row[2];?></td>
  			<td class="text-center"><?php echo 0;?></td>
  			</tr>
  		<?php }?>
  		</tbody>
  	</table>

  </div><!-- CARD BODY -->
</div><!-- CARD -->
</div><!-- PADDING TOP DE DOCUMENTACION -->


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