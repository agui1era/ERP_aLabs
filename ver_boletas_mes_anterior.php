
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

$fecha = date('Y-m');
$nuevafecha = strtotime ( '-1 month' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m' , $nuevafecha );

$fecha_final=  date("Y-m-t", strtotime($nuevafecha ."-01"));

$query = "select * from alabscl_ventas.despachos WHERE fecha >= '".$nuevafecha ."-01 00:00:00' AND fecha <= '". $fecha_final ." 23:59:59' AND flag_factura ='BOLETA' ORDER BY FECHA DESC;";     // Esta linea hace la consulta 
//echo $query;
$result2 = mysql_query($query);  

echo "<div class=\"container\">";
echo "<strong><h2> BOLETAS MES ANTERIOR</h2></strong> <br>";

$query = "select sum(monto) from alabscl_ventas.despachos WHERE fecha >= '".$nuevafecha ."-01 00:00:00 'AND fecha <= '". $fecha_final ." 23:59:59'  AND flag_factura ='BOLETA' ;";     // Esta linea hace la consulta 
//echo $query;
$result3 = mysql_query($query);
$row2=mysql_fetch_array($result3);
echo "<strong> TOTAL  : $".number_format(round($row2[0]), 0, ",", ".")."</strong><br><br>";
echo "<strong> NETO   : $".number_format(round($row2[0]/1.19), 0, ",", ".")."</strong><br><br>";
echo "<strong> IVA    : $".number_format(round(($row2[0]/1.19)*0.19), 0, ",", ".")."</strong><br><br>";

$query = "select count(monto) from alabscl_ventas.despachos WHERE fecha >= '".$nuevafecha ."-01 00:00:00 'AND fecha <= '". $fecha_final ." 23:59:59'  AND flag_factura ='BOLETA' ;";     // Esta linea hace la consulta 
//echo $query;
$result3 = mysql_query($query);
$row2=mysql_fetch_array($result3);

echo "<strong> CANTIDAD: ".$row2[0]."</strong>";

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
echo "</DIV>";
?> 
</body>
</div>
</html>