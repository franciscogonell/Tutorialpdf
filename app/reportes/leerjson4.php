

<?php
$str_obj_json = '{
   "elemento1": "valor1",
   "elemento2": 22,
   "elemento3": null,
   "masCosas": {
      "voy": "ahora",
      "vengo": "ya",
      "otta": [ {
            "cometa": 1

      },{"cometa": 2}]
   }
}';
$obj_php = json_decode($str_obj_json);

echo "Una propiedad cualquiera:" . $obj_php->masCosas->otta[1]->cometa ." ". count($obj_php->masCosas->otta);
?> 