
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

$query = "select * from alabscl_ventas.stock_inversionistas ;";     // Esta linea hace la consulta 
$result2 = mysql_query($query);  
$precio_total=0;

echo "<br><br>";
echo "<b>  STOCK TOTAL: </b><br><br>";

echo '<TABLE  class="table table-bordered">';
echo ' <TR>  <TD>ITEM </TD>  <TD> CANTIDAD</TD><TD>PRECIO</TD><TD>SUB TOTAL</TD></</TR>';
while ($row=mysql_fetch_array($result2))
{

echo '<TR>';

             echo         '<TD> &nbsp &nbsp';

             echo         $row["producto"]."&nbsp &nbsp</TD>" ;

			 echo         '<TD> &nbsp &nbsp';

             echo  number_format($row["cantidad"], 0, ",", ".")."&nbsp &nbsp</TD>" ;

			 echo         '<TD> &nbsp &nbsp';

             echo number_format($row["monto_pago"], 0, ",", ".")."&nbsp &nbsp</TD>";
			 echo         '<TD> &nbsp &nbsp';

             echo number_format(($row["monto_pago"]*$row["cantidad"]), 0, ",", ".")."&nbsp &nbsp</TD>";
			 

echo     '</TR>';

$precio_total=$precio_total+((int)$row["monto_pago"]*(int)$row["cantidad"]);
     

};
echo '</TABLE>';
echo "<BR>";
echo "<B>INVENTARIO TOTAL:  <font color=\"red\">".number_format($precio_total, 0, ",", ".")."</font></B><br>"; 


?> 
</body>
</html>