

<?php
$str_obj_json = '{
  "records": [{
    "ticker": "03300395104",
    "name": "Leonel Payero",
    "items": [{
      "fecha": "01/02/2017",
      "cc": "1102RM",
      "nlabor": "Desyerbo",
      "cantidad": "1.00 Ta",
      "horas": 8,
      "precio": 50,
      "bruto": 400,
      "tss": 0,
      "hrsextras": 0,
      "vhorasextras": 0
    }, {
      "fecha": "02/02/2017",
      "cc": "1102RM",
      "nlabor": "Desyerbo",
      "cantidad": "1.00 Ta",
      "horas": 8,
      "precio": 50,
      "bruto": 400,
      "tss": 0,
      "hrsextras": 0,
      "vhorasextras": 0
    }]
  }, {
    "ticker": "04600193983",
    "name": "Marino Peralta",
    "items": [{
      "fecha": "02/02/2017",
      "cc": "1102RM",
      "nlabor": "Desyerbo",
      "cantidad": "1.00 Ta",
      "horas": 8,
      "precio": 50,
      "bruto": 400,
      "tss": 0,
      "hrsextras": 0,
      "vhorasextras": 0
    }]
  }, {
    "ticker": "05300370169",
    "name": "Juan Joel Pimentel Ramirez",
    "items": [{
      "fecha": "01/02/2017",
      "cc": "1102RM",
      "nlabor": "Desyerbo",
      "cantidad": "1.00 Ta",
      "horas": 8,
      "precio": 50,
      "bruto": 400,
      "tss": 0,
      "hrsextras": 0,
      "vhorasextras": 0
    }]
  }]
}';
$obj_php = json_decode($str_obj_json);




echo "Una propiedad cualquiera:" . $obj_php->records[1]->ticker;
echo count($obj_php->records);


?> 