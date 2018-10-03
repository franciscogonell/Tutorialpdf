<?php





set_time_limit(0);



   require_once('../lib/pdf/mpdf.php');

# Invoco el JSON desde la API


//$data = file_get_contents('https://script.google.com/macros/s/AKfycbxmgeQ0cPK-bgX0zvHIYWpHs89sykxCZPuxxpj8bWddJZzAm3M/exec?apiKey=12345f&operation=GetTickers&e1='.$_GET["e1"].'');
//$time = strtotime($_GET["f1"]);

//$newformat = date('d-m-Y',$time);

//$time = strtotime($_GET["f2"]);

//$newformat1 = date('d-m-Y',$time);






//$data_array = json_decode($data);

//$matches=count($data_array->records)-1;

$css=file_get_contents('css/style4.css');

$z=0;
$campo= $_GET["f1"];
$q=$_GET["f2"];
$qty=(int)$q;

   
 
 

 


for ($x =1; $x <$qty; $x++) {

  //$campo="06-";

//$numb=$x;

//echo(mt_rand(0,4294967295));

$num_str = sprintf("%06d", mt_rand(1, 999999));
$codigo =$campo . $num_str ;
//echo "<br>";


  


  $html2.= '
    <link rel="stylesheet" href="css/style4.css" media="all" />
  </head>
  <body>


  <header class="clearfix">
                   <div id="logo">
                  
                  

        
                   </div>
                   

               
                  



                  <div id="company" class="clearfix">


        
                 
                 </header>
                 <main>
                     <table>
                       <thead>
                           <tr>
                             <th></th>
                             
                             </tr>
                        </thead>
                        <tbody>';

                        
                         $html2.='
  
    
 


                              <tr>
                                    
                                    
                                  <td> <barcode code="'.$codigo.'" type="C39" size="0.5" height="1.5" /></td>
                    
                               </tr>';
                          

                          

                         $html2.='
                         <tr>
                            
                            <td>'.$codigo.'</td>
                            
                             
                         </tr>
                         
                       </tbody>
                   </table>

                  
                   
                   
                   
                 

                </main>';

         

         

         
              
                
                


                

} 




//$mpdf = new mPdf('',array(215.9,139.7),'','',5,5,10,5,5,5);

$mpdf = new mPdf('',array(40,13),'','',1,1,1,1,1,1);
//$mpdf = new mPdf('c','A4');
                
               

            // $mpdf->WriteHTML($css,1);
            $mpdf->WriteHTML($html2);


                



   
              $mpdf->Output('empleadoqr.pdf','I');


?>