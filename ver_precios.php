
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
include("funciones.php");

$query = "select * from alabscl_ventas.stock_general ORDER BY item ASC ;";     // Esta linea hace la consulta 
$result2 = mysql_query($query);  

echo "<BR><h4><STRONG>PRECIOS DE VENTA: </STRONG></h4> <br>";

echo '<TABLE  BORDER="1" class="table table-bordered">';

echo ' <TR>  <TD><STRONG>ITEM</STRONG> </TD>  <TD> <STRONG>PRECIO</STRONG></TD><TD><STRONG>COMISION </STRONG></TD> </TR> ';	
while ($row=mysql_fetch_array($result2))
{

echo '<TR> <TD> &nbsp &nbsp';
			 echo $row["item"]."&nbsp &nbsp</TD>" ;
			 			 
echo         '<TD> &nbsp &nbsp';

             echo number_format($row["precio"], 0, ",", ".")."&nbsp &nbsp</TD>" ;

echo        '<TD> &nbsp &nbsp';
			echo number_format(calcular_comision((int)$row["precio"]), 0, ",", ".")."&nbsp &nbsp</TD>" ;



echo  '</TR>';
      
};
echo '</TABLE>';

?> 
</div>
</body>
</html>