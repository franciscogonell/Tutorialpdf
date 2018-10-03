<?php

   require_once('../lib/pdf/mpdf.php');

# Invoco el JSON desde la API


$data = file_get_contents('https://script.google.com/macros/s/AKfycbycwJEbq3y-lzm431xpl8UUahUsDswjYfOHcNBNubrFdT7ZPyQ/exec?apiKey=123457&operation=GetTickers');


$data_array = json_decode($data);

$itera= count($data_array->records)-(count($data_array->records)-1);
for ($x = 0; $x <= $itera; $x++) {


  $html2.=    '<header class="clearfix">
                   <div id="logo">
                   <img src="img/gardener.png">
        
                   </div>
                   <h1>COMPROBANTE DE NOMINA AGRICOLA</h1>
                   <div id="company" class="clearfix">
        
                   <div id="project">
       
                      <div><span>CODIGO </span>'. $data_array->records[$x]->ticker.'</div>
                      <div><span>JORNALERO</span> '. $data_array->records[$x]->name.'</div>
        
                     <div>DATE August 17, 2015</div>
                     <div>DUE DATE</span> September 17, 2015</div>
                   </div>
                 </header>
                 <main>
                     <table class ="table-condensed">
                       <thead>
                           <tr>
                             <th class="service">FECHA</th>
                             <th class="desc">LABOR</th>
                             <th class="desc">CANTIDAD</th>
                             <th class="desc">CC</th>
                             <th>HORAS</th>
                             <th>PRECIO</th>
                             <th>BRUTO</th>
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
                         $html2.='
  
    
 


                              <tr>
                                    <td class="service">'.$data_array->records[$x]->items[$j]->fecha .'</td>
                                    <td class="desc">'.$data_array->records[$x]->items[$j]->nlabor.'</td>
                                    <td class="desc">'.$data_array->records[$x]->items[$j]->cantidad.'</td>
                                    <td class="desc">'.$data_array->records[$x]->items[$j]->cc.'</td>
                                    <td class="total">'.number_format($data_array->records[$x]->items[$j]->horas,2).'</td>
                                    <td class="total">$'.number_format($data_array->records[$x]->items[$j]->precio,2).'</td>
                                    <td class="total">$'.number_format($data_array->records[$x]->items[$j]->bruto,2).'</td>

                                  
                                    
                                    
                                    
                               </tr>';
                          

                          }

                         $html2.='
                         <tr>
                            <td class="service">Total de Horas Normales ('.number_format($totalhoras,2).')</th>
                            <td class="desc">Total de Horas Extras ('.number_format($totalhorasextras,2).')</th>
                            
                             <td colspan="4">SUBTOTAL</td>
                             <td class="total">$'.number_format($totalbruto,2).'</td>
                         </tr>
                         <tr>
                             <td colspan="6">HORAS EXTRAS</td>
                             <td class="total">$'.number_format($vhorasextras,2).'</td>
                         </tr>
                         <tr>
                             <td colspan="6" class="tss">RETENCION TSS 5.91%</td>
                             <td class="unit">($'.number_format($vtss,2).')</td>
                         </tr>
                         <tr >
                            <td colspan="6" class="grand total">GRAND TOTAL</td>
                            <td class="grand total">$'.number_format($totalbruto+$vhorasextras-$vtss,2).'</td>
                          </tr>
                       </tbody>
                   </table>

                    
                   
                   
                   
                 <div style="page-break-before:always"></div>

                </main>';



             
               
            
               

          

 
    
} 








   $mpdf = new mPdf('',array(215.9,139.7),'','',5,5,.5,5,5,5);



   $css=file_get_contents('css/style.css');
   $mpdf->WriteHTML($css,1);

   $mpdf->WriteHTML($html2);
   $mpdf->Output('reporte.pdf','I');


?>

