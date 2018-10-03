  <?php





set_time_limit(0);



   //require_once('../lib/pdf/mpdf.php');

# Invoco el JSON desde la API


//$data = file_get_contents('https://script.google.com/macros/s/AKfycbx2Y3uK9mbbxUvirfOHsXikg7bsNOnm5uHEWWeeuDFxP4HsjmQ/exec?apiKey=1234fx&operation=GetTickers&f1='.$_GET["f1"].'&f2='.$_GET["f2"].'');

$datas = file_get_contents('https://script.google.com/macros/s/AKfycbx2Y3uK9mbbxUvirfOHsXikg7bsNOnm5uHEWWeeuDFxP4HsjmQ/exec?apiKey=1234fx&operation=GetTickers&f1=11/25/2016&f2=11/29/2016');
echo $datas

 ?>






















  <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        //var data = new google.visualization.DataTable(<?=$jsonTable?>);
        var data = google.visualization.arrayToDataTable(.$datas.);
      // var data = google.visualization.arrayToDataTable([
        // ['Year', 'Sales', 'Expenses'],
       //   ['2004',  1000,      400],
       //   ['2005',  1170,      460],
       //   ['2006',  660,       1120],
      //    ['2007',  1030,      540]
      //  ]);

        var options = {
          title: 'Finca Karina Costo Nomina x Dia',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>
