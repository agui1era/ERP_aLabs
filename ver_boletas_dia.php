
<html>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<body>
<BR><BR>
<div class="container">
<?php
//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
include("conexion.php");
include("verificar_sesion.php");

$fecha = date('Y-m-j');
$nuevafecha = strtotime ( '+1 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
 
//echo $nuevafecha;

$query = "select * from alabscl_ventas.despachos WHERE (fecha >= '".$nuevafecha." 00:00:00') AND (fecha <='".$nuevafecha." 23:59:59')  ORDER BY fecha DESC;";     // Esta linea hace la consulta 
//echo $query."<br>";
$result = mysql_query($query);  



echo "<B>BOLETAS MANANA </B> <br><br>";
	
while ($row=mysql_fetch_array($result))
{            
           if ($row["empresa"] != 'FACTURA' )
				 
	        {
             
             echo "_________________________________________________________________<br><br>";
			 // echo  "FECHA DE INGRESO DESPACHO: ".$row["fecha"]."<br><br>";
             echo "</B><font color=\"red\">EMPRESA: ".$row["empresa"]."</font></B><br>" ;
			 echo "</B><font color=\"blue\">ITEM: ".$row["item"]."</font></B><br>" ;
			 echo "<B>MONTO: </B> $".number_format($row["monto"], 0, ",", ".")."<br><br><br>" ;
			 
            
            }
			     
};


?> 
</div>
</body>
</html>