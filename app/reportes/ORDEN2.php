<?php
set_time_limit(0);

$x=($_GET["id"]);
echo '<br>'.$x.'<br>';
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
); 


$openCon = file_get_contents('http://atipyca.sytes.net:9001/datasnap/rest/TBasicoGeneral/GetAuth/{"email":"atipyca@gmail.com ","password": "73acd9a5972130b75066c82595a1fae3", "idmaquina":"229440"}//1013/');

$JSONLogIn = json_decode($openCon);

$Param_Key = $JSONLogIn->result[0]->respuesta->datos->keyagente;

echo '<br>'.$Param_Key.'<br>';


$Param_JSON =urlencode('{"accion":"NEW","operaciones":[{"itdoper":"ORD5"}]}');
$Param_IApp ='1013';
$Param_Random ='1';

$newOper = file_get_contents('http://atipyca.sytes.net:9001/datasnap/rest/TCatOperaciones/DoExecuteOprAction/{"accion":"NEW","operaciones":[{"itdoper":"ORD5"}]}/'.$Param_Key.'/'.$Param_IApp.'/');

echo '<br>'.$newOper.'<br>';

$NEW_JSON=json_decode($newOper);

 $numOper=$NEW_JSON->result[0]->respuesta->datos->inumoper;


echo '<br>'.$numOper.'<br>';
$itdsop=$NEW_JSON->result[0]->respuesta->datos->itdsop;
echo '<br>'.$itdsop.'<br>';

$cuerpoJSON = file_get_contents('https://script.google.com/macros/s/AKfycbyHW4tt1I3F10apItfbSUQPa6s1APvct5gHnjwmAnp8mdBCr4y1/exec?apiKey=123456&operation=GetTickers&operkey='.$numOper.'&id='.$x.'', false, stream_context_create($arrContextOptions));




echo $cuerpoJSON;

$Param_JSON= '{"accion":"SAVE","operaciones":[{"inumoper":"'.$numOper.'","itdoper":"ORD5"}],"oprdata":'.$cuerpoJSON.'}';
echo '<br>'.$Param_JSON.'</br>';
$ver='http://atipyca.sytes.net:9001/datasnap/rest/TCatOperaciones/DoExecuteOprAction/'.$Param_JSON.'/'.$Param_Key.'/'.$Param_IApp.'/1/';
echo '<br>'.$ver.'<br/>';

$Param_JSON= urlencode($Param_JSON);
//echo $Param_JSON;

$save=file_get_contents('http://atipyca.sytes.net:9001/datasnap/rest/TCatOperaciones/DoExecuteOprAction/'.$Param_JSON.'/'.$Param_Key.'/'.$Param_IApp.'/1/');
//$ver='http://atipyca.sytes.net:9001/datasnap/rest/TCatOperaciones/DoExecuteOprAction/'.$Param_JSON.'/'.$Param_Key.'/'.$Param_IApp.'/1/';

echo '<br>'.$save.'<br/>';

//echo $ver;

?>