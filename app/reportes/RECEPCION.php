<?php
set_time_limit(0);

//$x=($_GET["id"]);

//Obtener proveedores
$Proveedor= file_get_contents('https://script.google.com/macros/s/AKfycbzDeOaBkr-3ioMa6UM4DUzhdTXWWbtfue0ne39761zaS9nDGz4/exec?apiKey=1234fx&operation=GetTickers');

$Proveedores = json_decode($Proveedor);

$matches =count($Proveedores->resultado)-1;

//echo '<br>'.$matches.'<br>';

$x=0;

for ($x =0; $x <= $matches; $x++) {

$porc=($x+1)/($matches+1)*100;

//$Proveedores = $JSONLogIn->result[0]->respuesta->datos->keyagente;

//echo '<br>'.$Proveedores->resultado[$x]->Proveedor.'<br>';

//echo '<br>'.$init.'" %"<br>';


$init=$Proveedores->resultado[$x]->Proveedor;


//Asignar Proveedor

//Write2cell
$bu=file_get_contents('https://script.google.com/macros/s/AKfycbwEL4pq_GUgzE1-s189cNEH1mgKq46-WMTOTulZhdd221tmeeGD/exec?apiKey=123456&operation=GetTickers&operkey=123&id='.$init.'');


//Obterner keyagente;
$openCon = file_get_contents('http://atipyca.sytes.net:9002/datasnap/rest/TBasicoGeneral/GetAuth/{"email":"atipyca@gmail.com ","password": "73acd9a5972130b75066c82595a1fae3", "idmaquina":"229440"}//1013/');

$JSONLogIn = json_decode($openCon);

$Param_Key = $JSONLogIn->result[0]->respuesta->datos->keyagente;

echo '<br>'.$Param_Key.'<br>';

//Obetener numero Operacion

$Param_JSON =urlencode('{"accion":"NEW","operaciones":[{"itdoper":"ORD6"}]}');
$Param_IApp ='1013';
$Param_Random ='1';

//Crea una recepcion de materiales

///$newOper = file_get_contents('http://atipyca.sytes.net:9002/datasnap/rest/TCatOperaciones/DoExecuteOprAction/{"accion":"NEW","operaciones":[{"itdoper":"ORD6"}]}/'.$Param_Key.'/'.$Param_IApp.'/');

//Crea una factura de compras

$newOper = file_get_contents('http://atipyca.sytes.net:9002/datasnap/rest/TCatOperaciones/DoExecuteOprAction/{"accion":"NEW","operaciones":[{"itdoper":"COM1"}]}/'.$Param_Key.'/'.$Param_IApp.'/');



//echo '<br>'.$newOper.'<br>';

$NEW_JSON=json_decode($newOper);

 $numOper=$NEW_JSON->result[0]->respuesta->datos->inumoper;




//echo '<br>'.$numOper.'<br>';
$itdsop=$NEW_JSON->result[0]->respuesta->datos->itdsop;
//echo '<br>'.$itdsop.'<br>';
$tr='32';

//sleep for 5 seconds
//usleep(20000000);

//Banano.Recepcion

///$cuerpoJSON = file_get_contents('https://script.google.com/macros/s/AKfycbysrQR01ZA_sGc9nskdvmqCO1E3Mg9oY_2HsTURaq_pE_fptGs/exec?apiKey=123456&operation=GetTickers&operkey='.$numOper.'&id='.$init.'');

//BANANO.COMPRA
$cuerpoJSON = file_get_contents('https://script.google.com/macros/s/AKfycbwssyoyAJr6o9pi5shXGELFhCojwm5iMQZ0FHnU5xJVKrNYvtU/exec?apiKey=123456&operation=GetTickers&operkey='.$numOper.'&id='.$init.'');




//echo $cuerpoJSON;

//inserta una recepcion de materiales.

///$Param_JSON= '{"accion":"SAVE","operaciones":[{"inumoper":"'.$numOper.'","itdoper":"ORD6"}],"oprdata":'.$cuerpoJSON.'}';

//inserta una factura de compras

$Param_JSON= '{"accion":"SAVE","operaciones":[{"inumoper":"'.$numOper.'","itdoper":"COM1"}],"oprdata":'.$cuerpoJSON.'}';



//echo '<br>'.$Param_JSON.'</br>';
$ver='http://atipyca.sytes.net:9002/datasnap/re


?>st/TCatOperaciones/DoExecuteOprAction/'.$Param_JSON.'/'.$Param_Key.'/'.$Param_IApp.'/1/';
//echo '<br>'.$ver.'<br/>';

$Param_JSON= urlencode($Param_JSON);
//echo $Param_JSON;

$save=file_get_contents('http://atipyca.sytes.net:9002/datasnap/rest/TCatOperaciones/DoExecuteOprAction/'.$Param_JSON.'/'.$Param_Key.'/'.$Param_IApp.'/1/');
//$ver='http://atipyca.sytes.net:9001/datasnap/rest/TCatOperaciones/DoExecuteOprAction/'.$Param_JSON.'/'.$Param_Key.'/'.$Param_IApp.'/1/';

//echo '<br>'.$save.'<br/>';





}

echo '<br>'.$matches.'" socio"<br>';

?>