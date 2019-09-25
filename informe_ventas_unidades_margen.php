
<?php

include("verificar_sesion.php");

 ?>  
<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


<body>
<div class="container">
<?php


$DIA_INICIAL = 1;
$MES_INICIAL= date('m')-3;
$DIA_FINAL = date('j');
$MES_FINAL =date('m');
//$item = $_POST['item'];

if ($MES_INICIAL==-2)
    {
    $MES_INICIAL = 1;
    };
if ($MES_INICIAL==-1)
    {
    $MES_INICIAL = 1;
    };

if ($MES_INICIAL==0)
    {
    $MES_INICIAL = 1;
    };

//echo $MES_INICIAL ;

//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
include("conexion.php");


//echo "INDICADORES:  <br><br>";



$query="select sum(PRECIO) from alabscl_ventas.registro_ventas WHERE FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' AND FECHA <= '".date("Y")."-".$MES_FINAL."-".$DIA_FINAL." 23:59:59';";
$res=mysql_query($query);
$row=mysql_fetch_array($res);
$venta_total=$row[0];
			//echo $query."<BR>";
 //echo "VENTA TOTAL: $".number_format($venta_total, 0, ",", ".")."<br><br>";
			 

$query = "select ITEM from alabscl_ventas.stock_general ;";    // Esta linea hace la consulta 
//echo $query;
$result_general = mysql_query($query);  



