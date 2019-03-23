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
<nav class="navbar navbar-expand-lg sticky-top navbar-light" style="background:rgba(255,255,255,0.5);">
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

<footer class="footer pt-3">
	<div class="container">
		<p>Copyright 2017 &copy; by UEB-IEEE-Computer</p>
	</div>
</footer>


<!-- CONTENEDOR -->
</div>
<!--            -->

</body>
</html>