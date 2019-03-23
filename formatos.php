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

<div class="card w-100">
  <div class="card-body">
    <h5 class="card-title">Formatos cuarto CTA</h5>
<div class="btn-group d-block">
<a href="crearFormatoCTA.php" class="btn btn-outline-primary">Subir nuevo formato cuarto CTA</a>
<a href="verFormatosCTA.php" class="btn btn-outline-primary">Ver todos los formatos CTA</a>
<a href="graficaMensualCTA.php" class="btn btn-outline-primary">Ver gr&aacute;ficas mensuales</a>
<a href="graficaRangoCTA.php" class="btn btn-outline-primary">Ver gr&aacute;ficas en rango</a>
</div>

<p class="font-weight-bold pt-3">Agregados recientemente</p>
<table class="table table-bordered table-responsive">
  <thead>
       <tr>
        <th>ID</th>
        <th>Caneca Verde(Kg)</th>
        <th>Caneca Azul(Kg)</th>
        <th>Caneca Gris(Kg)</th>
        <th>Caneca Negra(Kg)</th>
        <th>Fecha De registro</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include('conexion.php');
        $resultado =  mysqli_query($conn, 'SELECT * FROM cuartocta ORDER BY fecha_agregacion DESC');
        $cont = 0;
        while($row3 = mysqli_fetch_array($resultado) and $cont <3){ ?>
        <tr>
         <td> <?php  echo $row3['ID_CuartoCTA']; ?></td>
         <td> <?php  echo $row3['Verde']; ?></td>
         <td> <?php  echo $row3['Azul']; ?></td>
         <td> <?php  echo $row3['Gris']; ?></td>
         <td> <?php  echo $row3['Negra']; ?></td>
         <td> <?php  echo $row3['Fecha']; ?></td>
       </tr>
      <?php $cont = $cont + 1; }
      ?>

    </tbody>
</table>
  </div>
</div>

    </div>
  </div>
  <div class="row pt-3">
    <div class="col-md">

<div class="card w-100">
  <div class="card-body">
    <h5 class="card-title">Formatos taller de producci&oacute;n</h5>
<div class="btn-group d-block">
<a href="crearFormatoTaller.php" class="btn btn-outline-primary">Subir nuevo formato Taller</a>
<a href="verFormatosTaller.php" class="btn btn-outline-primary">Ver todos los formatos Taller</a>
<a href="graficaMensualTaller.php" class="btn btn-outline-primary">Ver gr&aacute;ficas mensuales</a>
<a href="graficaRangoTaller.php" class="btn btn-outline-primary">Ver gr&aacute;ficas en rango</a>
</div>
<p class="font-weight-bold pt-3">Agregados recientemente</p>
<table class="table table-bordered table-responsive">
  <thead>
    <tr>
      <th>ID</th>
      <th>Papel</th>
      <th>Cart&oacute;n</th>
      <th>Botellas</th>
      <th>Empaques metalizados</th>
      <th>Empaques Plasticos</th>
      <th>Tetrapack</th>
      <th>Icopor</th>
      <th>Vidrio</th>
      <th>Tela</th>
      <th>Fecha de registro</th>
    </tr>
  </thead>
  <tbody>
  <?php
  include('conexion.php');
  $resultado2 =  mysqli_query($conn, 'SELECT * FROM tallerproduccion ORDER BY fecha_agregacion DESC');
  $cont = 0;
  while($row4 = mysqli_fetch_array($resultado2) and $cont < 3){
    echo "<tr>";
    echo "<td>$row4[0]</td>";
    echo "<td>$row4[1]</td>";
    echo "<td>$row4[2]</td>";
    echo "<td>$row4[3]</td>";
    echo "<td>$row4[4]</td>";
    echo "<td>$row4[5]</td>";
    echo "<td>$row4[6]</td>";
    echo "<td>$row4[7]</td>";
    echo "<td>$row4[8]</td>";
    echo "<td>$row4[9]</td>";
    echo "<td>$row4[10]</td>";
    echo "</tr>";
    $cont = $cont +1;
  }
  ?>
  </tbody>
  </table>

  </div>
</div>

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