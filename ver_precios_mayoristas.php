
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

$query = "select * from alabscl_ventas.stock_general ;";     // Esta linea hace la consulta 
$result2 = mysql_query($query);  

echo "<BR><h4><STRONG>PRECIOS DE VENTA MAYORISTA: </STRONG></h4> <br>";

echo '<TABLE  BORDER="1" class="table table-bordered">';

echo ' <TR>  <TD><STRONG>ITEM</STRONG> </TD>  <TD> <STRONG>PRECIO</STRONG></TD><TD> <STRONG>STOCK</STRONG></TD>  </TR> ';	
while ($row=mysql_fetch_array($result2))
{

	echo '<TR> <TD> &nbsp &nbsp';
			 echo $row["item"]."&nbsp &nbsp</TD>" ;
			 			 
	echo         '<TD> &nbsp &nbsp';


	if ((0.1*$row["precio"]) < 20000)
		{
		$precio =  $row["precio"]-0.1*$row["precio"];
		}
		else
		{
		$precio = $row["precio"] - 20000;			
		};

		echo        number_format(($precio), 0, ",", ".")."&nbsp &nbsp</TD>" ;

        echo ' <TD> &nbsp &nbsp';
		
		if ($row["cantidad"] > 0)
		  {
	       echo " SI &nbsp &nbsp</TD>";
		  }
		  else
		  {
	       echo " NO &nbsp &nbsp</TD>";
		  };
			  
		echo  '</TR>';
      
		};
		echo '</TABLE>';

?> 
</div>
</body>
</html>