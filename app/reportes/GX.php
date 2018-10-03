<?php

 /*
     * filtering an array
     */
    



set_time_limit(0);



   


$data = file_get_contents('https://script.google.com/macros/s/AKfycbxsI2T451zDOE7C1qeVU2y8P7XQKfTTBIo4pYGexso5EaDw9Lzl/exec?apiKey=123456fx&operation=GetTickers&f1='.$_GET["f1"].'&f2='.$_GET["f2"].'');

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



       var options = {
          title: 'Finca Karina Comportamiento Nomina Diaria',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

      // Instantiate and draw our chart, passing in some options.
      //var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
      //chart.draw(data, {width: 400, height: 240});
      chart.draw(data, options);
    }

    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->

    <div id="curve_chart" style="width: 450px; height: 300px"></div>
    <!--<div id="chart_div"></div>-->
  </body>
</html>