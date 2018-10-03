<?php

   require_once('../lib/pdf/mpdf.php');

    
   $mpdf = new mpdf('c','A4');
   $mpdf->WriteHTML('<p>Saludo</p>');
   $mpdf->Output('reporte.pdf','I');


?>

