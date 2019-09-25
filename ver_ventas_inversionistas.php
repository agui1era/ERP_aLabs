
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

$res=mysql_query("select sum(precio) from alabscl_ventas.registro_ventas_inversionistas;");
$row=mysql_fetch_array($res);
echo "<STRONG>SALDO <font color=\"red\">".number_format($row[0], 0, ",", ".")."</font><br><br></STRONG>"; 


//$res=mysql_query("select sum(Depositos) from alabscl_ventas.registro_depositos;");
//$row=mysql_fetch_array($res);

//echo "DEPOSITO:  <font color=\"red\">".$row[0]."</font><br>"; 

//$diff  = (int)$aux_cobro-(int)$row[0];//-(int)$comision_total;
//echo "DIFERENCIA:  <font color=\"red\">".$diff."</font><br><br>"; 

$query = "select * from alabscl_ventas.registro_ventas_inversionistas  ORDER BY FECHA DESC LIMIT 100;";     // Esta linea hace la consulta 
$result = mysql_query($query);  
echo "<STRONG>REGISTRO DE VENTAS Y TRASNFERENCIAS:</STRONG>  <br><br>";
echo '<TABLE   class="table table-bordered">';

echo ' <TR> <TD><STRONG>FECHA<STRONG/> </TD> <TD><STRONG>ITEM</STRONG></TD><TD><STRONG>CANTIDAD</STRONG></TD> <TD><STRONG>PRECIO</STRONG></TD> </TR> ';
while ($row=mysql_fetch_array($result))
{

echo '<TR> <TD> &nbsp &nbsp';
			 echo $row["fecha"]."&nbsp &nbsp</TD>" ;
			 
echo         '<TD> &nbsp &nbsp';

             echo $row["producto"]."&nbsp &nbsp</TD>" ;

echo         '<TD> &nbsp &nbsp';

             echo $row["cantidad"]."&nbsp &nbsp</TD>" ;
             
echo         '<TD> &nbsp &nbsp';

             echo number_format($row[precio], 0, ",", ".")."&nbsp &nbsp</TD>" ;
		 

echo     '</TR>';


};
?> 
</body>
</html>
                            