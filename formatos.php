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
<?php include("header.php");?>
<!--           -->
<!-- NAVEGADOR -->
<!--           -->


<div class="container">
  <div class="row pt-3">
    <div class="col-md">

<div class="dropdown">
  <a class="btn btn-outline-danger dropdown-toggle mb-3" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Descargar formatos
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="./documentos/Formato_Cuarto_CTA.doc">Descargar formato del Cuarto CTA</a>
    <a class="dropdown-item" href="./documentos/Formato_Taller_Produccion.doc">Descargar formato del Taller de produci&oacute;n</a>
    <a class="dropdown-item" href="./documentos/Formatos.doc">Descargar ambos formatos</a>
  </div>
</div>

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

        <th class="text-success" data-toggle="tooltip" data-placement="top" title="Recuerda que en la caneca VERMICOMPOST van: Residuos orgánicos crudos, excepto los cítricos."><label>Caneca Verde(Kg)</label></th>
        <th class="text-primary" data-toggle="tooltip" data-placement="top" title="Recuerda que en la caneca PLÁSTICOS van: Botellas plásticas, Empaques metalizados, Empaques plásticos, Icopor, Tetrapack, Vidrio, Tela mojada  y seca"><label>Caneca Azul(Kg)</label></th>
        <th class="text-muted" data-toggle="tooltip" data-placement="top" title="Recuerda que en la caneca PAPEL Y CARTÓN van: Papel y Cartón En buenas condiciones limpios y secos"><label>Caneca Gris(Kg)</label></th>
        <th data-toggle="tooltip" data-placement="top" title="Recuerda que en la caneca NO APROVECHABLES van: Papel higiénico Polvo del barrido Servilletas o papel sucio de algún químico (en mal estado)"><label>Caneca Negra(Kg)</label></th>
        <th><label>Fecha De registro</label></th>
      </tr>
    </thead>
    <tbody>
      <?php
      include('conexion.php');
        $resultado =  mysqli_query($conn, 'SELECT * FROM cuartocta ORDER BY fecha_agregacion DESC');
        $cont = 0;
        while($row3 = mysqli_fetch_array($resultado) and $cont <3){ ?>
        <tr>

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

<!--          -->
<!--  FOOTER  -->
<!--          -->
<?php include("footer.php");?>
<!--          -->
<!--  FOOTER  -->
<!--          -->

</body>
</html>