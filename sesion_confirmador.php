<?php
$clave= $_POST['CLAVE'];

if (($clave== 'skypic66' ) ||($clave== 'kati135' )  )
 {
   session_start();
   $_SESSION['YYY'] = "OK";
   
   if ($clave== 'hkm123456')
    {
    header('Location:confirmador_html.php');
	}
	else
	{
	header('Location:notificadorSADSFS3435sdaWQW.php');
	}
 } 
 
 else
 
 {
 echo 'CLAVE NO VALIDA';
 }
 
  ?>
   
   