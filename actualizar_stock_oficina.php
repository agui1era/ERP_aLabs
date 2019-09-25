

<html>
<body>

<?php

include("verificar_sesion.php");
include("funciones.php");
include("conexion.php");

$ITEM = $_POST['ITEM'];
echo "ITEM: <font color=\"red\"> ".$ITEM."</font><br>";

$CANTIDAD = $_POST['CANTIDAD'];
echo "CANTIDAD: <font color=\"red\"> ".$CANTIDAD."</font><br>";



$query = "select cantidad from `alabscl_ventas`.`stock_oficina` where item='".$ITEM."';";     // Esta linea hace la consulta 
$result = mysql_query($query);  

  while ($registro = mysql_fetch_array($result))
         {  
            //echo $registro['cantidad'] ;
			$cantidad_bd=$registro['cantidad'];
		         
		  };
		  
	   $suma=((int)$cantidad_bd + (int)$CANTIDAD);
	   
	   //echo $diff;
		
	    echo "NUEVO STOCK: <font color=\"red\">".$suma."</font><br>" ;	

$query="UPDATE alabscl_ventas.stock_oficina SET cantidad = '".$suma."' WHERE stock_oficina.item ='".$ITEM."';";
//echo $query;
//$sql = "INSERT INTO alabscl_ventas.actualizaciones_stock (id,fecha,item,nuevo_stock,stock_anterior) VALUES (NULL,CURRENT_TIMESTAMP,'".$ITEM."',".$suma.",".$cantidad_bd.");";
//echo $sql."<br>" ;	
$result= mysql_query($query);
//$result2= mysql_query($sql); 

if($result <> 1  )
{
$estado="ERROR AL ACTUALIZAR "." codigo: ".$result."<br>";
echo $estado;
}

else{

$titulo= "ACTUALIZADO EL STOCK: ".$ITEM." :".$suma." STOCK ANTERIOR: ".$cantidad_bd;
};

Enviar_email("STOCK ACTUALIZADO",$titulo,'aguileraelectro@gmail.com');


echo "<br>".$titulo."<br> ";

?> 

</body>
</html>
           