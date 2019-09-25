 
<?php
$clave= $_POST['CLAVE'];
$user= $_POST['USER'];
$clave_bd='';
include("conexion.php");

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
	 
	session_start();
    $_SESSION['YYY'] = "OK";
	$location="Location:".$home;
	echo $location;
	header($location);
	

 } 
 
 else
 
 {
 echo 'CLAVE NO VALIDA';
 }
 
  ?>
   
   