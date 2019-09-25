
 
<html>
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		
<body>
<div class="container">

<?php
//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");

include("verificar_sesion.php");
include("conexion.php");

$query = "select * from alabscl_ventas.despachos WHERE (fecha >= '".date("Y-m")."-01 00:00:00') ORDER BY fecha DESC;";     // Esta linea hace la consulta 
//echo $query."<br>";
$result = mysql_query($query);  

echo "</B>DESPACHOS:  ". date("d/m/Y") ."</B> <br><br>";
	
while ($row=mysql_fetch_array($result))
{            
          if (($row["empresa"] != 'FACTURA')  && ($row["flag_factura"] != 'BOLETA'))
             
			 {
             echo "_________________________________________________________________<br><br>";
			 // echo  "FECHA DE INGRESO DESPACHO: ".$row["fecha"]."<br><br>";
            
             echo "<B>FECHA: </B>".$row["fecha"]."<br>" ;
			 echo "<B>ITEM:</B> ".$row["item"]."</font></B><br>" ;
 			 echo "<B>EMPRESA: </B> ".$row["empresa"]."</font></B><br>" ;
			 echo "<B>PARA: </B>".$row["destinatario"]."<br>" ;
			 echo "<B>EMAIL: </B>".$row["correo"]."<br>" ;
			 echo "<B>CELULAR: </B>".$row["fono"]."<br>" ;
             echo "<B>DIRECCION: </B>".$row["direccion"]."<br><br>" ;
			 echo '<B>RASTREO: </B> <a href=" http://www.alabs.cl/rastreos/'.$row["rastreo"].'"> IR </a><br><br>' ;
			 echo "<B>RUT FACTURA: </B>".$row["rut_factura"]."<br><br>" ;
			 echo '<B>FACTURA: </B> <a href=" http://www.alabs.cl/rastreos/'.$row["factura"].'"> IR </a><br><br>' ;
                     
			 
			 }  
};

?> 
</body>
</html>