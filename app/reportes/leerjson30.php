

<?php
$str_obj_json = '{
   "resultado": [{
      "Proveedor": "460"
   }, {
      "Proveedor": "32"
   }, {
      "Proveedor": "10"
   }, {
      "Proveedor": "101"
   }, {
      "Proveedor": "1039"
   }, {
      "Proveedor": "1011"
   }, {
      "Proveedor": "160"
   }, {
      "Proveedor": "1003"
   }, {
      "Proveedor": "1025"
   }, {
      "Proveedor": "26"
   }, {
      "Proveedor": "1049"
   }, {
      "Proveedor": "190"
   }, {
      "Proveedor": "105"
   }]
}';
$obj_php = json_decode($str_obj_json);

print_r($obj_php);


echo "Una propiedad cualquiera:" . $obj_php->resultado[0]->Proveedor." ". count($obj_php->resultado);
?> 