
<?php

include("verificar_sesion.php");

 ?>                                                                
<html>
<body>

<?php
// process form
$error_general=0;
$ITEM = $_POST['ITEM'];
$CANTIDAD = $_POST['CANTIDAD'];
$TIPO = $_POST['TIPO'];



//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
include("conexion.php");
include("funciones.php");

if (($TIPO=='OFICINA_ENVIO') || ($TIPO=='OFICINA_COBRO'))
{       

        if ($TIPO=='OFICINA_COBRO')
		   {
           $TIPO= 'COBRO';
		   };
		if ($TIPO=='OFICINA_ENVIO')
		   {
           $TIPO= 'ENVIO';
		   };
		   
		 
		$query = "select cantidad from `alabscl_ventas`.`stock_oficina` where item='".$ITEM."';";     // Esta linea hace la consulta 
		$result = mysql_query($query);  

			while ($registro = mysql_fetch_array($result))
				{  
				//echo $registro['cantidad'] ;
				$cantidad_bd=$registro['cantidad'];
		         
				};
		  
		$diff=((int)$cantidad_bd -(int)$CANTIDAD);
	   
	   //echo $diff;
	
		if (  $diff  <=  0)
			{
			$diff=0;
			echo "ALERTA STOCK <font color=\"red\">".$diff."</font><br>" ;
			$mail = "ALERTA STOCK <font color=\"red\">".$diff."</font><br>";
			}		
		else
	   
			{
			echo "QUEDA EN STOCK: <font color=\"red\">".$diff."</font><br>" ;
			$mail = "QUEDA EN STOCK: ".$diff ;
			}
			
			$query="UPDATE alabscl_ventas.stock_oficina SET cantidad = '".$diff."' WHERE stock_oficina.item ='".$ITEM."';";
			echo $diff;
			$result = mysql_query($query); 

		if($result <> 1)
				{
				$estado="ERROR UPDATE stock  "." codigo: ".$result."<br>";
				echo $estado;
				$error_general=1;
				};
};

		$query = "select cantidad from `alabscl_ventas`.`stock_general` where item='".$ITEM."';";     // Esta linea hace la consulta 
		$result = mysql_query($query);  

		while ($registro = mysql_fetch_array($result))
         {  
            //echo $registro['cantidad'] ;
			$cantidad_bd=$registro['cantidad'];
		         
		  };
		  
	   $diff2=((int)$cantidad_bd -(int)$CANTIDAD);
	   
	   //echo $diff;
	
	if (  $diff2  <=  0)
	    {
		$diff=0;
		echo "ALERTA STOCK <font color=\"red\">".$diff."</font><br>" ;
		$mail = "ALERTA STOCK <font color=\"red\">".$diff."</font><br>";
		}		
	   else
	   
	   {
	    echo "QUEDA EN STOCK: <font color=\"red\">".$diff."</font><br>" ;
		$mail = "QUEDA EN STOCK: ".$diff ;
	   }
	   
$query = "select cantidad,precio,margen,comision_unitaria,comision_multiple from `alabscl_ventas`.`stock_general` where item='".$ITEM."';";     // Esta linea hace la consulta 
$result = mysql_query($query);  




  while ($registro = mysql_fetch_array($result))
         {  
            //echo $registro['cantidad'] ;
			$cantidad_bd_total=$registro['cantidad'];
			$precio_bd=$registro['precio'];
			$margen_bd=$registro['margen'];
			$comision_unitaria=$registro['comision_unitaria'];
			$comision_multiple=$registro['comision_multiple'];
						
		  };
		 		   
	   
	   $diff_total=((int)$cantidad_bd_total -(int)$CANTIDAD);	   
	   
if ((int)$cantidad_bd_total  > 0)	  { 
	   echo "PRECIO UNITARIO:  <font color=\"red\">".$precio_bd."</font><br>";
		 
if( $CANTIDAD > 1)

{
$precio_bd=$CANTIDAD*$precio_bd;
$margen_bd=$CANTIDAD*$margen_bd;
};
	      
$sql = "INSERT INTO `alabscl_ventas`.`registro_venta_directa` (`ID_BD`,`FECHA`,`ITEM`,`CANTIDAD`,`TIPO`,`PRECIO`) VALUES (NULL,CURRENT_TIMESTAMP,'".$ITEM."',".$CANTIDAD.",'".$TIPO."',".$precio_bd.");";
//echo $sql;
$result = mysql_query($sql);

if($result <> 1)
{
$estado="ERROR INSERT registro VENTA DIRECTA "." codigo: ".$result."<br>";
echo $estado;
$error_general=1;
};

$sql = "INSERT INTO alabscl_ventas.registro_ventas (FECHA,ITEM,CANTIDAD,TIPO,VENDEDOR,PRECIO,MARGEN,COMISION,ID_VENTAS) VALUES (CURRENT_TIMESTAMP, '".$ITEM."',".$CANTIDAD.",'".$TIPO."','est',".$precio_bd.",".$margen_bd.",0,NULL);";
$result = mysql_query($sql);

if($result <> 1)
{
$estado="ERROR INSERT registro general "." codigo: ".$result."<br>";
echo $estado;
};



$query="UPDATE alabscl_ventas.stock_general SET cantidad = '".$diff_total."' WHERE stock_general.item ='".$ITEM."';";
$result = mysql_query($query); 

if($result <> 1)
{
$estado="ERROR UPDATE stock total "." codigo: ".$result."<br>";
echo $estado;
};




 echo "ITEM: <font color=\"red\"> ".$ITEM."</font><br>";
 echo "CANTIDAD: <font color=\"red\"> ".$CANTIDAD."</font><br>";
 echo "TIPO: <font color=\"red\"> ".$TIPO."</font><br>";

  $error_general=venta_inversionistas($ITEM,$CANTIDAD);
  if ($error_general==1)
	{
	$titulo='ERROR!!!';	
	};
//Titulo
$titulo = "SE HA VENDIDO: ".$ITEM." CANTIDAD: ".$CANTIDAD." TIPO: ".$TIPO." ESTADO:".$estado;
Enviar_push("VENTA",$titulo,"o.jYs7YJBJdMyss5j02eQ11Z1ws7atIsp7");
//$bool = mail("Kathycornejoza@gmail.com",$titulo,$mail,$headers);
echo "<br>".$titulo."<br>";
updata_stock_oc();

}
else

{

        echo '<script type="text/javascript">';
        echo 'alert("NO HAY STOCK!")';
        echo '</script>';
        updata_stock_oc();

}

?> 

</body>
</html>