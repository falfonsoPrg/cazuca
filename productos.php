<!DOCTYPE html>
<html>
<head>
	<title>Productos</title>
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
  			<th>N&uacute;mero de unidades vendidas y compradas</th>
  		</tr>
  		</thead>
  		<tbody>
  		<?php
  		include('conexion.php');
		$resultado =  mysqli_query($conn, 'SELECT * FROM producto');
		$resultado2 = mysqli_query($conn, 'SELECT PRODUCTO.cod_producto,SUM(MOVIMIENTO.cant_movimiento) FROM MOVIMIENTO,PRODUCTO WHERE producto.cod_producto = movimiento.cod_producto AND cod_operacion=1 GROUP BY PRODUCTO.cod_producto ORDER BY producto.cod_producto;');
		$resultado3 = mysqli_query($conn, 'SELECT PRODUCTO.cod_producto,SUM(MOVIMIENTO.cant_movimiento) FROM MOVIMIENTO,PRODUCTO WHERE producto.cod_producto = movimiento.cod_producto AND cod_operacion=2 GROUP BY PRODUCTO.cod_producto ORDER BY producto.cod_producto;');
		  while($row = mysqli_fetch_array($resultado)){?>
  			<tr>
  			<td><img class="img-fluid rounded" height="90" width="90" src="./productos/<?php echo $row[2];?>"></td>
  			<td class="text-center"><?php echo $row[1];?></td>
			  <td class="text-center"><?php
			$text1 = "0 vendidas, ";
			while($row2 = mysqli_fetch_array($resultado2)){
			  	if($row2[0]==$row[0]){
			  		$text1 = $row2[1] . " vendidas, ";
			  	}
			  }
			echo $text1;
		  	$resultado2 = mysqli_query($conn, 'SELECT PRODUCTO.cod_producto,SUM(MOVIMIENTO.cant_movimiento) FROM MOVIMIENTO,PRODUCTO WHERE producto.cod_producto = movimiento.cod_producto AND cod_operacion=1 GROUP BY PRODUCTO.cod_producto ORDER BY producto.cod_producto;');
		  	$text2 = "0 compradas.";
			while($row3 = mysqli_fetch_array($resultado3)){
			  	if($row3[0]==$row[0]){
			  		$text2 = $row3[1] . " compradas.";
			  	}
			  }
			  echo $text2;
		  	$resultado3 = mysqli_query($conn, 'SELECT PRODUCTO.cod_producto,SUM(MOVIMIENTO.cant_movimiento) FROM MOVIMIENTO,PRODUCTO WHERE producto.cod_producto = movimiento.cod_producto AND cod_operacion=2 GROUP BY PRODUCTO.cod_producto ORDER BY producto.cod_producto;');
			  ?>
			  </td>
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