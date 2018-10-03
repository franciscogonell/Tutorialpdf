<?php

 /*
     * filtering an array
     */
    



set_time_limit(0);



   


$data = file_get_contents('https://script.google.com/macros/s/AKfycbzLG815_fh1GBKODFurmD2gsVCG5_Vn3a5oqVyDwxjWNlQnUaZi/exec?apiKey=1234567fx&operation=GetTickers&f1='.$_GET["f1"].'&f2='.$_GET["f2"].'');

$time = strtotime($_GET["f1"]);

$newformat = date('d-m-Y',$time);

$time = strtotime($_GET["f2"]);

$newformat1 = date('d-m-Y',$time);

//echo $data;




//$data_array = json_decode($data);

//$matches=count($data_array->records)-1;



?>

<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.charts.load('current', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);
      
    function drawChart() {
      //var jsonData = $.ajax({
         // url: "getData.php",
         // dataType: "json",
         // async: false
         // }).responseText;
          
      // Create our data table out of JSON data loaded from server.
    //  var data = new google.visualization.DataTable(jsonData);
    var data = new google.visualization.DataTable(<?=$data?>);
var result = google.visualization.data.group(
  data,
  [2],
  [{'column': 1, 'aggregation': google.visualization.data.sum, 'type': 'number'}]
);
var result1 = google.visualization.data.group(
  data,
  [0],
  [{'column': 1, 'aggregation': google.visualization.data.sum, 'type': 'number'}]
);

var options = {
          title: 'Finca Karina Nomina Desglosada por Labores',
          pieHole: 0.4,
           width:400,
           height:300
        };

var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
        piechart.draw(result,options);



       var options1 = {
         title: 'Finca Karina Costo Nomina Diaria',
        curveType: 'function',
         legend: { position: 'bottom' },
         width:400,
           height:300
       };

  var linechart = new google.visualization.LineChart(document.getElementById('linechart_div'));
        linechart.draw(result1, options1);
      


       



      // Instantiate and draw our chart, passing in some options.
      //var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
     //   var chart = new google.visualization.PieChart(document.getElementById('curve_chart'));
      

      //chart.draw(data, {width: 400, height: 240});
     // chart.draw(data, options);

     // chart.draw(result, options);
    }

    </script>

    <body>
    <!--Table and divs that hold the pie charts-->
    <table class="columns">
      <tr>
        
        <td><div id="linechart_div" style="border: 1px solid #ccc"></div></td>
        <td><div id="piechart_div" style="border: 1px solid #ccc"></div></td>
      </tr>
    </table>
  </body>
</html>









