
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

$query = "select * from alabscl_ventas.actualizaciones_stock ORDER BY fecha DESC ;";     // Esta linea hace la consulta 
$result2 = mysql_query($query);  


echo '<TABLE   class="table table-bordered">';
echo ' <TR>  <TD><strong>FECHA</strong> </TD>  <TD> <strong>ITEM <strong/></TD><TD><strong>NUEVO STOCK</strong></TD><TD><strong>STOCK ANTERIOR</strong></TD><TR> ';
while ($row=mysql_fetch_array($result2))
{

echo '<TR> <TD> &nbsp &nbsp';
			 echo $row["fecha"]."&nbsp &nbsp</TD>" ;
			 			 
echo         '<TD> &nbsp &nbsp';

             echo $row["item"]."&nbsp &nbsp</TD>" ;

echo         '<TD> &nbsp &nbsp';

             echo  $row["nuevo_stock"]."&nbsp &nbsp</TD>" ;

echo         '<TD> &nbsp &nbsp';

             echo $row["stock_anterior"]."&nbsp &nbsp</TD>";


echo     '</TR>';


}
?> 
</body>
</html>