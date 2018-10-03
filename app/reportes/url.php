<?php



$json = '[{"0":"1","id_fruta":"1","1":"Manzana","nombre_fruta":"Manzana","2":"100","cantidad":"100"},{"0":"2","id_fruta":"2","1":"Platano","nombre_fruta":"Platano","2":"167","cantidad":"167"},{"0":"3","id_fruta":"3","1":"Pera","nombre_fruta":"Pera","2":"820","cantidad":"820"}]';

$array = json_decode($json);

print_r($array);


?>