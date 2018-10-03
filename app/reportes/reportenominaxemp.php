<?php

   require_once('../lib/pdf/mdf.php');
   $mpdf = new mPdf('c','A4');
   $mpdf->writeHTML('<div>Hola..... </div>');
   $mpdf->output('reporte.pdf','I');


?>
