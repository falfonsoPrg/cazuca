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

<footer class="footer pt-3">
  <div class="container">
    <p>Copyright 2017 &copy; by UEB-IEEE-Computer</p>
  </div>
</footer>
</body>
</html>