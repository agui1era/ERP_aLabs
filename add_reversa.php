
<?php

include("verificar_sesion.php");

 ?>                                                                
<html>
<body>

<?php
// process form

$ITEM = $_POST['ITEM'];
$CANTIDAD = $_POST['CANTIDAD'];
$TIPO = $_POST['TIPO'];

//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
include("conexion.php");

$query = "select cantidad from `alabscl_ventas`.`stock_kati` where item='".$ITEM."';";     // Esta linea hace la consulta 
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
		//echo "ALERTA STOCK <font color=\"red\">".$diff."</font><br>" ;
		//$mail = "ALERTA STOCK <font color=\"red\">".$diff."</font><br>";
		}		
	   else
	   
	   {
	    //echo "QUEDA EN STOCK: <font color=\"red\">".$diff."</font><br>" ;
		//$mail = "QUEDA EN STOCK: ".$diff ;
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
		 echo "PRECIO UNITARIO:  <font color=\"red\">".$precio_bd."</font><br>"; 		   
	   
	   $diff_total=((int)$cantidad_bd_total -(int)$CANTIDAD);	   
	   
	   if ((int)$CANTIDAD > 1)
	     {
		 
		 $comision_final=$comision_multiple*(int)$CANTIDAD;
		 echo "COMISION:  <font color=\"red\">".$comision_final."</font><br>";
		 }
		 else
		 
		 {
		 $comision_final=$comision_unitaria;
		 echo "COMISION:  <font color=\"red\">".$comision_unitaria."</font><br>";
		 };
		 
if( $CANTIDAD > 1)

{
$precio_bd=$CANTIDAD*$precio_bd;
$margen_bd=$CANTIDAD*$margen_bd;
};
	      


$sql = "INSERT INTO alabscl_ventas.registro_ventas (FECHA,ITEM,CANTIDAD,TIPO,VENDEDOR,PRECIO,MARGEN,COMISION,ID_VENTAS) VALUES (CURRENT_TIMESTAMP, '".$ITEM."',".$CANTIDAD.",'".$TIPO."','est',".-$precio_bd.",".-$margen_bd.",0,NULL);";
$result = mysql_query($sql);

if($result <> 1)
{
$estado="ERROR INSERT registro general "." codigo: ".$result."<br>";
echo $estado;
};




 echo "ITEM: <font color=\"red\"> ".$ITEM."</font><br>";
 //echo "CANTIDAD: <font color=\"red\"> ".$CANTIDAD."</font><br>";
 //echo "TIPO: <font color=\"red\"> ".$TIPO."</font><br>";


//Titulo
$titulo = "SE HA REVERSADO: ".$ITEM." CANTIDAD: ".$CANTIDAD." TIPO: ".$TIPO." ESTADO:".$estado;
//cabecera
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//dirección del remitente 
$headers .= "From: REVERSA REALIZADA:".$estado."<VENTA>\r\n";
$bool = mail("aguileraelectro+ventas@gmail.com",$titulo,$mail,$headers);
//$bool = mail("Kathycornejoza@gmail.com",$titulo,$mail,$headers);
echo "<br>".$titulo."<br>";

?> 

</body>
</html>