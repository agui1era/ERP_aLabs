
<?php

include("verificar_sesion.php");

 ?>  


<html>
<body>

<?php

$ITEM = $_POST['ITEM'];
echo "ITEM: <font color=\"red\"> ".$ITEM."</font><br>";

$CANTIDAD = $_POST['CANTIDAD'];
echo "CANTIDAD: <font color=\"red\"> ".$CANTIDAD."</font><br>";


//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
include("conexion.php");

$query = "select cantidad from `alabscl_ventas`.`stock_general` where item='".$ITEM."';";     // Esta linea hace la consulta 
$result = mysql_query($query);  

  while ($registro = mysql_fetch_array($result))
         {  
            //echo $registro['cantidad'] ;
			$cantidad_bd=$registro['cantidad'];
		         
		  };
		  
	   $suma=((int)$cantidad_bd + (int)$CANTIDAD);
	   
	   //echo $diff;
		
	    echo "NUEVO STOCK: <font color=\"red\">".$suma."</font><br>" ;	

$query="UPDATE alabscl_ventas.stock_general SET cantidad = '".$suma."' WHERE stock_general.item ='".$ITEM."';";
$result= mysql_query($query); 

if($result <> 1)
{
$estado="ERROR AL ACTUALIZAR "." codigo: ".$result."<br>";
echo $estado;
}

else{

$titulo= "ACTUALIZADO EL STOCK: ".$ITEM." :".$suma." STOCK ANTERIOR: ".$cantidad_bd;
};

 Enviar_email("ACTUALIZADO EL STOCK: ",$titulo,'aguileraelectro@gmail.com');


echo "<br>".$titulo."<br> ";

?> 

</body>
</html>
           