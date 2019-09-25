

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

$query = "select cantidad from `alabscl_ventas`.`stock_kati` where item='".$ITEM."';";     // Esta linea hace la consulta 
$result = mysql_query($query);  

  while ($registro = mysql_fetch_array($result))
         {  
            //echo $registro['cantidad'] ;
			$cantidad_bd=$registro['cantidad'];
		         
		  };
		  
	   $suma=((int)$cantidad_bd + (int)$CANTIDAD);
	   
	   //echo $diff;
		
	    echo "NUEVO STOCK: <font color=\"red\">".$suma."</font><br>" ;	

$query="UPDATE alabscl_ventas.stock_kati SET cantidad = '".$suma."' WHERE stock_kati.item ='".$ITEM."';";
$sql = "INSERT INTO alabscl_ventas.actualizaciones_stock (id,fecha,item,nuevo_stock,stock_anterior) VALUES (NULL,CURRENT_TIMESTAMP,'".$ITEM."',".$suma.",".$cantidad_bd.");";
//echo $sql."<br>" ;	
$result= mysql_query($query);
$result2= mysql_query($sql); 

if(($result <> 1  )  && ( $result2 <> 1))
{
$estado="ERROR AL ACTUALIZAR "." codigo: ".$result."<br>";
echo $estado;
}

else{

$titulo= "ACTUALIZADO EL STOCK: ".$ITEM." : ".$suma." STOCK ANTERIOR: ".$cantidad_bd;
};

 
 Enviar_push("STOCK ACTUALIZADO",$titulo ,"o.jYs7YJBJdMyss5j02eQ11Z1ws7atIsp7");
 Enviar_push("STOCK ACTUALIZADO",$titulo,"o.4zyOy5iiJDQ7yVwweLkSe12xt4h7yMaW");
 //Enviar_email("STOCK ACTUALIZADO",$titulo,'katherine@alabs.cl');
 //Enviar_email("STOCK ACTUALIZADO",$titulo,'aguileraelectro@gmail.com');


echo "<br>".$titulo."<br> ";
updata_stock_oc();

?> 

</body>
</html>
           