
<?php

include("verificar_sesion.php");

 ?>                                
<html>

<body>
<BR><BR>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<div class="container">

<?php
//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
include("conexion.php");
$res=mysql_query("select sum(PRECIO) from alabscl_ventas.registro_ventas WHERE FECHA >= '".date("Y-m")."-01 00:00:00' ORDER BY FECHA DESC;");
$row=mysql_fetch_array($res);
$venta_total=$row[0];

echo "VENTA TOTAL:  <font color=\"red\">".number_format($row[0], 0, ",", ".")."</font><br>"; 

$res=mysql_query("select sum(MARGEN) from alabscl_ventas.registro_ventas WHERE FECHA >= '".date("Y-m")."-01 00:00:00' ORDER BY FECHA DESC;");
$row=mysql_fetch_array($res);
$margen_total=$row[0];

//echo "MARGEN TOTAL:  <font color=\"red\">".$row[0]."</font><br>"; 

$res=mysql_query("select sum(COMISION) from alabscl_ventas.registro_ventas WHERE FECHA >= '".date("Y-m")."-01 00:00:00' ORDER BY FECHA DESC;");
$row=mysql_fetch_array($res);

echo "COMISIONES TOTALES:  <font color=\"red\">".number_format($row[0], 0, ",", ".")."</font><br>"; 
echo "UTILIDAD NETA:  <font color=\"red\">".number_format(((int)$margen_total-(int)$row[0]), 0, ",", ".")."</font><br><br>"; 
echo "COMISIONES TOTALES :  <font color=\"red\">".number_format(round((((int)$row[0]/(int)$venta_total)*100)), 0, ",", ".")."%</font><br>"; 
echo "UTILIDAD NETA :  <font color=\"red\">".number_format(round(((((int)$margen_total-(int)$row[0])/(int)$venta_total)*100)), 0, ",", ".")."%</font><br><br>"; 

 $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas  WHERE ITEM LIKE 'gasto%' AND FECHA >= '".date("Y-m")."-01 00:00:00' ;";    // Esta linea hace la consulta 

  $res=mysql_query($query);
  $row=mysql_fetch_array($res);
  $gasto=$row[0];
			//echo $query."<BR>";

 echo "GASTO TOTAL: <font color=\"red\">$".number_format($gasto, 0, ",", ".")."</font><br>";
 
  $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas  WHERE ITEM LIKE 'pago%' AND FECHA >= '".date("Y-m")."-01 00:00:00' ;";    // Esta linea hace la consulta 

  $res=mysql_query($query);
  $row=mysql_fetch_array($res);
  $gasto=$row[0];
			//echo $query."<BR>";

 echo "PAGOS LEGALES: <font color=\"red\">$".number_format($gasto, 0, ",", ".")."</font><br>";
 
 $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas  WHERE ITEM LIKE 'DESCUENTO%' AND FECHA >= '".date("Y-m")."-01 00:00:00' ;";    // Esta linea hace la consulta 

  $res=mysql_query($query);
  $row=mysql_fetch_array($res);
  $gasto=$row[0];
			//echo $query."<BR>";

 echo "DESCUENTOS: <font color=\"red\">$".number_format($gasto, 0, ",", ".")."</font><br>";
 
 $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas  WHERE ITEM LIKE 'costos_FIJO%' AND FECHA >= '".date("Y-m")."-01 00:00:00' ;";    // Esta linea hace la consulta 

  $res=mysql_query($query);
  $row=mysql_fetch_array($res);
  $gasto=$row[0];
			//echo $query."<BR>";

 echo "COSTOS FIJOS: <font color=\"red\">$".number_format($gasto, 0, ",", ".")."</font><br><br>";
 
 
  $query = "select SUM(monto) from alabscl_ventas.despachos  WHERE  FECHA >= '".date("Y-m")."-01 00:00:00' AND flag_factura <> '' ;";    // Esta linea hace la consulta 

  $res=mysql_query($query);
  $row=mysql_fetch_array($res);
  $iva_debito=($row[0]/1.19)*0.19;
  
  $query = "select SUM(IVA_credito) from alabscl_ventas.IVA WHERE fecha >= '".date("Y-m")."-01 00:00:00';";    // Esta linea hace la consulta 
  // echo $query;
  $res=mysql_query($query);
  $row=mysql_fetch_array($res);
  $iva_credito=$row[0];
  
  
 echo "IVA REMANENTE: <font color=\"red\">$".number_format($iva_debito-$iva_credito, 0, ",", ".")."</font><br>";
 
 $res=mysql_query("select sum(precio) from alabscl_ventas.registro_ventas_inversionistas;");
 $row=mysql_fetch_array($res);
 echo "DEUDA INVERSIONISTA: <font color=\"red\">".number_format($row[0], 0, ",", ".")."</font><br>"; 
 
 $res=mysql_query("select sum(COMISION) from alabscl_ventas.registro_ventas_colaborador;");
 $row=mysql_fetch_array($res);


 $res=mysql_query("select sum(PRECIO) from alabscl_ventas.registro_ventas_colaborador WHERE TIPO='COBRO';");
 $row2=mysql_fetch_array($res);
 $valor_caja=$row2[0]-$row[0];

  echo "CAJA: <font color=\"red\">".number_format($valor_caja, 0, ",", ".")."</font><br><br>"; 
  
 

$query = "select * from alabscl_ventas.registro_ventas WHERE FECHA >= '".date("Y-m")."-01 00:00:00' ORDER BY FECHA DESC;";     // Esta linea hace la consulta 
//echo $query;
$result2 = mysql_query($query);  

echo '<TABLE   class="table table-bordered">';

echo ' <TR>  <TD>FECHA </TD>  <TD> ITEM</TD><TD>CANTIDAD </TD><TD>TIPO </TD> <TD>VENDEDOR</TD> <TD>  PRECIO </TD><TD> MARGEN </TD><TD> COMISION </TD </TR> ';
while ($row=mysql_fetch_array($result2))
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

             echo $row["VENDEDOR"]."&nbsp &nbsp</TD>" ;
echo         '<TD> &nbsp &nbsp';

             echo number_format($row["PRECIO"], 0, ",", ".")."&nbsp &nbsp</TD>" ;

echo         '<TD> &nbsp &nbsp';

             echo number_format($row["MARGEN"], 0, ",", ".") ."&nbsp &nbsp</TD>" ;

echo         '<TD> &nbsp &nbsp';

            echo number_format($row["COMISION"], 0, ",", ".") ."&nbsp &nbsp</TD>" ;
echo     '</TR>';

};

?>
</div> 
</body>
</html>
                            