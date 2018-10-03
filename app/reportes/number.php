<?php

for ($x =0; $x <= 3; $x++) {

	$campo="01-";

$numb=$x;

//echo(mt_rand(0,4294967295));

$num_str = sprintf("%06d", mt_rand(1, 999999));
echo $campo . $num_str ;
echo "<br>";

	}


?>