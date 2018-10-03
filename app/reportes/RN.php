<?php

 /*
     * filtering an array
     */
    



set_time_limit(0);



   require_once('../lib/pdf/mpdf.php');

# Invoco el JSON desde la API
$nomina= array();


$time2=strtotime($_GET["f2"]);



$newformat2 = date('d-m-Y',$time2);



$fecha = $newformat2;
$nuevafecha = strtotime ( '+1 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'm/d/Y' , $nuevafecha );
 
//echo $nuevafecha;

//$discount_start_date = '03/27/2012 18:47';    
//$start_date = date('Y-m-d H:i:s', strtotime($discount_start_date));



//$data = file_get_contents('https://script.google.com/macros/s/AKfycbylSHr8NOb2vCYgPbRJMhtMQq67zT6KS6KutMOwYSP1OxHcwqY/exec?apiKey=1234&operation=GetTickers');

//$data = file_get_contents('https://script.google.com/macros/s/AKfycbwcwCvTi9VWWGc-A4tPerRWe41RcRGpcD_f_bfedUNtcWnyBupd/exec?apiKey=1234f&operation=GetTickers&f1='.$_GET["f1"].'&f2='.$_GET["f2"].'');

$data = file_get_contents('https://script.google.com/macros/s/AKfycbwcwCvTi9VWWGc-A4tPerRWe41RcRGpcD_f_bfedUNtcWnyBupd/exec?apiKey=1234f&operation=GetTickers&f1='.$_GET["f1"].'&f2='.$nuevafecha.'');




$time = strtotime($_GET["f1"]);

$newformat = date('d-m-Y',$time);

$time= strtotime($_GET["f2"]);

//$time=$time+1;
//echo date($time;

$newformat1 = date('d-m-Y',$time);








$data_array = json_decode($data);

$matches=count($data_array->records)-1;

$css=file_get_contents('css/style4.css');

$z=0;







   
 
 

 





  

                 for ($x =0; $x <= $matches; $x++) { 

                    
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

//echo $data_array->records[$x]->ticker;
$nomina[$x] = array('codigo'=> $data_array->records[$x]->ticker, 'name'=>$data_array->records[$x]->name, 'horas'=> $totalhoras,'bruto'=>$totalbruto,'he'=>$totalhorasextras,'vhe'=>$vhorasextras,'tss'=>$vtss,'neto'=>$totalbruto+$vhorasextras-$vtss);

//echo $nomina[$x]['codigo'];
//echo $nomina.count;





// esto devolver el valor CodeHero, ya que especificamos la fila numero 1 y la columna autor


                         
                         
                         
                        
                       
                       // $totalhorasextras,2);
                       // $vhorasextras;
                       // $vtss;

                          //  ;
                            
                             
                       
} 

$nominacount=count($nomina)-1;

  $totalbruto=0;
  $totalhoras=0;
  $totalhorasextras=0;
  $vhorasextras=0;
  $vtss=0;
    $vneto=0;



  


  $html2.= '
    <link rel="stylesheet" href="css/style7.css" media="all" />
  </head>
  <body>


  <header class="clearfix">
                   <div id="logo">
                   <img src="img/farm.png">
                  

        
                   </div>
                   <h1>REPORTE DE NOMINA POR PAGAR</h1>

                  
                  <div id="project">
                      
                      
                     
        
                     <div><span>DESDE </span>'.$newformat.'</div>
                     <div><span>HASTA </span>'.$newformat1.'</div>
                   </div>
                  



                   

                 </header>
                 <main>
                     <table>
                       <thead>
                           <tr>
                             <th class="service">CODIGO</th>
                             <th class="desc">NOMBRE EMPLEADO</th>
                             <th class="desc">HRS NORMALES</th>
                             <th class="desc">BRUTO</th>
                             <th>HORAS EXTRAS</th>
                             <th>VALOR</th>
                             <th>TSS</th>
                             <th>NETO A PAGAR</th>
                          
                             </tr>
                        </thead>
                        <tbody>';

                        for ($x =0; $x <= $nominacount; $x++) {

                           $totalbruto=$totalbruto+$nomina[$x]['bruto'];
                          $totalhoras=$totalhoras+$nomina[$x]['horas'];
                          $totalhorasextras=$totalhorasextras+$nomina[$x]['he'];
                          $vhorasextras=$vhorasextras+$nomina[$x]['vhe'];
                          $vtss=$vtss+$nomina[$x]['tss'];
                           $vneto=$vneto+$nomina[$x]['neto'];



                        
                         $html2.='
  
    
 


                              <tr>
                                    <td class="desc">'.$nomina[$x]['codigo'].'</td>
                                    <td class="desc">'.$nomina[$x]['name'].'</td>
                                     <td class="total">'.number_format($nomina[$x]['horas'],2).'</td>
                                     <td class="total">$'.number_format($nomina[$x]['bruto'],2).'</td>
                                     <td class="total">'.number_format($nomina[$x]['he'],2).'</td>
                                     <td class="total">$'.number_format($nomina[$x]['vhe'],2).'</td>
                                     <td class="tss">('.number_format($nomina[$x]['tss'],2).')</td>
                                     <td class="total">$'.number_format($nomina[$x]['neto'],2).'</td>
                                   
                                  
                                    
                                    
                                    
                               </tr>';
                          

                          }

                         $html2.='
                         <tr>
                         <td></td>
                         <td></td>
                            <td class="total"><b>'.number_format($totalhoras,2).'</b></th>
                            <td class="total"><b>$'.number_format( $totalbruto,2).'</b> </th>
                            <td class="total"><b>'.number_format( $totalhorasextras,2).'</b> </th>
                            <td class="total"><b>$'.number_format( $vhorasextras,2).'</b> </th>
                            <td class="tss"><b>($'.number_format( $vtss,2).')</b> </th>
                            <td class="total"><b>$'.number_format( $vneto,2).'</b> </th>


                            
                             
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
                            <td colspan="8" class="grand total">.</td>
                            
                          </tr>
                       </tbody>
                   </table>

                  
                   
                   
                   
                 

                </main>';

         

         

         
              
                
                


                






//$mpdf = new mPdf('',array(215.9,139.7),'','',5,5,10,5,5,5);

//$mpdf = new mPdf('',array(215.9,139.7),'','',5,5,10,5,5,5);


                $mpdf = new mPdf('',array(215.9,139.7),'','',5,5,10,5,5,5);
               // $mpdf = new mPdf('c','Letter-L');
//$mpdf = new mPdf('c','A4');
                
               

            // $mpdf->WriteHTML($css,1);
            $mpdf->WriteHTML($html2);


                



   
              $mpdf->Output('reporte.pdf','I');




?>

