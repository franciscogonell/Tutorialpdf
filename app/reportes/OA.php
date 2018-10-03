<?php





set_time_limit(0);



   require_once('../lib/pdf/mpdf.php');

# Invoco el JSON desde la API


$data = file_get_contents('https://script.google.com/macros/s/AKfycbzTVcX68Ax0i-vd2DKQtI5YYQbzISAXQ9CoIq8I5MPKXu26u2g/exec?apiKey=1234OA&operation=GetTickers');


$data_array = json_decode($data);

$matches=count($data_array->records)-1;

$css=file_get_contents('css/style6.css');

$z=0;

$hoy=Date("d/m/Y");

$html2.= '
    <link rel="stylesheet" href="css/style6.css" media="all" />
  </head>
  <body>


  <header class="clearfix">
                   <div id="logo">
                   <img src="img/farm.png">
                  

        
                   </div>
                   <h2>REPORTE DE ORDENES ABIERTAS AL '.$hoy.'</h2>';

                  
                  
                  

   
 
 

 


for ($x =0; $x <= $matches; $x++) {


  $html2.='


  


                   <div id="company" class="clearfix">


        
                   <div id="project">
                      
                      
                  
                      <div> <h1><span></span>'. $data_array->records[$x]->cc. ' '. $data_array->records[$x]->name.'</h1></div>
        
                     
                   </div>
                 </header>
                 <main>
                     <table class ="table-condensed">
                       <thead>
                           <tr>
                             <th class="service">PRIORIDAD</th>
                             <th class="desc">ORDEN ID</th>
                             <th class="desc">LABOR</th>
                             <th class="desc">DESDE</th>
                             <th>HASTA</th>
                             <th>DIAS HAB.</th>
                             <th>META</th>
                             <th>COMPLETADO</th>
                             <th>PORC(%)</th>



                            
                             </tr>
                        </thead>
                        <tbody>';

                        $totalordenes=0;
                        $porc=0;
                        

                        for ($j = 0; $j <= count ($data_array->records[$x]->items) -1; $j++) {
                          $totalordenes=$totalordenes+1;
                          $porc=$data_array->records[$x]->items[$j]->completado/$data_array->records[$x]->items[$j]->meta;
                          
                         $html2.='
  
    
 


                              <tr bgcolor= "'.$data_array->records[$x]->items[$j]->color.'">
                                    
                                     <td class="colorbody">'.$data_array->records[$x]->items[$j]->prioridad.'</td>
                                    <td class="colorbody">'.$data_array->records[$x]->items[$j]->OrdenID .'</td>
                                    
                                    <td  class="colorbody">'.$data_array->records[$x]->items[$j]->labor.' ('.$data_array->records[$x]->items[$j]->unidad.')</td>
                                    <td class="colorbody">'.$data_array->records[$x]->items[$j]->fechaini.'</td>
                                    <td class="colorbody">'.$data_array->records[$x]->items[$j]->fechafin.'</td>
                                    <td class="colorbody">'.number_format($data_array->records[$x]->items[$j]->dias,0).'</td>
                                    
                                    <td class="colorbody">'.number_format($data_array->records[$x]->items[$j]->meta,2).'</td>
                                    <td class="colorbody">'.number_format($data_array->records[$x]->items[$j]->completado,2).'</td>
                                    
                                    <td class="colorbody">'.number_format($porc*100,2).'</td>';


                                   // '<td> <class= "desc"><img src="http://chart.apis.google.com/chart?cht=qr&chs=80x80&chl='.$data_array->records[$x]->items[$j]->OrdenID.'"></td>
                                   

                                  
                               $html2.='     
                                    
                                    
                               </tr>';
                          

                          }

                         $html2.='
                         <tr>
                            <td class="service">Ordenes Abiertas ('.number_format($totalordenes,0).')</th>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           
                            
                         </tr>
                         
                       </tbody>
                   </table>

                  
                   
                   
                   
                 

                </main>';

         //$html2 .= '"<pagebreak />"';

         

         
              
                
                


                

} 




//$mpdf = new mPdf('',array(215.9,139.7),'','',5,5,10,5,5,5);

$mpdf = new mPdf('',array(215.9,279.4),'','',5,5,10,5,5,5);
$mpdf = new mPdf('c','Letter-L');
                
               

            // $mpdf->WriteHTML($css,1);
            $mpdf->WriteHTML($html2);


                



   
              $mpdf->Output('ordenesabiertas.pdf','I');


?>

