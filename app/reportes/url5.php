<?php

$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
); 
//Json3
$data = file_get_contents('https://script.google.com/macros/s/AKfycbylSHr8NOb2vCYgPbRJMhtMQq67zT6KS6KutMOwYSP1OxHcwqY/exec?apiKey=1234&operation=GetTickers', false, stream_context_create($arrContextOptions));

echo $data;
$data_array = json_decode($data);







//echo "Una propiedad cualquiera:" . $data_array->records[1]->ticker;
//echo count($data_array->records)."<br>";





for ($x = 0; $x <= count($data_array->records)-1; $x++) {
	echo '<img src="'.$data_array->records[$x]->foto.'"/>';
echo  "Nombre es: " .$data_array->records[$x]->name ."<br>";





  for ($j=0; $j <=count ($data_array->records[$x]->items)-1 ; $j++) { 


  	echo "La fecha es: " .$data_array->records[$x]->items[$j]->fecha ."<br>";
  	
  }

	
    
} 



?>
