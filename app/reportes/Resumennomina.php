<?php



set_time_limit(0);



   require_once('../lib/pdf/mpdf.php');

# Invoco el JSON desde la API


$data = file_get_contents('https://script.google.com/macros/s/AKfycbylSHr8NOb2vCYgPbRJMhtMQq67zT6KS6KutMOwYSP1OxHcwqY/exec?apiKey=1234&operation=GetTickers');


$data_array = json_decode($data);

$matches=count($data_array->records)-1;

$css=file_get_contents('css/style4.css');

$z=0;

   
 
 

 





  


  $html2.= '
    <link rel="stylesheet" href="css/style4.css" media="all" />
  </head>
  <body>


  <header class="clearfix">
                   <div id="logo">
                   <img src="img/farm.png">
                  

        
                   </div>
                   <h1>COMPROBANTE DE NOMINA AGRICOLA</h1>

                  
                  
      

           

      

                   


        
                   <div id="project">
                      
                      
                     
        
                     <div><span>DESDE </span>'.$data_array->records[0]->fechas[0]->fechaini.'</div>
                     <div><span>HASTA1 </span>'.$data_array->records[0]->fechas[0]->fechafin.'</div>
                   </div>
                 </header>
                 <main>';
                  for ($x =0; $x <= $matches; $x++) { 

                    $html2.='
                     <table class ="table-condensed">
                       <thead>
                           <tr>
                             <th class="service">CODIGO</th>
                             <th class="desc">NOMBRE</th>
                             <th class="desc">H. NORM</th>
                             <th class="desc">TOTAL</th>
                             <th>H. EXTRAS</th>
                             <th>TOTAL</th>
                             <th>TSS</th>
                             <th>NETO</th>
                             </tr>
                        </thead>
                        <tbody>';

                        $totalbruto=0;
                        $totalhoras=0;
                        $totalhorasextras=0;
                        $vhorasextras=0;
                        $vtss=0;

                        for ($j = 0; $j <= count ($data_array->records[$x]->items) -1; $j++) {
                          $totalbruto=$totalbruto+$data_array->records[$x]->items[$j]->bruto;
                          $totalhoras=$totalhoras+$data_array->records[$x]->items[$j]->horas;
                          $totalhorasextras=$totalhorasextras+$data_array->records[$x]->items[$j]->hrsextras;
                          $vhorasextras=$vhorasextras+$data_array->records[$x]->items[$j]->vhorasextras;
                          $vtss=$vtss+$data_array->records[$x]->items[$j]->tss;
                        // $html2.='
  
    
 


                             // <tr>
                             //       <td class="service">'.$data_array->records[$x]->items[$j]->fecha .'</td>
                              //      <td class="desc">'.$data_array->records[$x]->items[$j]->nlabor.'</td>
                              //      <td class="desc">'.$data_array->records[$x]->items[$j]->cantidad.'</td>
                              //      <td class="desc">'.$data_array->records[$x]->items[$j]->cc.'</td>
                              //      <td class="total">'.number_format($data_array->records[$x]->items[$j]->horas,2).'</td>
                               //     <td class="total">$'.number_format($data_array->records[$x]->items[$j]->precio,2).'</td>
                               //     <td class="total">$'.number_format($data_array->records[$x]->items[$j]->bruto,2).'</td>

                                  
                                    
                                    
                                    
                              // </tr>';
                          

                          }

                         $html2.='
                         <tr>
                         <td class="desc"> '. $data_array->records[$x]->ticker.'</td>
                         <td class="desc"> '. $data_array->records[$x]->name.'</td>
                            <td class="service">'.number_format($totalhoras,2).'</th>
                            <td class="total">$'.number_format($totalbruto,2).'</td>
                            <td class="desc">'.number_format($totalhorasextras,2).'</th>
                            <td class="total">$'.number_format($vhorasextras,2).'</td>
                             <td class="tss">($'.number_format($vtss,2).')</td>

                             <td class="grand total">$'.number_format($totalbruto+$vhorasextras-$vtss,2).'</td>
                            
                             
                         </tr>';
                        // <tr>
                         //    <td></td>
                              

                            // <td colspan="4">HORAS EXTRAS</td>
                             
                        // </tr>
                        //// <tr>
                        // <td></td>
                       //  <td></td>
                         ////    <td colspan="4" class="tss">RETENCION TSS 5.91%</td>
                            
                       //////  </tr>
                        // <tr >
                            //<td colspan="6" class="grand total">TOTAL</td>
                         //   <td class="grand total">$'.number_format($totalbruto+$vhorasextras-$vtss,2).'</td>
                        //  </tr>
                   $html2 .= ' </tbody>
                   </table>

                  
                   
                   
                   
                 

                </main>';

        // $html2 .= '"<pagebreak />"';

         

         
              
                
                


                

} 




//$mpdf = new mPdf('',array(215.9,139.7),'','',5,5,10,5,5,5);

$mpdf = new mPdf('',array(215.9,139.7),'','',5,5,10,5,5,5);
//$mpdf = new mPdf('c','A4');
                
               

            // $mpdf->WriteHTML($css,1);
            $mpdf->WriteHTML($html2);


                



   
              $mpdf->Output('reporte.pdf','I');


?>