while ($row_general=mysql_fetch_array($result_general))
{


			 $item= $row_general['ITEM'];
			 //echo "<font color=\"blue\">".$item."</font><br><br>";

			 $query = "select SUM(PRECIO) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' AND FECHA <= '".date("Y")."-".$MES_FINAL."-".$DIA_FINAL." 23:59:59';";
			 $result = mysql_query($query);
			 $ventas_totales =mysql_fetch_array($result);
			 //echo $query."<BR>";
			 //echo "VENTA TOTAL: $".number_format($ventas_totales[0], 0, ",", ".")." >> ".round((($ventas_totales[0]/$venta_total)*100),0)."%";
		
		    // echo "<br>";
			 $query = "select SUM(MARGEN) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' AND FECHA <= '".date("Y")."-".$MES_FINAL."-".$DIA_FINAL." 23:59:59';";
			 $result = mysql_query($query);
			 $margen_total =mysql_fetch_array($result);
			 //echo "MARGEN TOTAL: $".number_format($margen_total[0], 0, ",", ".")." >> ".round((($margen_total[0]/$venta_total)*100),0)."%";
			 
		     //echo "<br>";
			 
			 $query = "select SUM(COMISION) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' AND FECHA <= '".date("Y")."-".$MES_FINAL."-".$DIA_FINAL." 23:59:59';";
			 $result = mysql_query($query);
			 $comision_total =mysql_fetch_array($result);
			// echo "COMISION TOTAL: $".number_format($comision_total[0], 0, ",", ".")." >> ".round((($comision_total[0]/$venta_total)*100),0)."%";
		
		     //echo "<br>";
			 
			 //echo   "<font color=\"red\"> UTILIDAD NETA UTL2: $". number_format(((int)$margen_total[0]-(int)$comision_total[0]), 0, ",", ".")." >> ".round(((((int)$margen_total[0]-(int)$comision_total[0])/$venta_total)*100),0)."%</font>";;
			 //echo "<br>";
			   
			 $query = "select COUNT(ITEM) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND TIPO='ENVIO' AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' AND FECHA <= '".date("Y")."-".$MES_FINAL."-".$DIA_FINAL." 23:59:59';";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			// echo "DESPACHOS ENVIO: ".$total[0]."<BR>";
			 
			 $query = "select COUNT(ITEM) from alabscl_ventas.registro_ventas where ITEM='".$item."' AND TIPO='COBRO' AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' AND FECHA <= '".date("Y")."-".$MES_FINAL."-".$DIA_FINAL." 23:59:59';";
			 $result = mysql_query($query);
			 $total =mysql_fetch_array($result);
			 //echo "ENTREGAS COBRO: ".$total[0]."<BR>";
		 
			 $query = "select SUM(CANTIDAD) from alabscl_ventas.registro_ventas where ITEM='".$item."'  AND FECHA >= '".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." 00:00:00' AND FECHA <= '".date("Y")."-".$MES_FINAL."-".$DIA_FINAL." 23:59:59';";
			 $result = mysql_query($query);
			 $total_unidades_vendidas =mysql_fetch_array($result);
			 //echo "<font color=\"red\"> UNIDADES VENDIDAS: ".$total_unidades_vendidas[0]."</font><BR>";
			
			//echo "<br><br>";
			
			$margen_producto=(int)$margen_total[0]-(int)$comision_total[0];
			
			$query="DELETE FROM alabscl_ventas.tendencias_ventas WHERE item ='".$item."';";
            //echo $query."<br>";
			$result=mysql_query($query);
			$query="INSERT INTO alabscl_ventas.tendencias_ventas (id,item, cantidad, margen) VALUES (NULL,'".$item."', ".$total_unidades_vendidas[0].",".$margen_producto.");";
           // echo $query."<br>";
			$result=mysql_query($query);
			//echo $result."<br>";  
            }
			
            $query = "select * from alabscl_ventas.tendencias_ventas ORDER BY  margen DESC ;";     // Esta linea hace la consulta 
			$result2 = mysql_query($query);  
			//echo $query;

			echo '<TABLE  BORDER="1" class="table table-bordered">';

			echo "<BR> <h4><STRONG> INFORME DE VENTAS SEGÚN MARGEN , DESDE EL ".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." HASTA ".date("Y")."-".$MES_FINAL."-".$DIA_FINAL."</STRONG></h4> <br>";
			while ($row=mysql_fetch_array($result2))
				{

				echo '<TR> <TD> &nbsp &nbsp';
				echo $row["item"]."&nbsp &nbsp</TD>" ;

				echo        '<TD> &nbsp &nbsp';
				echo number_format($row["cantidad"], 0, ",", ".")."&nbsp &nbsp</TD>" ;

				echo        '<TD> &nbsp &nbsp';
				echo number_format($row["margen"], 0, ",", ".")."&nbsp &nbsp</TD>" ;

				echo  '</TR>';
      
				};
				echo '</TABLE>';	


				$query = "select * from alabscl_ventas.tendencias_ventas ORDER BY  cantidad DESC ;";     // Esta linea hace la consulta 
				$result2 = mysql_query($query);  
			//echo $query;
	
				echo "<BR><h4><STRONG>INFORME DE VENTAS SEGÚN CANTIDAD , DESDE EL ".date("Y")."-".$MES_INICIAL."-".$DIA_INICIAL." HASTA ".date("Y")."-".$MES_FINAL."-".$DIA_FINAL."</STRONG></h4> <br>";

				echo '<TABLE  BORDER="1" class="table table-bordered">';

				echo ' <TR>  <TD><STRONG>ITEM</STRONG> </TD>  <TD> <STRONG>UNIDADES VENDIDAS</STRONG></TD><TD><STRONG>MARGEN </STRONG>  </TR> ';	
				while ($row=mysql_fetch_array($result2))
				{

				echo '<TR> <TD> &nbsp &nbsp';
				echo $row["item"]."&nbsp &nbsp</TD>" ;

				echo        '<TD> &nbsp &nbsp';
				echo number_format($row["cantidad"], 0, ",", ".")."&nbsp &nbsp</TD>" ;

				echo        '<TD> &nbsp &nbsp';
				echo number_format($row["margen"], 0, ",", ".")."&nbsp &nbsp</TD>" ;

				echo  '</TR>';
      
};
echo '</TABLE>';					
					
?> 
</div>
</body>
</html>