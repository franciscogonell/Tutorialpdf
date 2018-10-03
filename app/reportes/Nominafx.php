<?php

 /*
     * filtering an array
     */
    



set_time_limit(0);

$nomina= array();

   //require_once('../lib/pdf/mpdf.php');
//require_once "GoogleCharts.php"; 

# Invoco el JSON desde la API
//$nomina= array();

//$data = file_get_contents('https://script.google.com/macros/s/AKfycbylSHr8NOb2vCYgPbRJMhtMQq67zT6KS6KutMOwYSP1OxHcwqY/exec?apiKey=1234&operation=GetTickers');

$data = file_get_contents('https://script.google.com/macros/s/AKfycbx2Y3uK9mbbxUvirfOHsXikg7bsNOnm5uHEWWeeuDFxP4HsjmQ/exec?apiKey=1234fx&operation=GetTickers&f1='.$_GET["f1"].'&f2='.$_GET["f2"].'');

//$time = strtotime($_GET["f1"]);

//$newformat = date('d-m-Y',$time);

//$time = strtotime($_GET["f2"]);

//$newformat1 = date('d-m-Y',$time);




$data_array = json_decode($data);


$matches=count($data_array)-1;

//print_r($data_array);
echo $matches;

//echo $data_array[0]->Fecha;

function getGoogleJsonDataFormat(array $result) {
    $header_check = false;


    $header = array();
    $rows = array();

    

    if (count($result)) {
    	  
        foreach ($result as $data) {
            if (!$header_check) {

             echo ("ddd");

                $count = 0;
                foreach (array_keys($data) as $value) {
                    $header[$count]['fecha'] = $value;
                    $header[$count]['type'] = 'string';
                    $count++;
                }
                $header_check = true;
            }
         
            $rows[] = $data;
        }
        $chart = new GoogleCharts(array(
                    'chart_type' => 'datatable',
                    'cols' => $header,
                    'rows' => $rows
                ));
        return $chart->getJSONString();
    } else {
        return 0;
    }
} 


for ($x =0; $x <= $matches; $x++) { 

	

$nomina[$x] = array('fecha'=> $data_array[$x]->Fecha, 'costo'=>$data_array[$x]->Costo);

}

$row= array();
//$row=$nomina;
//echo count($row);




//echo $jsondata = getGoogleJsonDataFormat($nomina); 

?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
  ["Fecha", "Costo"],
  ["25/11/2016", 450],
  ["26/11/2016", 1814.56],
  ["28/11/2016", 1918.54],
  ["29/11/2016", 3274.04],
  ["30/11/2016", 3165.61],
  ["02/12/2016", 2268.54],
  ["03/12/2016", 2896.29],
  ["04/12/2016", 6376.58],
  ["05/12/2016", 4322.3],
  ["06/12/2016", 5479.01],
  ["07/12/2016", 5211.68],
  ["08/12/2016", 3241.47],
  ["09/12/2016", 2423.13],
  ["10/12/2016", 1102.95],
  ["11/12/2016", 3339.25],
  ["12/12/2016", 2827.62],
  ["13/12/2016", 2855.29],
  ["14/12/2016", 3707],
  ["03/01/2017", 432.69],
  ["04/01/2017", 450],
  ["05/01/2017", 346.15],
  ["06/01/2017", 412.5],
  ["07/01/2017", 503.5],
  ["08/01/2017", 450],
  ["01/02/2017", 800],
  ["02/02/2017", 800]
]);

        var options = {
          title: 'Company Performance',
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