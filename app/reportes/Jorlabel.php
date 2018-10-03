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

$q=$_GET["f1"];
$qty=(int)$q;

   
 
 

 


for ($x =1; $x <$qty; $x++) {

  //$campo="06-";

//$numb=$x;

//echo(mt_rand(0,4294967295));

$num_str = sprintf("%06d", mt_rand(1, 999999));
$codigo =$num_str;

$codigo2='*' . substr($codigo ,1,5);
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
                     <table class ="table-condensed">
                       <thead>
                           <tr>
                             <th>Atipyca</th>
                             
                             </tr>
                        </thead>
                        <tbody>';

                        
                         $html2.='
  
    
 


                              <tr>
                                    
                                    
                                  <td> <img src="http://chart.apis.google.com/chart?cht=qr&chs=100x100&chl='.$codigo.'"></td>
                    
                               </tr>';
                          

                          

                         $html2.='
                         <tr>
                            
                            <td class="grand"><h2><b>'.$codigo.'</b></h2></th>
                            
                             
                         </tr>
                         
                       </tbody>
                   </table>

                  
                   
                   
                   
                 

                </main>';

         

         

         
              
                
                


                

} 




//$mpdf = new mPdf('',array(215.9,139.7),'','',5,5,10,5,5,5);

$mpdf = new mPdf('',array(50,43),'','',1,1,1,1,1,1);
//$mpdf = new mPdf('c','A4');
                
               

            // $mpdf->WriteHTML($css,1);
            $mpdf->WriteHTML($html2);


                



   
              $mpdf->Output('empleadoqr.pdf','I');


?>