
<?php

include("verificar_sesion.php");

 ?>                               
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



$res=mysql_query("select sum(PRECIO) from alabscl_ventas.registro_venta_directa WHERE TIPO='COBRO';");
$row=mysql_fetch_array($res);

echo "<STRONG>DIFERENCIA COBROS: <font color=\"red\">".number_format($row[0], 0, ",", ".")."</font><br><br></STRONG>"; 
$aux_cobro=$row[0];

//$res=mysql_query("select sum(Depositos) from alabscl_ventas.registro_depositos;");
//$row=mysql_fetch_array($res);

//echo "DEPOSITO:  <font color=\"red\">".$row[0]."</font><br>"; 

//$diff  = (int)$aux_cobro-(int)$row[0];//-(int)$comision_total;
//echo "DIFERENCIA:  <font color=\"red\">".$diff."</font><br><br>"; 

$query = "select * from alabscl_ventas.registro_venta_directa  ORDER BY FECHA DESC LIMIT 100;";     // Esta linea hace la consulta 
$result = mysql_query($query);  
echo "<STRONG>REGISTRO DE VENTAS Y DEPOSITOS:</STRONG>  <br><br>";
echo '<TABLE   class="table table-bordered">';

echo ' <TR>  <TD><STRONG>FECHA<STRONG/> </TD>  <TD><STRONG>ITEM</STRONG></TD><TD><STRONG>CANTIDAD</STRONG></TD> <TD><STRONG>TIPO</STRONG></TD> <TD><STRONG>COMISION</STRONG></TD> <TD><STRONG>PRECIO</STRONG></TD>  </TR> ';
while ($row=mysql_fetch_array($result))
{

echo '<TR> <TD> &nbsp &nbsp';
			 echo $row["FECHA"]."&nbsp &nbsp</TD>" ;
			 
echo         '<TD> &nbsp &nbsp';

             echo $row["ITEM"]."&nbsp &nbsp</TD>" ;

echo         '<TD> &nbsp &nbsp';

             echo $row["CANTIDAD"]."&nbsp &nbsp</TD>" ;
             
echo         '<TD> &nbsp &nbsp';

             echo $row["TIPO"]."&nbsp &nbsp</TD>" ;
echo         '<TD> &nbsp &nbsp';

             echo number_format($row["COMISION"], 0, ",", ".")."&nbsp &nbsp</TD>" ;
echo         '<TD> &nbsp &nbsp';

             echo number_format($row["PRECIO"], 0, ",", ".")."&nbsp &nbsp</TD>" ;				 

echo     '</TR>';


};
?> 
</div>
</body>
</html>