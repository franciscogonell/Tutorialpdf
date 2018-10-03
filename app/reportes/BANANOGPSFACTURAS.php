<?php
set_time_limit(0);
require_once('../lib/pdf/mpdf.php');

//$x=($_GET["id"]);

//Obtener proveedores
$Proveedor= file_get_contents('https://script.google.com/macros/s/AKfycbzDeOaBkr-3ioMa6UM4DUzhdTXWWbtfue0ne39761zaS9nDGz4/exec?apiKey=1234fx&operation=GetTickers');

$Proveedores = json_decode($Proveedor);

$matches =count($Proveedores->resultado)-1;

//echo '<br>'.$matches.'<br>';

$x=0;
$arreglo=array();
$rows=array();

for ($x =0; $x <= $matches; $x++) {


//$Proveedores = $JSONLogIn->result[0]->respuesta->datos->keyagente;

//echo '<br>'.$Proveedores->resultado[$x]->Proveedor.'<br>';




$init=$Proveedores->resultado[$x]->Proveedor;

//Asignar Proveedor
$bu=file_get_contents('https://script.google.com/macros/s/AKfycbzflhIqi-dDLQ5p9QNnXy5AVw-l4ciQcjS_wDWh2Gcp90XQWvc/exec?apiKey=123456&operation=GetTickers&id='.$init.'');

$noper=123;

//sleep for 5 seconds
//usleep(20000000);
$cuerpoJSON = file_get_contents('https://script.google.com/macros/s/AKfycbzl2-XL_PMrZBTB1vCAXrMcL-sehoO7syLG8R3qMH_Cg_sCOy2v/exec?apiKey=123456&operation=GetTickers&operkey='.$noper.'&id='.$init.'');

$t=json_decode($cuerpoJSON);


array_push($arreglo,$t);








}
//print_r($arreglo);

//print_r($arreglo);
echo $arreglo[4]->listaproductos[1]->precio;

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
                   <h1>RECEPCION DE FRUTA</h1>

                  
                  
                  



                   <div id="company" class="clearfix">


        
                   <div id="project">
                      
                      
                     <div><h2>'. $arreglo[$x]->datosprincipales->init.'</h2></div>
                      <div><span></span><b>'. $arreglo[$x]->datosprincipales->nproductor.'</b></div>
        
                     <div><span></span><i>'.$arreglo[$x]->datosprincipales->tdetalle.'</i></div>
                    
                   </div>
                 </header>
                 <main>
                     <table class ="table-condensed">
                       <thead>
                           <tr>
                             <th class="total">ORDEN</th>
                             <th class="total">FECHA</th>
                             <th class="service">LOCACION</th>
                             <th class="total">ITEM</th>
                             <th class="desc">DESCRIPCION</th>
                             <th>CANTIDAD</th>
                             <th>PRECIO</th>
                             <th>TOTAL</th>
                             </tr>
                        </thead>
                        <tbody>';

                        $totaltotal=0;
                        $totalcantidad=0;
                        $totalitem=0;
                        

                        for ($j = 0; $j <= count ($arreglo[$x]->listaproductos) -1; $j++) {
                          $totalitem=$totalitem+1;
                          $totaltotal=$totaltotal+$arreglo[$x]->listaproductos[$j]->total;
                          $totalcantidad=$totalcantidad+$arreglo[$x]->listaproductos[$j]->qty;
                          
                         $html2.='
  
    
 


                              <tr>
                                    <td class="total">'.$arreglo[$x]->listaproductos[$j]->orden.'</td>
                                    <td class="total">'.$arreglo[$x]->listaproductos[$j]->fecha.'</td>
                                    <td class="service">'.$arreglo[$x]->listaproductos[$j]->locacion.'</td>
                                    <td class="desc">'.$arreglo[$x]->listaproductos[$j]->item.'</td>
                                    <td class="total">'.$arreglo[$x]->listaproductos[$j]->nitem.'</td>
                                    <td class="total">'.$arreglo[$x]->listaproductos[$j]->qty.'</td>
                                    <td class="total">$'.number_format($arreglo[$x]->listaproductos[$j]->precio,2).'</td>
                                    <td class="total">$'.number_format($arreglo[$x]->listaproductos[$j]->total,2).'</td>

                                  
                                    
                                    
                                    
                               </tr>';
                          

                          }

                         $html2.='
                         <tr>
                            
                            <td class="total"><b>'.number_format($totalitem,0).' item(s)</b></th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td class="total"><b> '.number_format($totalcantidad,0).'</b></th>
                            
                             <td colspan="1"></td>
                             <td class="total"><b>$'.number_format($totaltotal,2).'</b></td>
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

