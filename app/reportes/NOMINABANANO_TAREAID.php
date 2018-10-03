<?php
set_time_limit(0);
require_once('../lib/pdf/mpdf.php');

$s=($_GET["sheetid"]);

$filt=($_GET["filtro"]);

$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
); 

//echo $s;

//Obtener proveedores
//$Proveedor= file_get_contents('https://script.google.com/macros/s/AKfycbzDeOaBkr-3ioMa6UM4DUzhdTXWWbtfue0ne39761zaS9nDGz4/exec?apiKey=1234fx&operation=GetTickers');

//$Proveedores = json_decode($Proveedor);

$matches =0;

//echo '<br>'.$matches.'<br>';

$x=0;
$arreglo=array();
$rows=array();

for ($x =0; $x <= $matches; $x++) {


//$Proveedores = $JSONLogIn->result[0]->respuesta->datos->keyagente;

//echo '<br>'.$Proveedores->resultado[$x]->Proveedor.'<br>';




$sheet=$s;
//echo $sheet;

//Asignar Proveedor
//$bu=file_get_contents('https://script.google.com/macros/s/AKfycbykl530od78XPOvU6uXqGss3N9U8MmsfZVyAYd7UXtX9GK9mxg/exec?apiKey=123456&operation=GetTickers&id='.$init.'&email='.$e.'');

//$noper=123;

//sleep for 5 seconds
//usleep(20000000);
//$cuerpoJSON = file_get_contents('https://script.google.com/macros/s/AKfycby5MgJTy_svqtbVQCMM-MscE5myno83FV7sT6kP8h27pQvN6xGT/exec?apiKey=123456&operation=GetTickers&SheetId='.$sheet.'&filtro='.$filt.'');
$cuerpoJSON = file_get_contents('https://script.google.com/macros/s/AKfycby5MgJTy_svqtbVQCMM-MscE5myno83FV7sT6kP8h27pQvN6xGT/exec?apiKey=123456&operation=GetTickers&sheetid='.$s.'&filtro='.$filt.'',false, stream_context_create($arrContextOptions));





//echo $cuerpoJSON;

$t=json_decode($cuerpoJSON);

array_push($arreglo,$t);








}
//print_r($arreglo);

//print_r($arreglo);
echo $arreglo[0]->jornaleros[1]->costo;

$css=file_get_contents('css/style4.css');

$z=0;

   
 
 

 


for ($x =0; $x <= $matches; $x++) {


  


  $html2.= '
    <link rel="stylesheet" href="css/style4.css" media="all" />
  </head>
  <body>


  <header class="clearfix">
                   <div id="logo">
                   <img src="img/banelino.png">
                  

        
                   </div>
                   <h1>NOMINA AGRICOLA</h1>

                  
                  
                  



                   <div id="company" class="clearfix">


        
                   <div id="project">
                      
                      
                     <div><h2>'. $arreglo[$x]->datosprincipales->campo.' '. $arreglo[$x]->datosprincipales->locacion.'</h2></div>
                     
        
                     <div><span></span><i>'.$arreglo[$x]->datosprincipales->labor.'</i></div>

                    <div>'. $arreglo[$x]->datosprincipales->fecha.'</div>
                    <div>Orden ID:'. $arreglo[$x]->datosprincipales->tarea.'</div>
                    
                   </div>
                 </header>
                 <main>
                     <table class ="table-condensed">
                       <thead>
                           <tr>
                             <th class="total">CODIGO</th>
                             <th class="total">JORNALERO</th>
                             <th class="total">CANTIDAD LABOR</th>
                              <th class="total">UNIDAD</th>
                             <th class="total">COSTO</th>
                             <th class="total">VALOR</th>
                             
                             </tr>
                        </thead>
                        <tbody>';

                        $cantidad=0;
                        $totalcosto=0;
                        $totalitem=0;
                        

                        for ($j = 0; $j <= count ($arreglo[$x]->jornaleros) -1; $j++) {
                          $totalitem=$totalitem+1;
                          $cantidad=$cantidad+$arreglo[$x]->jornaleros[$j]->cantlabor;
                          $totalcosto=$totalcosto+$arreglo[$x]->jornaleros[$j]->valor;
                          
                         $html2.='
  
    
 


                              <tr>
                                    <td class="total">'.$arreglo[$x]->jornaleros[$j]->codigo.'</td>
                                    <td class="total">'.$arreglo[$x]->jornaleros[$j]->empn.'</td>
                                    <td class="total">'.number_format($arreglo[$x]->jornaleros[$j]->cantlabor,0).'</td>
                                    <td class="total">'.$arreglo[$x]->jornaleros[$j]->unidad.'</td>
                                    <td class="total">$'.number_format($arreglo[$x]->jornaleros[$j]->costo,2).'</td>
                                    <td class="total">$'.number_format($arreglo[$x]->jornaleros[$j]->valor,2).'</td>

                                  
                                    
                                    
                                    
                               </tr>';
                          

                          }

                         $html2.='
                         <tr>
                            
                            <td class="total"><b>'.number_format($totalitem,0).' item(s)</b></th>
                            <td></td>
                            
                            
                        

                            <td class="total"><b> '.number_format($cantidad,0).'</b></th>
                             <td></td>
                            
                             <td colspan="1"></td>
                             <td class="total"><b>$'.number_format($totalcosto,2).'</b></td>
                         </tr>
                         <tr>
                             <td></td>
                              <td></td>

                            
                         </tr>
                         <tr>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
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






$mpdf = new mPdf('',array(215.9,139.7),'','',5,5,10,5,5,5);

                
               

            
           $mpdf->WriteHTML($html2);


                



   
            $mpdf->Output('reporte.pdf','I');







?>

