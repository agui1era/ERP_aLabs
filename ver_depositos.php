

<?php

include("verificar_sesion.php");

 ?>  
<html>

<link rel="stylesheet" type="text/css" href="style.css" />
<body>

<?php
//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
include("conexion.php");
$res=mysql_query("select sum(Depositos) from alabscl_ventas.registro_depositos;");
$row=mysql_fetch_array($res);

echo "TOTAL:  <font color=\"red\">".$row[0]."</font><br><br>"; 

$query = "select * from alabscl_ventas.registro_depositos ORDER BY Fecha DESC;";     // Esta linea hace la consulta 
$result = mysql_query($query);  
echo "DEPOSITOS :  <br><br>";
echo '<TABLE  BORDER="1">';
while ($row=mysql_fetch_array($result))
{

echo '<TR> <TD> &nbsp &nbsp';
			 echo $row["Fecha"]."&nbsp &nbsp</TD>" ;
echo         '<TD> &nbsp &nbsp';

             echo $row["TIPO"]."&nbsp &nbsp</TD>" ;
			 
echo         '<TD> &nbsp &nbsp';

             echo $row["Depositos"]."&nbsp &nbsp</TD>" ;


echo     '</TR>';
      
};
echo '</TABLE>';

?> 
</body>
</html>