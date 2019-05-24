<!DOCTYPE html>
<html>
<head>
	<title>Finanzas</title>
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
  <div class="row">
    <div class="col-md"></div>
    <div class="col-md">
<?php
include('conexion.php');
$tc = mysqli_query($conn,"SELECT SUM(val_movimiento) FROM movimiento GROUP BY cod_operacion ");
$num1=0;
$num2=0;
$c = 0;
while($dc = mysqli_fetch_array($tc)){
  if($c==0){
    $num1 = $dc[0];
    $c = $c + 1;
  }else{
    $num2 = $dc[0];  
  }
}

$result = $num1 - $num2;
if($result >= 0){ ?>
<div class="alert alert-success" role="alert">
Total neto: <span class="fas fa-coins"></span> <?php echo $result; ?> Pesos
</div>
<?php }else{ ?>
<div class="alert alert-danger" role="alert">
Total neto: <span class="fas fa-coins"></span> <?php echo $result; ?> Pesos
</div>
<?php }
?>
    </div>
    <div class="col-md"></div>
  </div>

  <div class="row">
    <div class="col-md"></div>
    <div class="col-md-8">
      <div class="btn-group d-block" role="group" aria-label="Basic example">
        <a class="btn btn-outline-success" href="crearMovimiento.php">Agregar movimiento</a>
        <a class="btn btn-outline-success" href="verCompraVenta.php">Ver historial ventas/compras</a>
      </div>
    </div>
    <div class="col-md"></div>
  </div>

  <div class="row">
    <div class="col-md"></div>
    <div class="col-md-8">


<?php


$meses = array('"Enero','"Febrero','"Marzo','"Abril','"Mayo','"Junio','"Julio','"Agosto','"Septiembre','"Octubre','"Noviembre','"Diciembre');

$res = mysqli_query($conn,"SELECT YEAR(fecha_movimiento) AS ANIO, MONTH(fecha_movimiento) AS FECHA,SUM(val_movimiento) AS TOTAL FROM movimiento WHERE cod_operacion=2 GROUP BY MONTH(fecha_movimiento),YEAR(fecha_movimiento) ORDER BY YEAR(fecha_movimiento),MONTH(fecha_movimiento)");

$rtam = "";
$rtat = "";

while($row = mysqli_fetch_array($res)){
$rtam = $rtam.$meses[$row['FECHA']-1]." ".$row['ANIO'].'"'.",";
$rtat = $rtat.$row['TOTAL'].",";
}

$rtam = substr($rtam, 0, -1);
$rtat = substr($rtat, 0, -1);

$res2 = mysqli_query($conn,"SELECT YEAR(fecha_movimiento) AS ANIO, MONTH(fecha_movimiento) AS FECHA,SUM(val_movimiento) AS TOTAL FROM movimiento WHERE cod_operacion=1 GROUP BY MONTH(fecha_movimiento),YEAR(fecha_movimiento) ORDER BY YEAR(fecha_movimiento),MONTH(fecha_movimiento)");
$rtam2 = "";
$rtat2 = "";
while($row2 = mysqli_fetch_array($res2)){
$rtam2 = $rtam2.$meses[$row2['FECHA']-1]." ".$row2['ANIO'].'"'.",";
$rtat2 = $rtat2.$row2['TOTAL'].",";
}
$rtam2 = substr($rtam2, 0, -1);
$rtat2 = substr($rtat2, 0, -1);

?>

<canvas id="line-chart1" width="800" height="450"></canvas>
<script>
new Chart(document.getElementById("line-chart1"), {
  type: 'line',
  data: {
    labels: [<?php echo $rtam2;?>],
    datasets: [{ 
        data: [<?php echo $rtat2;?>],
        label: "Ventas",
        borderColor: "#42f46b",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Gráfica de ventas'
    },
            scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        },legend: {
                        onClick: (e) => e.stopPropagation()
                    }
  }
});
</script>

<canvas id="line-chart" width="800" height="450"></canvas>
<script>
new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: [<?php echo $rtam;?>],
    datasets: [{ 
        data: [<?php echo $rtat;?>],
        label: "Compras",
        borderColor: "#ef1313",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Gráfica de compras'
    },
            scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        },legend: {
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