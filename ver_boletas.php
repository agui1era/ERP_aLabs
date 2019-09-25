
<?php

include("verificar_sesion.php");

 ?>  
 
<html>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">


<body>
<div class="container">
<?php
//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
include("conexion.php");

$query = "select * from alabscl_ventas.despachos WHERE fecha >= '".date("Y-m")."-01 00:00:00' AND flag_factura ='BOLETA' ORDER BY FECHA DESC;";     // Esta linea hace la consulta 
$result2 = mysql_query($query);  

echo "<strong><h3> BOLETAS MES </h3></strong> <br>";

$query = "select sum(monto) from alabscl_ventas.despachos WHERE fecha >= '".date("Y-m")."-01 00:00:00' AND flag_factura ='BOLETA' ;";     // Esta linea hace la consulta 
$result3 = mysql_query($query);
$row2=mysql_fetch_array($result3);
echo "<strong> TOTAL: $".number_format(round($row2[0]), 0, ",", ".")."</strong>";

echo " <br><br>";

echo '<TABLE   class="table table-bordered">';
while ($row=mysql_fetch_array($result2))
{
	
echo '<TR> <TD> &nbsp &nbsp';

			 echo $row["fecha"]."&nbsp &nbsp</TD>" ;

echo        '<TD> &nbsp &nbsp';

			 echo $row["item"]."&nbsp &nbsp</TD>" ;
			 
echo        '<TD> &nbsp &nbsp';

			 echo  "$".number_format(round( $row["monto"]), 0, ",", ".");

echo     '</TR>';
      
};
echo '</TABLE>';

?> 
</body>
</div>
</html>