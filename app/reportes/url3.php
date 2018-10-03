<?php

$data = file_get_contents('https://script.google.com/macros/s/AKfycbycwJEbq3y-lzm431xpl8UUahUsDswjYfOHcNBNubrFdT7ZPyQ/exec?apiKey=123457&operation=GetTickers');


$data_array = json_decode($data);

print_r($data_array);








?>
