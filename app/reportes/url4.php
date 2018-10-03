<?php

$data = file_get_contents('https://script.google.com/macros/s/AKfycbycwJEbq3y-lzm431xpl8UUahUsDswjYfOHcNBNubrFdT7ZPyQ/exec?apiKey=123457&operation=GetTickers');


$data_array = json_decode($data);





echo "Una propiedad cualquiera:" . $data_array->records[1]->ticker;
echo count($data_array->records)."<br>";



for ($x = 0; $x <= count($data_array->records)-1; $x++) {


	echo "The number is: " .count ($data_array->records[$x]->items) ."<br>";
    
} 



?>
