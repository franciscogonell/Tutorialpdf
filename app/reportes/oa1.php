<?php





set_time_limit(0);



   require_once('../lib/pdf/mpdf.php');

# Invoco el JSON desde la API


$data = file_get_contents('https://script.google.com/macros/s/AKfycbwU4tJyqA9i_R_fAmXMSErZw3wDqOdd5FUI3Cw-USsgjezsHdA/exec?apiKey=12345OA1&operation=GetTickers&ID='.$_GET["ID"].'');
$time = strtotime($_GET["f1"]);

$newformat = date('d-m-Y',$time);

//$time = strtotime($_GET["f2"]);

$newformat1 = date('d-m-Y',$time);






$data_array = json_decode($data);

$matches=count($data_array->records)-1;

$css=file_get_contents('css/style4.css');

$z=0;

   
 
 

 


for ($x =0; $x <= $matches; $x++) {


  


  $html2.= '
    <link rel="stylesheet" href="css/style6.css" media="all" />
  </head>
  <body>


  <header class="clearfix">
                   
                  
                  

        
                   </div>
                   <h1>ORDEN ABIERTA</h1>

                  
                  
                  



                   <div id="company" class="clearfix">


        
                 
                 </header>
                 <main>
                     <table class ="table-condensed">
                       <thead>
                           <tr>
                             <th class="desc">'.$data_array->records[$x]->cc. ' '.$data_array->records[$x]->name.' <i>'.$data_array->records[$x]->labor.'</i></th>
                             
                             </tr>
                        </thead>
                        <tbody>';

                        
                         $html2.='
  
    
 


                              <tr bgcolor= "'.$data_array->records[$x]->color.'">
                                    
                                    
                                  <td class="colorbody"><img src="http://chart.apis.google.com/chart?cht=qr&chs=80x80&chl='.$data_array->records[$x]->id.'"></td>
                    
                               </tr>';
                          

                          

                         $html2.='
                         <tr>
                            
                            <td class="grand"><h2><b>'.$data_array->records[$x]->id .'</b></h2></th>
                            
                             
                         </tr>
                         
                       </tbody>
                   </table>

                  
                   
                   
                   
                 

                </main>';

         

         

         
              
                
                


                

} 




//$mpdf = new mPdf('',array(215.9,139.7),'','',5,5,10,5,5,5);

$mpdf = new mPdf('',array(70,70),'','',1,1,1,1,1,1);
//$mpdf = new mPdf('c','A4');
                
               

            // $mpdf->WriteHTML($css,1);
            $mpdf->WriteHTML($html2);


                



   
              $mpdf->Output('ordenqr.pdf','I');


?>

