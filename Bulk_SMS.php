<?php

//include("verificar_sesion.php");

include("conexion.php");

$clave= $_POST['CLAVE'];
$user= $_POST['USER'];
$clave_bd='';
$query = "select * from alabscl_ventas.usuarios WHERE USER='".$user."' ;";     // Esta linea hace la consulta 

//echo $query;

$result2 = mysql_query($query);

while ($row=mysql_fetch_array($result2))
{ 
$clave_bd =$row['clave'];
$home  = $row['home']; 

};

if (($clave == $clave_bd) && ($clave <> '') && ($clave <> null) )
	
	{

	$query = "select fono,fecha from alabscl_ventas.despachos ORDER BY fecha DESC ;";
//echo $query."<br>";
	$result = mysql_query($query);  


	while ($row=mysql_fetch_array($result))
		{         
	             if( strlen($row["fono"]) > 8)
				 {
	              //if ($row["fono"] =! null)
 			   	  //echo $row["fono"];
			      $number = $row["fono"];
				  //fwrite($file, "Otra mas" . PHP_EOL);
				  echo  $number."<br>";				 
				 }

	$query = "select celular FROM alabscl_ventas.pre_comprador ORDER BY fecha DESC ;";
		}
//echo $query."<br>";

	$result = mysql_query($query);  


	while ($row=mysql_fetch_array($result))
		{         
	             if( strlen($row["celular"]) > 8)
				 {
	              //if ($row["fono"] =! null)
 			   	  //echo $row["fono"];
			      $number = $row["celular"];
				  //fwrite($file, "Otra mas" . PHP_EOL);
				  echo  $number."<br>";				 
				 }					 


//Please note options is no required and can be left out
//sleep(1);
//$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);
	}
	//echo 'Finalizado'."<br>";
	}
	else
		
		{
		echo 'ERROR PASSWORD';	
		}
?> 