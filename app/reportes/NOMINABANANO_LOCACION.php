<?php
set_time_limit(0);
require_once('../lib/pdf/mpdf.php');

$s=($_GET["sheetid"]);

$n=($_GET["nominaid"]);

$loc=($_GET["locid"]);
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);


$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);

//echo $s;

//Establecer filtro
$response=file_get_contents('https://script.google.com/macros/s/AKfycbz3Vl0nph9tkHeq6vDsWoypdsyHL2zq1BYuOEclvtnGnYgAlXMq/exec?apiKey=123456&operation=GetTickers&sheetid='.$s.'&nominaid='.$n.'&locid='.$loc.'', false, stream_context_create($arrContextOptions));

$data = file_get_contents('https://script.google.com/macros/s/AKfycbwblcpTR10UJSwxL0Xfdqt5vzxSC_swjTPB-syZ6AEN2USYjWI/exec?apiKey=1234f&operation=GetTickers&sheetid='.$s.'', false, stream_context_create($arrContextOptions));

//echo $data;

$data_array = json_decode($data);

$matches=count($data_array->records)-1;

$css=file_get_contents('css/style4.css');

$z=0;

   
 
 

 


for ($x =0; $x <= $matches; $x++) {


  


  $html2.= '
    <link rel="stylesheet" href="css/style4.css" media="all" />
  </head>
  <body>


  <header class="clearfix">
                   <div id="logo">
                   <img src="'. $data_array->records[0]->logo.'">
                  

        
                   </div>
                   <h1>COMPROBANTE DE NOMINA AGRICOLA</h1>

                  
                
              

                   <div id="company" class="clearfix">


        
                   <div id="project">
                      

                      <div><h2>'.$data_array->records[$x]->locacion.'</h2></div>
                      <div><h2>'. $data_array->records[$x]->ticker.' '. $data_array->records[$x]->name.'</h2></div>
                      
                       <div>'. $data_array->records[$x]->fecha.'</div>
        
                    
                   </div>
                 </header>
                 <main>
                     <table class ="table-condensed">
                       <thead>
                           <tr>
                             <th class="total">TAREA ID</th>
                             <th class="service">FECHA</th>
                             <th class="total">CC</th>
                             <th class="desc">LABOR</th>
                             <th class="desc">CANTIDAD</th>
                             <th class="desc">COSTO</th>
                             <th>VALOR</th>
                             
                             </tr>
                        </thead>
                        <tbody>';

                        $totalcantidad=0;
                        $totalvalors=0;
                        

                        for ($j = 0; $j <= count ($data_array->records[$x]->items) -1; $j++) {
                          $totalcantidad=$totalcantidad+$data_array->records[$x]->items[$j]->cantidad;
                          $totalvalors=$totalvalors+$data_array->records[$x]->items[$j]->bruto;
                         
                         $html2.='
  
    
 


                              <tr>
                                    <td class="total"><b>'.$data_array->records[$x]->items[$j]->tarea .'</b></td>
                                    <td class="service">'.$data_array->records[$x]->items[$j]->fecha .'</td>
                                    <td class="total">'.$data_array->records[$x]->items[$j]->cc.'</td>
                                    <td class="desc">'.$data_array->records[$x]->items[$j]->nlabor.'</td>
                                    <td class="total">'.number_format($data_array->records[$x]->items[$j]->cantidad,0).'</td>
                                    <td class="total">$'.number_format($data_array->records[$x]->items[$j]->costo,2).'</td>
                                    <td class="total">$'.number_format($data_array->records[$x]->items[$j]->bruto,2).'</td>

                                  
                                    
                                    
                                    
                               </tr>';
                          

                          }

                         $html2.='
                         <tr>
                            
                          
                            <td></td>
                            <td></td>
                             <td></td>
                            <td></td>
                            
                             
                              <td></td>
                              <td></td>
                            
                             <td class="total"><b>$'.number_format($totalvalors,2).'</b></th>
                         </tr>
                         <tr>
                             <td></td>
                              <td></td>

                             
                         </tr>
                         <tr>
                         <td></td>
                         <td></td>
                            
                         </tr>
                         <tr >
                            
                          </tr>
                       </tbody>
                   </table>

                  
                   
                   
                   
                 

                </main>';

         $html2 .= '"<pagebreak />"';

         

         
              
                
                


                

} 




//$mpdf = new mPdf('',array(215.9,139.7),'','',5,5,10,5,5,5);

$mpdf = new mPdf('',array(215.9,139.7),'','',5,5,10,5,5,5);
//$mpdf = new mPdf('c','A4');
                
               

            // $mpdf->WriteHTML($css,1);
            $mpdf->WriteHTML($html2);


                



   
              $mpdf->Output('reporte.pdf','I');



?>

