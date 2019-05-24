<!DOCTYPE html>
<html>
<head>
	<title>Gr&aacute;fica en rango CTA</title>
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

<h4 class="text-center">Gr&aacute;fica en rango del cuarto CTA</h4>
<div class="container">
  <div class="row">
      <div class="col-md"></div>
    <div class="col-md">

<form action="graficaRangoCTA.php" method="POST">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Seleccione el mes de inicio</label>
    <select name="mesi" class="form-control" id="exampleFormControlSelect1" required>
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
    <label for="exampleFormControlSelect2">Seleccione el a&ntilde;o de inicion</label>
    <select name="anioi" class="form-control" id="exampleFormControlSelect2" required>
    <?php
    $aux = date("Y");
    for ($aux; $aux > date("Y")-6 ; $aux--) { 
      echo "<option value='$aux'>$aux</option>";
    }
    ?>
    </select>
  </div>
    <div class="form-group">
    <label for="exampleFormControlSelect1">Seleccione el mes de fin</label>
    <select name="mesf" class="form-control" id="exampleFormControlSelect1" required>
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
    <label for="exampleFormControlSelect2">Seleccione el a&ntilde;o de fin</label>
    <select name="aniof" class="form-control" id="exampleFormControlSelect2" required>
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
$v = 0;
$a = 0;
$g = 0;
$n = 0;

$meses = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio',
               'Agosto','Septiembre','Octubre','Noviembre','Diciembre');
if(isset($_POST['mesi'])){
$mesi = $_POST['mesi'];
$anioi = $_POST['anioi'];
$mesf = $_POST['mesf'];
$aniof = $_POST['aniof'];
$sqlfch1 = "'"."$anioi-$mesi-1"."'";
$sqlfch2 = "'"."$aniof-$mesf-31"."'";
include('conexion.php');
$res = mysqli_query($conn,"SELECT SUM(Verde),SUM(Azul),SUM(Gris),SUM(Negra) FROM cuartocta WHERE Fecha BETWEEN $sqlfch1 AND $sqlfch2");
$data = mysqli_fetch_array($res);
$v = round($data[0],3);
$a = round($data[1],3);
$g = round($data[2],3);
$n = round($data[3],3);
$mauxi = $mesi-1;
$mauxf = $mesf-1;
echo "<h4>Gr&aacute;fica del mes $meses[$mauxi] del $anioi al mes de $meses[$mauxf] del $aniof</h4>";

}
$rta = $v.",".$a.",".$g.",".$n;
?>

<canvas id="myChart" width="150" height="150"></canvas>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Caneca verde","Caneca azul","Caneca gris","Caneca negra"],
        datasets: [{
            label: 'Peso en (Kg)',
            data: [<?php echo $rta; ?>],
            backgroundColor: [
                'rgb(80, 244, 66, 0.2)',
                'rgb(65, 122, 244, 0.2)',
                'rgb(122, 124, 127, 0.2)',
                'rgb(40, 42, 45, 0.2)'
            ],
            borderColor: [
                'rgb(80, 244, 66)',
                'rgb(65, 122, 244)',
                'rgb(122, 124, 127)',
                'rgb(40, 42, 45)'
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
  <div class="col-md"></div>
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