<!DOCTYPE html>
<html>
<head>
	<title>Ver formatos CLA</title>
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

<div class="container">
<div class="row pt-3">
    <div class="col-md">


<center><a class="btn btn-outline-primary mb-3" href="formatos.php">Volver</a></center>

<table class="table table-bordered table-responsive">
  <thead>
       <tr>
        <th>ID</th>
        <th>Caneca Verde(Kg)</th>
        <th>Caneca Azul(Kg)</th>
        <th>Caneca Gris(Kg)</th>
        <th>Caneca Negra(Kg)</th>
        <th>Fecha De registro</th>
        <th>Editar</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include('conexion.php');
        $resultado =  mysqli_query($conn, 'SELECT * FROM cuartocta ORDER BY fecha_agregacion DESC');

        while($row3 = mysqli_fetch_array($resultado)){ ?>
        <tr>
         <td> <?php  echo $row3['ID_CuartoCTA']; ?></td>
         <td> <?php  echo $row3['Verde']; ?></td>
         <td> <?php  echo $row3['Azul']; ?></td>
         <td> <?php  echo $row3['Gris']; ?></td>
         <td> <?php  echo $row3['Negra']; ?></td>
         <td> <?php  echo $row3['Fecha']; ?></td>
         <td><a href="editarFormatoCTA.php?id=<?php echo $row3['ID_CuartoCTA'] ?>"><span class="far fa-edit"></span></a></td>
       </tr>
      <?php } ?>

    </tbody>
</table>

</div>
</div>
</div>

<!--          -->
<!--  FOOTER  -->
<!--          -->
<?php include("footer.php");?>
<!--          -->
<!--  FOOTER  -->
<!--          -->
</body>
</html>