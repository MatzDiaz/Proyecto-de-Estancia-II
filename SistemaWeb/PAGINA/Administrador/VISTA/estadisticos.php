<?php include 'header.php'; ?>
<?php include '../CONTROLADOR/controlador_estadisticos.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Estadísticos</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      //graficas de alumnos
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Hombres', <?=$masculino?>],
          ['Mujeres', <?=$femenino?>],
        ]);

        var options = {
          title: 'Número de estudiantes por género'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
       
      //grafica grado de satisfaccion
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawBasic);     
    function drawBasic() {

    var data = google.visualization.arrayToDataTable([
    ['City', ' respuestas',],
    ['Muy insatisfecho',<?=$muyin?> ],
    ['insatisfecho',<?=$insatisfecho?> ],
    ['Neutral', <?=$neutro?>],
    ['Satisfecho', <?=$satisfecho?>],
    ['Muy satisfecho', <?=$muysat?>]
    ]);

    var options = {
    title: 'Grado de satisfacción de los alumnos',
    chartArea: {width: '50%'},
    hAxis: {
        title: 'Total de respuestas',
        minValue: 0
    },
    };

    var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

    chart.draw(data, options);
    }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <div id="chart_div"></div>
    <form id="printForm">
        <button type="button" onclick="printPage()">Imprimir reportes</button>
    </form>

<script>
    function printPage() {
        window.print();
    }
</script>
  </body>

</html>
