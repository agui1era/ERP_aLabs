
<?php

include("verificar_sesion.php");

 ?> 
<html>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<body>

<?php
//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
include("conexion.php");

$query = "select * from alabscl_ventas.stock_general ORDER BY item ASC;";     // Esta linea hace la consulta 
$result2 = mysql_query($query);  
$precio_total=0;
$inventario_neto=0;
$utilidad_total=0;
echo "<strong><h3>STOCK TOTAL</h3></strong> :  <br>";

echo '<TABLE  class="table table-bordered">';
echo ' <TR>  <TD> <strong>ITEM </strong></TD>  <TD> <strong>CANTIDAD</strong></TD><TR> ';
while ($row=mysql_fetch_array($result2))
{

echo '<TR> <TD> &nbsp &nbsp';
			 echo $row["item"]."&nbsp &nbsp</TD>" ;
			 
echo         '<TD> &nbsp &nbsp';

             echo $row["cantidad"]."&nbsp &nbsp</TD>" ;
						 

echo     '</TR>';

};
echo '</TABLE>';


?> 
</body>
</html>