
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

$query = "select * from alabscl_ventas.stock_oficina ;";     // Esta linea hace la consulta 
$result2 = mysql_query($query);  

echo "<strong><h3> STOCK OFICNA </h3></strong> <br>";

echo '<TABLE   class="table table-bordered">';
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
</div>
</html>