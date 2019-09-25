
<?php

include("verificar_sesion.php");

 ?>  
<html>

<link rel="stylesheet" type="text/css" href="style.css" />
<body>

<?php


$DIA_INICIAL = 1;
$MES_INICIAL = date("m");

//$item = $_POST['item'];



//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
include("conexion.php");


echo "INDICADORES:  <br><br>";


$query="select sum(PRECIO) from alabscl_ventas.registro_ventas WHERE FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
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


			 $item= $row_general[ITEM];
			 echo "<font color=\"blue\">".$item."</font><br><br>";

			 $query = "select SUM(PRECIO) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $ventas_totales =mysql_fetch_array($result);
			 //echo $query."<BR>";
			 echo "VENTA TOTAL: $".number_format($ventas_totales[0], 0, ",", ".")." >> ".round((($ventas_totales[0]/$venta_total)*100),0)."%";
		
		     echo "<br>";
			 $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $margen_total =mysql_fetch_array($result);
			 echo "MARGEN TOTAL: $".number_format($margen_total[0], 0, ",", ".")." >> ".round((($margen_total[0]/$venta_total)*100),0)."%";
			 
			 $MARGEN_FINAL=$MARGEN_FINAL+$margen_total[0];
		
		     echo "<br>";
			 
			 $query = "select SUM(COMISION) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $comision_total =mysql_fetch_array($result);
			 echo "COMISION TOTAL: $".number_format($comision_total[0], 0, ",", ".")." >> ".round((($comision_total[0]/$venta_total)*100),0)."%";
		
		     echo "<br>";
			 
			 echo   "<font color=\"red\"> UTILIDAD NETA UTL2: $". number_format(((int)$margen_total[0]-(int)$comision_total[0]), 0, ",", ".")." >> ".round(((((int)$margen_total[0]-(int)$comision_total[0])/$venta_total)*100),0)."%</font>";;
			 echo "<br>";
			   
			 $query = "select COUNT(ITEM) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND TIPO='ENVIO' AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "DESPACHOS ENVIO: ".$total[0]."<BR>";
			 
			 $query = "select COUNT(ITEM) from alabscl_ventas.registro_ventas where ITEM='".$item."' AND TIPO='COBRO' AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "ENTREGAS COBRO: ".$total[0]."<BR>";
		 
			 $query = "select SUM(CANTIDAD) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total_unidades_vendidas =mysql_fetch_array($result);
			 echo "<font color=\"red\"> UNIDADES VENDIDAS: ".$total_unidades_vendidas[0]."</font><BR>";
			
			echo "<br><br>";
		
           
}
            

             $item="costos_FIJOS";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			 $item="gastos_MATERIALES";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			  $item="gastos_DESPACHOS";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			 $item="gastos_ML";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			  $item="gastos_TELEFONO";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			 $item="gastos_ARRIENDO_OF";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			 
			  $item="gastos_PUBLICIDAD";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			 $item="pago_PPM";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			  $item="pago_IVA";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			 $item="pago_RENTA";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			 $item="pago_PATENTE";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			 $item="gasto_PERDIDA_PRODUCTO";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			  $item="gasto_ASESORIA";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			  $item="gasto_DINEROMAIL";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			  $item="gasto_CELULAR";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			  $item="pago_SERVIDORES";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			  $item="gasto_TRANSPORTE";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			  $item="INVERSION";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			 $item="DESCUENTO";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			 $item="DEVOLUCION";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			 $item="gasto_BODEGA";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			 $item="pago_IMPUESTO";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			 $item="gasto_COMISION_RECAUDACION";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			 $item="gasto_SERVICIOS";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			 $item="gasto_COMISION_VENTA";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			 $item="gasto_SERV_BASICOS";

              echo "<font color=\"blue\">".$item."</font><br><br>";
             $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' ;";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 echo "<font color=\"red\"> TOTAL: ".number_format($total[0], 0, ",", ".")."</font><BR><BR>";
			 
			 
			 
			 
			 
			 
			 
			 
			 

?> 
</body>
</html>