<?php
set_time_limit(0);

$openCon = file_get_contents('http://atipyca.ddns.net:9000/datasnap/rest/TBasicoGeneral/GetAuth/{"email":"atipyca@gmail.com ","password": "c68ed28840e7a94e9e5f95f7242c4585", "idmaquina":"229440"}//1013/');

echo  $openCon

$JSONLogIn = json_decode($openCon);
//$Param_Key = $JSONLogIn->result[0]->respuesta->datos->keyagente;
//$Param_Key = "1FB5556C34";

//$Param_JSON =urlencode('{"accion":"NEW","operaciones":[{"itdoper":"PLA5"}]}');
$Param_IApp ='1013';
//$Param_Random ='1';

//$new=file_get_contents('http://atipyca.ddns.net:9000/datasnap/rest/TCatOperaciones/DoExecuteOprAction/'.$Param_JSON.'/'.$Param_Key.'/'.$Param_IApp.'/'.$Param_Random);

$cuerpoJSON = file_get_contents('https://script.google.com/macros/s/AKfycbzgQCLYxCeZb581AFZhfIY2KxYcYyU66k8yZopfPiDuXjBWVJ4/exec?apiKey=123456&operation=GetTickers');
//$cuerpoJSON1=urlencode($cuerpoJSON);
//echo '<br>'.$cuerpoJSON.'<br>';
$Param_JSON= '{"accion":"SAVE","operaciones":[{"inumoper":"369","itdoper":"PLA5"}],"oprdata":'.$cuerpoJSON.'}';


//echo '<br>'.$Param_JSON.'<br>';
$Param_JSON= urlencode($Param_JSON);




$save=file_get_contents('http://atipyca.ddns.net:9000/datasnap/rest/TCatOperaciones/DoExecuteOprAction/'.$Param_JSON.'/'.$Param_Key.'/'.$Param_IApp.'/1/');
$ver='http://atipyca.ddns.net:9000/datasnap/rest/TCatOperaciones/DoExecuteOprAction/'.$Param_JSON.'/'.$Param_Key.'/'.$Param_IApp.'/1/';

//echo '<br>'.$save.'<br/>';

echo $ver;
//$data_array = json_decode($save);


//echo print_r($data_array);

//echo $data_array->result[0]->encabezado->respuesta->datos->inumoper;


//echo $data_array->result[0]->respuesta->datos->inumoper;

?>



