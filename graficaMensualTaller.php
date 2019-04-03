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

<h4 class="text-center">Gr&aacute;fica mensual del taller de producci&oacute;n</h4>
<div class="container">
  <div class="row">
    <div class="col-md">

<form action="graficaMensualTaller.php" method="POST">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Seleccione el mes</label>
    <select name="mes" class="form-control" id="exampleFormControlSelect1" required>
      <option value="1">Enero</option>
      <option value="2">Febrero</option>
      <option value="3">Marzo</option>
      <option value="4">Abril</option>
      <option value="5">Mayo</option>
      <option value="6">Junio</option>
      <option value="7">Julio</option>
      <option value="8">Agosto</option>
      <option value="9">Septiembre</option>
      <option value="10">Octubre</option>
      <option value="11">Noviembre</option>
      <option value="12">Diciembre</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Seleccione el a&ntilde;o</label>
    <select name="anio" class="form-control" id="exampleFormControlSelect2" required>
    <?php
    $aux = date("Y");
    for ($aux; $aux > date("Y")-6 ; $aux--) { 
      echo "<option value='$aux'>$aux</option>";
    }
    ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
<a class="btn btn-outline-primary mt-3 mb-3" href="formatos.php">Volver</a>
<?php
$p = 0;
$c = 0;
$b = 0;
$em = 0;
$ep = 0;
$tet = 0;
$i = 0;
$v = 0;
$t = 0;

$meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio',
               'Agosto','Septiembre','Octubre','Noviembre','Diciembre');
if(isset($_POST['mes'])){
$mes = $_POST['mes'];
$anio = $_POST['anio'];

include('conexion.php');
$res = mysqli_query($conn,"SELECT SUM(papel),SUM(carton),SUM(botellas),SUM(empaquesm),SUM(empaquesp),SUM(tetrapack),SUM(icopor),SUM(vidrio),SUM(tela) FROM tallerproduccion WHERE MONTH(Fecha) = $mes AND YEAR(Fecha) = $anio");
$data = mysqli_fetch_array($res);
$p = round($data[0],3);
$c = round($data[1],3);
$b = round($data[2],3);
$em = round($data[3],3);
$ep = round($data[4],3);
$tet = round($data[5],3);
$i = round($data[6],3);
$v = round($data[7],3);
$t = round($data[8],3);

$maux = $mes-1;
echo "<h3>Gr&aacute;fica del mes $meses[$maux] en el a&ntilde;o $anio</h3>";

}
$rta = $p.",".$c.",".$b.",".$em.",".$ep.",".$tet.",".$i.",".$v.",".$t;
?>

<canvas id="myChart" width="150" height="150"></canvas>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Papel","Cartón","Botellas","Empaques metalizados","Empaques plasticos","Tetrapack","Icopor","Vidrio","Tela"],
        datasets: [{
            label: 'Peso en (Kg)',
            data: [<?php echo $rta; ?>],
            backgroundColor: [
                'rgb(80, 244, 66, 0.2)',
                'rgb(65, 122, 244, 0.2)',
                'rgb(122, 124, 127, 0.2)',
                'rgb(40, 42, 45, 0.2)',
                'rgb(81, 245, 65, 0.2)',
                'rgb(65, 122, 244, 0.2)',
                'rgb(123, 124, 127, 0.2)',
                'rgb(41, 42, 45, 0.2)',
                'rgb(82, 244, 66, 0.2)'
            ],
            borderColor: [
                'rgb(80, 244, 66)',
                'rgb(65, 122, 244)',
                'rgb(122, 124, 127)',
                'rgb(40, 42, 45)',
                'rgb(80, 244, 66)',
                'rgb(65, 122, 244)',
                'rgb(122, 124, 127)',
                'rgb(40, 42, 45)',
                'rgb(80, 244, 66)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        },
        legend: {
                        onClick: (e) => e.stopPropagation()
                    }
    }
});
</script>

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