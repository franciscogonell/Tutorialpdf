<?php





set_time_limit(0);


$x=($_GET["sid"]);

$key=($_GET["operkey"]);



$i=($_GET["opc"]);

$fi=($_GET["d1"]);

$ff=($_GET["d2"]);

function get_dns($GSSid)
{
$conn=file_get_contents('https://script.google.com/macros/s/AKfycbzTRxeEJwtbyALikPloRTh4XiqIsYjkbC0oK2l-DRlyRc6_s9Qa/exec?apiKey=123456ASW&operation=GetTickers&id='.$GSSid.'');
$xconn=json_decode($conn);
return $xconn;


}
$connphp= get_dns($x);


$data= file_get_contents('https://script.google.com/macros/s/AKfycbzS9szH9B02Tm1f5OZBDOgQ_Of5tvFMkKhQ5WPu5VVC0JBSz8E/exec?apiKey=123456fr&operation=GetTickers&id='.$_GET["sid"].'&operkey='.$_GET["operkey"].'');

        //https://script.google.com/macros/s/AKfycbzOdnKMg6TqgSvp5nZKWreqmdIlXc7kX0H7gQ5iprWUlvZvHpgY/exec?apiKey=123456dr&operation=GetTickers&id=1F0ZhiHp0CASzUAjjCLu5Pj2E_k6wOtZxFm19SQCZiQU&operkey=VdVwpzRx

        $dec=json_decode($data);


        $dec=json_decode($data);

        //echo "res :" .$dec->encabezado->resultado."";


//$resultin = json_decode($result);

//echo $result;

        echo $data;



if ($dec->encabezado->resultado =="OK") {
  //  echo "Have a good day!";
echo "pum";
//$data = file_get_contents('https://script.google.com/macros/s/AKfycbzOdnKMg6TqgSvp5nZKWreqmdIlXc7kX0H7gQ5iprWUlvZvHpgY/exec?apiKey=123456dr&operation=GetTickers&id='.$_GET["sid"].'&operkey='.$_GET["operkey"].'');

//echo $data;

switch ($i) {
    case "Comprobante Nomina":

    //http://atipyca.ddns.net:81/tutorialpdf/app/reportes/nomina5.php?f1=11/28/2016&f2=11/28/2016

        echo '<br>'."i is 1".'</br>';
        //header ("Location: http://www.google.com");

         header ('Location: '.$connphp->encabezado->dns.':'.$connphp->encabezado->port.'/tutorialpdf/app/reportes/nomina5.php?f1='.$fi.'&f2='.$ff.'');
//header ("Location:http://atipyca.ddns.net:81/tutorialpdf/app/reportes/nomina5.php?");

        // $data = file_get_contents('https://script.google.com/macros/s/AKfycbwcwCvTi9VWWGc-A4tPerRWe41RcRGpcD_f_bfedUNtcWnyBupd/exec?apiKey=1234f&operation=GetTickers&f1='.$_GET["f1"].'&f2='.$nuevafecha.'');
        

        break;
    case "Resumen Nomina":
        echo '<br>'."i is 2".'</br>';
        header ('Location: '.$connphp->encabezado->dns.':'.$connphp->encabezado->port.'/tutorialpdf/app/reportes/RN.php?f1='.$fi.'&f2='.$ff.'');
        break;
    case "Ordenes Abiertas":
        echo "i is 3";
        header ('Location: '.$connphp->encabezado->dns.':'.$connphp->encabezado->port.'/tutorialpdf/app/reportes/oa.php');
        

        break;
    case "Graficos":
        echo "i is 4";
        header ('Location: '.$connphp->encabezado->dns.':'.$connphp->encabezado->port.'/tutorialpdf/app/reportes/GX1.php?f1='.$fi.'&f2='.$ff.'');
        
        break;
    case "Nomina Agrowin":
        echo "i is 5";
        echo $connphp->encabezado->dns;

       // header ('Location: http://atipyca.ddns.net:81/tutorialpdf/app/reportes/agente1.php?id='.$x.'');
       header ('Location:'.$connphp->encabezado->dns.':'.$connphp->encabezado->port.'/tutorialpdf/app/reportes/agente1.php?id='.$x.'');

        break;
    case "Borrar":
        echo "i is 6";


        $data = file_get_contents('https://script.google.com/macros/s/AKfycbzOdnKMg6TqgSvp5nZKWreqmdIlXc7kX0H7gQ5iprWUlvZvHpgY/exec?apiKey=123456dr&operation=GetTickers&id='.$_GET["sid"].'&operkey='.$_GET["operkey"].'');

        //https://script.google.com/macros/s/AKfycbzOdnKMg6TqgSvp5nZKWreqmdIlXc7kX0H7gQ5iprWUlvZvHpgY/exec?apiKey=123456dr&operation=GetTickers&id=1F0ZhiHp0CASzUAjjCLu5Pj2E_k6wOtZxFm19SQCZiQU&operkey=VdVwpzRx

         echo $data;


       //header ('Location: http://atipyca.ddns.net:81/tutorialpdf/app/reportes/agente1.php');
        break;

    case "Encontrar":
        echo "i is 7";


        $data= file_get_contents('https://script.google.com/macros/s/AKfycbzS9szH9B02Tm1f5OZBDOgQ_Of5tvFMkKhQ5WPu5VVC0JBSz8E/exec?apiKey=123456fr&operation=GetTickers&id='.$_GET["sid"].'&operkey='.$_GET["operkey"].'');

        //https://script.google.com/macros/s/AKfycbzOdnKMg6TqgSvp5nZKWreqmdIlXc7kX0H7gQ5iprWUlvZvHpgY/exec?apiKey=123456dr&operation=GetTickers&id=1F0ZhiHp0CASzUAjjCLu5Pj2E_k6wOtZxFm19SQCZiQU&operkey=VdVwpzRx

        $dec=json_decode($data);

        echo "res :" .$dec->encabezado->resultado."";
         


       //header ('Location: http://atipyca.ddns.net:81/tutorialpdf/app/reportes/agente1.php');
        break;
}

} else{
   echo "URL no valida";
}





?>

