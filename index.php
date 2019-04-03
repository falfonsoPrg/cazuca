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


<!-- CONTENEDOR -->
<div class="container">
<!--            -->


<div class="row align-items-center pt-3"> <!-- ROW -->
<div class="col-md">
<!--           -->
<!-- CARRUSEL  -->
<!--           -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" height="360" src="./img/sli1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" height="360" src="./img/sli2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" height="360" src="./img/sli3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!--           -->
<!-- CARRUSEL  -->
<!--           -->
</div>
</div><!-- /ROW -->

<div class="pt-5"><!-- PADDING TOP DE DOCUMENTACION -->
<div class="card w-100" style="background-color: rgb(13, 155, 163);"><!-- CARD -->
<h5 class="card-header text-center">Documentaci&oacute;n</h5>
  <div class="card-body"><!-- CARD BODY -->
<div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="./img/documentacion.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Documentaci&oacute;n compostaje</h5>
      <p class="card-text">En este espacio encontrar&aacute;s toda la documentaci&oacute;n relacionada con el compostaje.</p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="./img/documentacion.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Documentaci&oacute;n Manualidades</h5>
      <p class="card-text">En este espacio encontrar&aacute;s toda la documentaci&oacute;n de las manualidades.</p>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="./img/documentacion.png" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Documentaci&oacute;n pagina</h5>
      <p class="card-text">En este espacio encontrar&aacute;s toda la documentaci&oacute;n de c&oacute;mo funciona la pagina.</p>
    </div>
  </div>
</div>
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