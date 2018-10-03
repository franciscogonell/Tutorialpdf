<?php

require_once('../lib/pdf/mpdf.php');

$z=0;
$campo= $_GET["f1"];
$q=$_GET["f2"];
$qty=(int)$q;

   
 
 

 


for ($x =0; $x <$qty; $x++) {

  //$campo="06-";

//$numb=$x;

//echo(mt_rand(0,4294967295));

$num_str = sprintf("%06d", mt_rand(1, 999999));
$codigo =$campo . $num_str ;
//echo "<br>";

//$code="01-17NA-566178";
$htm.= '

<head>


</head>
 <main>
                     <table>
                       <thead>
                           <tr>
                             <th></th>
                             
                             </tr>
                        </thead>
                        <tbody>';

                        $htm.='
<body>
<table >
	<tbody>
	<tr> 
	<td >
	<div>
	

	

   
<barcode code="'.$codigo.'" type="C39" size="0.5" height="2.0" />





	</div>';
	$htm.='
	<tr>
                            
                            <td style="text-align: center;">'.$codigo.'</td>
                            
                             
                         </tr>';
    $htm.='
	</td>
	</tr>
	</tbody>
</table>
</body>
';
}


$mpdf = new mPdf('',array(40,16),'','',1,1,1,1,1,1);
//$mpdf = new mPdf();
$mpdf->WriteHTML($htm);
$mpdf->Output("Sample 9999999.pdf","I");
exit;
?>