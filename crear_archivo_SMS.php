<?php //Ejemplo aprenderaprogramar.com, archivo escribir.php
 
 $mensaje_SMS="Scanner Autel md802  All System rebajado 199.990 www.alabs.cl";

	
    include("verificar_sesion.php");
		
	include("conexion.php");
	
	
	
	$query = "select fono,fecha from alabscl_ventas.despachos ORDER BY fecha DESC ;";
    //echo $query."<br>";
	$result = mysql_query($query);  
	$file = fopen("clientes_campana_SMS.csv", "w");
	fwrite($file, "56,987108266,".$mensaje_SMS. PHP_EOL);	
		
	while ($row=mysql_fetch_array($result))
		{         
	             if( strlen($row["fono"]) > 8)
				 {
	              //if ($row["fono"] =! null)
 			   	  //echo $row["fono"];
			      fwrite($file, "56,".$row["fono"].",".$mensaje_SMS. PHP_EOL);
				  //fwrite($file, "Otra mas" . PHP_EOL);
				  //echo  $row["celular"]." /><br>";
				 }
				 else
				 {
	              //if ($row["fono"] =! null)
 			   	  //echo $row["fono"];
			      fwrite($file, "56,9".$row["fono"].",".$mensaje_SMS. PHP_EOL);
				  //fwrite($file, "Otra mas" . PHP_EOL);
				  //echo  $row["celular"]." /><br>";
				 }
					 
					  
					     	   
		};
		
	
		
     fclose($file);	
	
			
?>


</a>
<html>
	<body>
		<a href="clientes_campana_SMS.csv" download="clientes_campana_SMS.csv">
		Descargar Archivo
	</body>
</html>