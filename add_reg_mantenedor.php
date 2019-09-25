
<?php

include("verificar_sesion.php");

 ?>                                                             
<html>
<body>

<?php

include("funciones.php");
include("conexion.php");

$ITEM = $_POST['ITEM'];
echo "ITEM: <font color=\"red\"> ".$ITEM."</font><br>";

$CANTIDAD = $_POST['CANTIDAD'];
echo "CANTIDAD: <font color=\"red\"> ".$CANTIDAD."</font><br>";

$TIPO = $_POST['TIPO'];
echo "TIPO: <font color=\"red\"> ".$TIPO."</font><br>";

$VENDEDOR = $_POST['VENDEDOR'];
echo "VENDEDOR: <font color=\"red\"> ".$VENDEDOR."</font><br>";

$query = "select cantidad,precio,margen from `alabscl_ventas`.`stock_general` where item='".$ITEM."';";     // Esta linea hace la consulta 
$result = mysql_query($query);  

  while ($registro = mysql_fetch_array($result))
         {  
            //echo $registro['cantidad'] ;
			$cantidad_bd=$registro['cantidad'];
			$precio_bd=$registro['precio'];
			$margen_bd=$registro['margen'];
					
		  };
		      	   
	   $diff=((int)$cantidad_bd -(int)$CANTIDAD);
	   
	   //echo $diff;
	
	if (  $diff  <=  0)
	    {
		$diff=0;
		echo "ALERTA STOCK <font color=\"red\">".$diff."</font><br>" ;
		$mail = "ALERTA STOCK: ".$diff ;
		}		
	   else
	   
	   {
	    echo "QUEDA EN STOCK: <font color=\"red\">".$diff."</font><br>" ;
		$mail = "QUEDA EN STOCK: ".$diff ;
	   }
	   
	   echo "PRECIO:  <font color=\"red\">".$precio_bd."</font><br>";
	   echo "MARGEN:  <font color=\"red\">".$margen_bd."</font><br>";
	
$sql = "INSERT INTO alabscl_ventas.registro_ventas (FECHA,ITEM,CANTIDAD,TIPO,VENDEDOR,PRECIO,MARGEN,ID_VENTAS) VALUES (CURRENT_TIMESTAMP, '".$ITEM."',".$CANTIDAD.",'".$TIPO."','".$VENDEDOR."',".$precio_bd.",".$margen_bd.",NULL);";
$result = mysql_query($sql);
	
$query="UPDATE alabscl_ventas.stock_general SET cantidad = '".$diff."' WHERE stock_general.item ='".$ITEM."';";
$result = mysql_query($query); 


//Titulo
$titulo = "SE HA REGISTRADO: ".$ITEM." CANTIDAD: ".$CANTIDAD." TIPO: ".$TIPO." VENDEDOR: ".$VENDEDOR ;
//cabecera

 Enviar_email("PAGO COMISION",$titulo,'aguileraelectro@gmail.com');
if($bool){
    echo "<br> SE HA INGRESADO EN VENTA GENERAL";
}else{
    echo "NO SE PUDO REGISTRAR";
}

?> 

</body>
</html>
                            
                            