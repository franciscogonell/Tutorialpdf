<?php
set_time_limit(0);
require_once('../lib/pdf/mpdf.php');

$s=($_GET["sheetid"]);

$n=($_GET["nominaid"]);

$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
); 




//echo $s;

//Establecer filtro
//Establecer filtro
$response =file_get_contents('https://script.google.com/macros/s/AKfycbwxy6HKg_mFN-M-Kf0EibfzluaBA-5USztrQ8KPH6AXFeCOu8k/exec?apiKey=123456&operation=GetTickers&sheetid='.$s.'&nominaid='.$n.'', false, stream_context_create($arrContextOptions));

$data = file_get_contents('https://script.google.com/macros/s/AKfycbxnebxQarJFDPzV90Zd9gd1Aky-HuZiwGRrkdmVXSXhO_tuGaQ/exec?apiKey=1234f&operation=GetTickers&sheetid='.$s.'', false, stream_context_create($arrContextOptions));






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
$nomina[$x] = array('codigo'=> $data_array->records[$x]->ticker, 'name'=>$data_array->records[$x]->name, 'valor'=> $totalbruto,'finca'=>$data_array->records[$x]->locacion);

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
    $items=0;



  


  $html2.= '
    <link rel="stylesheet" href="css/style7.css" media="all" />
  </head>
  <body>


  <header class="clearfix">
                   <div id="logo">
                    <img src="img/banelino.png">
                  

        
                   </div>
                   <h1>REPORTE DE NOMINA POR PAGAR </h1>

                  
                  <div id="project">
                      
                      
                     <div><h2>'.$nomina[0]['finca'].'</h2></div>
        
                     
                   </div>
                  



                   

                 </header>
                 <main>
                     <table>
                       <thead>
                           <tr>
                             <th class="service">CODIGO</th>
                             <th class="desc">NOMBRE EMPLEADO</th>
                             
                             <th class="desc">BRUTO</th>
                            
                           
                          
                             </tr>
                        </thead>
                        <tbody>';

                        for ($x =0; $x <= $nominacount; $x++) {

                           $totalbruto=$totalbruto+$nomina[$x]['valor'];
                           $items=$items+1;
                          
                            


                        
                         $html2.='
  
    
 


                              <tr>
                                    <td class="desc">'.$nomina[$x]['codigo'].'</td>
                                    <td class="desc">'.$nomina[$x]['name'].'</td>
                                     
                                     <td class="total">$'.number_format($nomina[$x]['valor'],2).'</td>
                                     
                                   
                                  
                                    
                                    
                                    
                               </tr>';
                          

                          }

                         $html2.='
                         <tr>
                         <td class="desc"><b>('.$items.') Jornaleros</b></td>
                         <td></td>
                         
                            <td class="total"><b>$'.number_format( $totalbruto,2).'</b> </th>
                            


                            
                             
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

         

         
 $mpdf = new mPdf('',array(215.9,139.7),'','',5,5,10,5,5,5);
               // $mpdf = new mPdf('c','Letter-L');
//$mpdf = new mPdf('c','A4');
                
               

            // $mpdf->WriteHTML($css,1);
            $mpdf->WriteHTML($html2);


                



   
              $mpdf->Output('reportes.pdf','I');
         
              
                
                


                






//$mpdf = new mPdf('',array(215.9,139.7),'','',5,5,10,5,5,5);

//$mpdf = new mPdf('',array(215.9,139.7),'','',5,5,10,5,5,5);


               





?>

