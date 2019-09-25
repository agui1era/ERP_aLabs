
<?php

include("verificar_sesion.php");

 ?>  
<html>

<link rel="stylesheet" type="text/css" href="style.css" />

<body>

<?php


$DIA_INICIAL = $_POST['DIAINICIAL'];
$MES_INICIAL = $_POST['MESINICIAL'];
$DIA_FINAL = $_POST['DIAFINAL'];
$MES_FINAL = $_POST['MESFINAL'];
//$item = $_POST['item'];



//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
include("conexion.php");


echo "INDICADORES:  <br><br>";



$query="select sum(PRECIO) from alabscl_ventas.registro_ventas WHERE FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' AND FECHA <= '".date("Y")."-".$MES_FINAL."-".$DIA_FINAL." 23:59:59';";
$res=mysql_query($query);
$row=mysql_fetch_array($res);
$venta_total=$row[0];
			//echo $query."<BR>";
 echo "VENTA TOTAL: $".number_format($venta_total, 0, ",", ".")."<br><br>";
			 

$query = "select ITEM from alabscl_ventas.stock_general ;";    // Esta linea hace la consulta 
//echo $query;
$result_general = mysql_query($query);  



while ($row_general=mysql_fetch_array($result_general))
{


			 $item= $row_general['ITEM'];
			 echo "<font color=\"blue\">".$item."</font><br><br>";

			 $query = "select SUM(PRECIO) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' AND FECHA <= '".date("Y")."-".$MES_FINAL."-".$DIA_FINAL." 23:59:59';";
			 $result = mysql_query($query);
			 $ventas_totales =mysql_fetch_array($result);
			 //echo $query."<BR>";
			 echo "VENTA TOTAL: $".number_format($ventas_totales[0], 0, ",", ".")." >> ".round((($ventas_totales[0]/$venta_total)*100),0)."%";
		
		     echo "<br>";
			 $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' AND FECHA <= '".date("Y")."-".$MES_FINAL."-".$DIA_FINAL." 23:59:59';";
			 $result = mysql_query($query);
			 $margen_total =mysql_fetch_array($result);
			 echo "MARGEN TOTAL: $".number_format($margen_total[0], 0, ",", ".")." >> ".round((($margen_total[0]/$venta_total)*100),0)."%";
			 
		     echo "<br>";
			 
			 $query = "select SUM(COMISION) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' AND FECHA <= '".date("Y")."-".$MES_FINAL."-".$DIA_FINAL." 23:59:59';";
			 $result = mysql_query($query);
			 $comision_total =mysql_fetch_array($result);
			 echo "COMISION TOTAL: $".number_format($comision_total[0], 0, ",", ".")." >> ".round((($comision_total[0]/$venta_total)*100),0)."%";
		
		     echo "<br>";
			 
			 echo   "<font color=\"red\"> UTILIDAD NETA UTL2: $". number_format(((int)$margen_total[0]-(int)$comision_total[0]), 0, ",", ".")." >> ".round(((((int)$margen_total[0]-(int)$comision_total[0])/$venta_total)*100),0)."%</font>";;
			 echo "<br>";
			   
			 $query = "select COUNT(ITEM) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND TIPO='ENVIO' AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' AND FECHA <= '".date("Y")."-".$MES_FINAL."-".$DIA_FINAL." 23:59:59';";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "DESPACHOS ENVIO: ".$total[0]."<BR>";
			 
			 $query = "select COUNT(ITEM) from alabscl_ventas.registro_ventas where ITEM='".$item."' AND TIPO='COBRO' AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' AND FECHA <= '".date("Y")."-".$MES_FINAL."-".$DIA_FINAL." 23:59:59';";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "ENTREGAS COBRO: ".$total[0]."<BR>";
		 
			 $query = "select SUM(CANTIDAD) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' AND FECHA <= '".date("Y")."-".$MES_FINAL."-".$DIA_FINAL." 23:59:59';";
			 $result = mysql_query($query);
			 $total_unidades_vendidas =mysql_fetch_array($result);
			 echo "<font color=\"red\"> UNIDADES VENDIDAS: ".$total_unidades_vendidas[0]."</font><BR>";
			
			echo "<br><br>";
		
           
}
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $margen_total =mysql_fetch_array($result);
			 echo "MARGEN TOTAL: $".number_format($margen_total[0], 0, ",", ".")." >> ".round((($margen_total[0]/$venta_total)*100),0)."%";
		     $MARGEN_FINAL=$margen_total[0];
		     echo "<br>";



             $query = "select SUM(COMISION) from alabscl_ventas.registro_ventas where FECHA >=  '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' AND FECHA <= '".date("Y")."-".$MES_FINAL."-".$DIA_FINAL." 23:59:59';";
			 $result = mysql_query($query);
			 $comision_total =mysql_fetch_array($result);
			 echo "COMISION TOTAL: $".number_format($comision_total[0], 0, ",", ".")." >> ".round((($comision_total[0]/$venta_total)*100),0)."%";
			 
			 		
			 echo "<br><br>";

             echo "<FONT SIZE=6> MARGEN: $".number_format($MARGEN_FINAL-$comision_total[0], 0, ",", ".")."</FONT>";         

?> 
</body>
</html>