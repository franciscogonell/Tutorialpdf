<?php
set_time_limit(0);
$openCon = file_get_contents('http://atipyca.sytes.net:9001/datasnap/rest/TBasicoGeneral/GetAuth/{"email":"atipyca@gmail.com ","password": "73acd9a5972130b75066c82595a1fae3", "idmaquina":"229440"}//1013/');

$JSONLogIn = json_decode($openCon);

$Param_Key = $JSONLogIn->result[0]->respuesta->datos->keyagente;

echo '<br>'.$Param_Key.'<br>';


$Param_JSON =urlencode('{"accion":"NEW","operaciones":[{"itdoper":"ORD5"}]}');
$Param_IApp ='1013';
$Param_Random ='1';

$newOper = file_get_contents('http://atipyca.sytes.net:9001/datasnap/rest/TCatOperaciones/DoExecuteOprAction/{"accion":"NEW","operaciones":[{"itdoper":"ORD5"}]}/'.$Param_Key.'/'.$Param_IApp.'/');
//echo $newOper ;

$NEW_JSON=json_decode($newOper);

 $numOper=$NEW_JSON->result[0]->respuesta->datos->inumoper;


echo '<br>'.$numOper.'<br>';
$itdsop=$NEW_JSON->result[0]->respuesta->datos->itdsop;
//echo '<br>'.$itdsop.'<br>';

$cuerpoJSON = '{
	"encabezado": {
		"iemp": "1",
		"inumoper": "838",
		"tdetalle": "Orden de compra al proveedor semana 5 de 31 -01 -2017 ",
		"itdsop": "510",
		"inumsop ": "4",
		"snumsop": "ORC-1707004",
		"fsoport": "22/07/2017",
		"iclasifop": "0",
		"imoneda": "10",
		"iprocess": "0",
		"banulada": "F",
		"svaloradic1": "",
		"svaloradic2": "",
		"svaloradic3": "",
		"svaloradic4": "",
		"svaloradic5": "",
		"svaloradic6": "",
		"svaloradic7": "",
		"svaloradic8": "",
		"svaloradic9": "",
		"svaloradic10": "",
		"svaloradic11": "",
		"svaloradic12": ""
	},
	"datosprincipales": {
		"init": "300",
		"initvendedor": "",
		"finicio": "22/07/2017",
		"qdias": "0",
		"ilistaprecios": "0",
		"iinventario": "1030",
		"sobserv": "",
		"bregvrunit": "T",
		"qporcdescuento": "0",
		"bregvrtotal": "F",
		"frmenvio": "0",
		"frmpago": "0",
		"condicion1": "0",
		"icuenta": "",
		"busarotramoneda": "F",
		"imonedaimpresion": "",
		"mtasacambio": "0",
		"icccxc": "",
		"qregfcobro": "0",
		"ireferencia": "",
		"bcerrarref": "F"
	},
	"listaproductos": [{
		"iinventario": "1030",
		"irecurso": "2030",
		"itiporec": "",
		"qrecurso": "3000.0000",
		"mprecio": "20.0000",
		"qporcdescuento": "85.0000",
		"qporciva": "0.0000",
		"mvrtotal": "9000.0000",
		"icc": "",
		"sobserv": "450",
		"dato1": "",
		"dato2": "",
		"dato3": "",
		"dato4": "",
		"dato5": "",
		"dato6": "",
		"valor1": "0.0000",
		"valor2": "0.0000",
		"valor3": "0.0000",
		"valor4": "0.0000",
		"QRecurso2": "0.0000"
	}],
	"formacobro": {
		"mtotalreg": "9000",
		"mtotalpago": "0",
		"fpagocaja": [],
		"fpagobanco": [
	],
	"fpagocxp": [],
	"fpagoamortcxc": []
	},
	"qoprsok": "0"

}';

//echo $cuerpoJSON;

$Param_JSON= '{"accion":"SAVE","operaciones":[{"inumoper":"'.$numOper.'","itdoper":"ORD5"}],"oprdata":'.$cuerpoJSON.'}';
echo '<br>'.$Param_JSON.'</br>';

$Param_JSON= urlencode($Param_JSON);
//echo $Param_JSON;

$save=file_get_contents('http://atipyca.sytes.net:9001/datasnap/rest/TCatOperaciones/DoExecuteOprAction/'.$Param_JSON.'/'.$Param_Key.'/'.$Param_IApp.'/1/');
$ver='http://atipyca.sytes.net:9001/datasnap/rest/TCatOperaciones/DoExecuteOprAction/'.$Param_JSON.'/'.$Param_Key.'/'.$Param_IApp.'/1/';

echo '<br>'.$save.'<br/>';

//echo $ver;

?>