
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
include("funciones.php");

$query = "select * from alabscl_ventas.stock_general ORDER BY item ASC ;";     // Esta linea hace la consulta 
$result2 = mysql_query($query);  
$precio_total=0;
$inventario_neto=0;
$utilidad_total=0;
const IVA = 0.19; 
const COMISION_ML = 0.12; 


echo "<h3>STOCK TOTAL:  </h3><br><br>";

echo '<TABLE  class="table table-bordered">';
echo ' <TR>  <TD>ITEM </TD>  <TD> CANTIDAD</TD><TD>PRECIO</TD><TD>MARGEN</TD><TD>COMISION</TD><TD>DESPUES DE COMISION</TD><TD>DESPUES DE ML</TD><TR> ';
while ($row=mysql_fetch_array($result2))
{

echo '<TR> <TD> &nbsp &nbsp';
			 echo $row["item"]."&nbsp &nbsp</TD>" ;
			 
echo         '<TD> &nbsp &nbsp';

             if ($row["cantidad"] > 2 )
			 {
			
             echo $row["cantidad"]."&nbsp &nbsp</TD>" ;
			 
			 }
			 else
			 {
				
             echo	"<font color=\"red\">".$row["cantidad"]."</font><br></TD>";
				 
			 };
			 
			 
echo         '<TD> &nbsp &nbsp';

             echo number_format($row["precio"], 0, ",", ".")."&nbsp &nbsp</TD>" ;

echo         '<TD> &nbsp &nbsp';

             echo  number_format($row["margen"], 0, ",", ".")."&nbsp &nbsp</TD>" ;

echo         '<TD> &nbsp &nbsp';

             echo number_format(calcular_comision((int)$row["precio"]), 0, ",", ".")."&nbsp &nbsp</TD>";
			 
echo         '<TD> &nbsp &nbsp';

             echo number_format(((int)$row["margen"]-calcular_comision((int)$row["precio"])), 0, ",", ".")."&nbsp &nbsp</TD>";	

echo         '<TD> &nbsp &nbsp';

             echo number_format(((int)$row["margen"]-calcular_comision((int)$row["precio"])-COMISION_ML *(int)$row["precio"]), 0, ",", ".")."<br>&nbsp &nbsp</TD>";

            
echo     '</TR>';

$precio_total=$precio_total+((int)$row["precio"]*(int)$row["cantidad"]);
$inventario_neto=$inventario_neto+(((int)$row["precio"]-calcular_comision((int)$row["precio"])-COMISION_ML *(int)$row["precio"])*(int)$row["cantidad"]);    

};
echo '</TABLE>';
echo "<BR>";
echo "INVENTARIO TOTAL:  <font color=\"red\">".number_format($precio_total, 0, ",", ".")."</font><br>"; 
//echo "INVENTARIO NETO:  <font color=\"red\">".number_format($inventario_neto, 0, ",", ".")."</font><br>"; 
//echo "UTILIDAD TOTAL:  <font color=\"red\">".number_format($utilidad_total, 0, ",", ".")."</font><br>";


$query = "select * from alabscl_ventas.pasivos WHERE tipo='deuda_internacional' ;";     // Esta linea hace la consulta 
//echo $query;
$result2 = mysql_query($query);  


while ($row=mysql_fetch_array($result2)) 
	{
	echo  "DEUDA INTERNACIONAL:  <font color=\"red\">".number_format($row["valor"], 0, ",", ".")."</font><br>";	
	$deuda=$row["valor"];
	};
$query = "select * from alabscl_ventas.stock_inversionistas ;";     // Esta linea hace la consulta 
$result2 = mysql_query($query);  
$precio_total_inversionista=0;


while ($row=mysql_fetch_array($result2))
	{

	$precio_total_inversionista=$precio_total_inversionista+((int)$row["monto_pago"]*(int)$row["cantidad"]);
	
	};

  
  $query = "select SUM(IVA_credito) from alabscl_ventas.IVA WHERE fecha >= '".date("Y-m")."-01 00:00:00';";    // Esta linea hace la consulta 
  // echo $query;
  $res=mysql_query($query);
  $row=mysql_fetch_array($res);
  $iva_credito=$row[0];	
	
	
echo "INVENTARIO INVERSIONISTA :  <font color=\"red\">".number_format($precio_total_inversionista, 0, ",", ".")."</font><br>";	
echo "INVENTARIO FINAL:  <font color=\"red\">".number_format(($precio_total - $deuda-$precio_total_inversionista), 0, ",", ".")."</font><br>";
echo "INVENTARIO NETO:  <font color=\"red\">".number_format(($inventario_neto - $deuda-$precio_total_inversionista), 0, ",", ".")."</font><br>"; 
echo "INVENTARIO NETO IVA:  <font color=\"red\">".number_format(($inventario_neto - $deuda-IVA*$precio_total-$precio_total_inversionista+$iva_credito), 0, ",", ".")."</font><br>"; 
updata_stock_oc();
?> 
</div>
</body>
</html>