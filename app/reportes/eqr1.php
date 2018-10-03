<?php





set_time_limit(0);



   require_once('../lib/pdf/mpdf.php');

# Invoco el JSON desde la API


$data = file_get_contents('https://script.google.com/macros/s/AKfycbxmgeQ0cPK-bgX0zvHIYWpHs89sykxCZPuxxpj8bWddJZzAm3M/exec?apiKey=12345f&operation=GetTickers&e1='.$_GET["e1"].'');



$time = strtotime($_GET["f1"]);

$newformat = date('d-m-Y',$time);

//$time = strtotime($_GET["f2"]);

$newformat1 = date('d-m-Y',$time);






$data_array = json_decode($data);

$matches=count($data_array->records)-1;

$css=file_get_contents('css/style4.css');

echo $matches

$z=0;

   
 
 

 





?>

