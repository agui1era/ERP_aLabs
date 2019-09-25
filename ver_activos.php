
<?php

include("verificar_sesion.php");

 ?>                               
<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<body><BR>
<div class="container">
<?php
//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
include("conexion.php");

$res=mysql_query("select * FROM alabscl_ventas.activos  ORDER BY FECHA DESC;");




echo '<TABLE  class="table table-bordered">';

echo ' <TR>  <TD> <strong>FECHA </strong></TD>  <TD><strong> INVENTARIO</strong> </TD><TD> <strong>CAJA </strong></TD><TD> <strong>TOTAL </strong></TD>  </TR> ';
while ($row=mysql_fetch_array($res))
{

echo '<TR> <TD> &nbsp &nbsp';
			 echo $row["fecha"]."&nbsp &nbsp</TD>" ;
			 
echo         '<TD> &nbsp &nbsp';

             echo number_format($row["inventario"], 0, ",", ".")."&nbsp &nbsp</TD>" ;

echo         '<TD> &nbsp &nbsp';

             echo number_format($row["caja"], 0, ",", ".")."&nbsp &nbsp</TD>" ;
             
echo         '<TD> &nbsp &nbsp';

             echo number_format(($row["inventario"]+$row["caja"]), 0, ",", ".")."&nbsp &nbsp</TD>" ;
echo     '</TR>';

};

?> 
</div>
</body>
</html>
                            