

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


$query = "select * from alabscl_ventas.stock_kati ORDER BY item ASC ;";     // Esta linea hace la consulta 
$result = mysql_query($query);  


   echo '<TABLE  class="table table-bordered">';
   echo ' <TR>  <TD> &nbsp &nbsp <strong>ITEM </strong></TD>  <TD> <strong>CANTIDAD</strong></TD><TR> ';

	while ($row=mysql_fetch_array($result))
	  {
	$row["item"];  
	
	$query = "select cantidad from alabscl_ventas.stock_kati WHERE item='".$row["item"]."';";     // Esta linea hace la consulta 
    $result1 = mysql_query($query);  
	//echo  $query."<BR>";
	
	$query = "select cantidad from alabscl_ventas.stock_general WHERE item='".$row["item"]."';";     // Esta linea hace la consulta 
    $result2 = mysql_query($query); 
	//echo  $query."<BR>";
	
	$query = "select cantidad from alabscl_ventas.stock_oficina WHERE item='".$row["item"]."';";     // Esta linea hace la consulta 
    $result3 = mysql_query($query); 
	//echo  $query."<BR>";

    $row1=mysql_fetch_array($result1);
	$row2=mysql_fetch_array($result2);
	$row3=mysql_fetch_array($result3);
	
	
	echo '<TR> <TD> &nbsp &nbsp';
	
    echo $row["item"]."&nbsp &nbsp</TD>" ;
			 
	echo    '<TD> &nbsp &nbsp';

    echo  (int)$row2["cantidad"]- (int)$row1["cantidad"]-(int)$row3["cantidad"]."&nbsp &nbsp</TD>" ;
						 
	echo     '</TR>';
	
	  };
					

?> 
</body>
</html>