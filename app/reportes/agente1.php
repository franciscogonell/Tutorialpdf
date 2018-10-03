<?php


	




  
set_time_limit(0);

function curl_get_contents($url)
{
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

// echo "El tamaño máximo de archivo en este servidor es ".ini_get("upload_max_filesize")."\n";
 //   echo "El POST más grande posible es ".ini_get("post_max_size");

$sid=($_GET["id"]);


echo $sid;



$conn= file_get_contents('https://script.google.com/macros/s/AKfycbyewJjIYqlvCSz-DXheZ1wkClgy6gw_t1iP9uF0e7ahdJjH-51h/exec?apiKey=123456ASW&operation=GetTickers&id='.$sid.'');

$xconn=json_decode($conn);


$dns=$xconn->encabezado->dns;
$email=$xconn->encabezado->email;
$idmaquina=$xconn->encabezado->idmaquina;
$pass=$xconn->encabezado->password;
echo $dns;

$openCon = file_get_contents('http://'.$dns.'/datasnap/rest/TBasicoGeneral/GetAuth/{"email":"'.$email.' ","password": "'.$pass.'", "idmaquina":"'.$idmaquina.'"}//1013/');





//echo  $openCon;

$JSONLogIn = json_decode($openCon);

$Param_Key = $JSONLogIn->result[0]->respuesta->datos->keyagente;

echo '<br>'.$Param_Key.'<br>';
//echo $Param_Key ;

$Param_JSON =urlencode('{"accion":"NEW","operaciones":[{"itdoper":"PLA5"}]}');
$Param_IApp ='1013';
$Param_Random ='1';

//echo $Param_JSON ;

//http://atipyca.ddns.net:9000/datasnap/rest/TCatOperaciones/DoExecuteOprAction/{"accion":"NEW","operaciones":[{"itdoper":"PLA5"}]}/1FB5556C34/1013/

$newOper = file_get_contents('http://'.$dns.'/datasnap/rest/TCatOperaciones/DoExecuteOprAction/{"accion":"NEW","operaciones":[{"itdoper":"PLA5"}]}/'.$Param_Key.'/'.$Param_IApp.'/');
echo $newOper ;

$NEW_JSON=json_decode($newOper);

 $numOper=$NEW_JSON->result[0]->respuesta->datos->inumoper;
echo '<br>'.$numOper.'<br>';
$itdsop=$NEW_JSON->result[0]->respuesta->datos->itdsop;
echo '<br>'.$itdsop.'<br>';



$cuerpoJSON = file_get_contents('https://script.google.com/macros/s/AKfycbzgQCLYxCeZb581AFZhfIY2KxYcYyU66k8yZopfPiDuXjBWVJ4/exec?apiKey=123456&operation=GetTickers&nop='.$numOper.'');

echo $cuerpoJSON;

$Param_JSON= '{"accion":"SAVE","operaciones":[{"inumoper":"'.$numOper.'","itdoper":"PLA5"}],"oprdata":'.$cuerpoJSON.'}';


$Param_JSON= urlencode($Param_JSON);
echo $Param_JSON;
//$url



//$save= file_get_contents('http://atipyca.ddns.net:9000/datasnap/rest/TCatOperaciones/DoExecuteOprAction/'.$Param_JSON.'/'.$Param_Key.'/'.$Param_IApp.'/1/');


//$json = json_decode(curl_get_contents('http://atipyca.ddns.net:9000/datasnap/rest/TCatOperaciones/DoExecuteOprAction/'.$Param_JSON.'/'.$Param_Key.'/'.$Param_IApp.'/1/'));

$url = 'http://'.$dns.'/datasnap/rest/TCatOperaciones/DoExecuteOprAction/'.$Param_JSON.'/'.$Param_Key.'/'.$Param_IApp.'/1/';
//$json = json_decode(curl_get_contents($url));

$json = (curl_get_contents($url));

echo $json;





echo $json;
//$json = json_decode(curl_get_contents($url))

///echo $save;





?>