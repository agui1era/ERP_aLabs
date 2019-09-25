<?php //Ejemplo aprenderaprogramar.com, archivo escribir.php
 	
    include("verificar_sesion.php");
		
	include("conexion.php");
		
	$query = "select fono,fecha from alabscl_ventas.despachos ORDER BY fecha DESC ;";
    //echo $query."<br>";
	$result = mysql_query($query);  
	$file = fopen("clientes_campana_SMS.csv", "w");
	fwrite($file, "56,984153050,".$mensaje_SMS. PHP_EOL);	
		
	while ($row=mysql_fetch_array($result))
		{         
	             if( strlen($row["fono"]) > 8)
				 {
	              //if ($row["fono"] =! null)
 			   	  //echo $row["fono"];
			      fwrite($file,$row["fono"].",". PHP_EOL);
				  //fwrite($file, "Otra mas" . PHP_EOL);
				  //echo  $row["celular"]." /><br>";
				 }
				 else
				 {
	              //if ($row["fono"] =! null)
 			   	  //echo $row["fono"];
			      fwrite($file, "9".$row["fono"].",". PHP_EOL);
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