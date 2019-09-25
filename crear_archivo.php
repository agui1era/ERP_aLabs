
<?php

include("verificar_sesion.php");


			
	include("conexion.php");
	
	$fecha = date('Y-m-j');
	$nuevafecha = strtotime ( '-3 day' , strtotime ( $fecha ) ) ;
	$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
	
	$query = "select celular from alabscl_ventas.pre_comprador WHERE (fecha >= '".$nuevafecha." 00:00:00') AND (fecha <='".date("Y-m-d")." 23:59:59')  ORDER BY fecha DESC;";
    //echo $query."<br>";
	$result = mysql_query($query);  
	$file = fopen("clientes.csv", "w");
	fwrite($file, "987108266;C:\ML.wav;0;" . PHP_EOL);	
		
	while ($row=mysql_fetch_array($result))
		{           
	               
			fwrite($file, "".$row["celular"].";C:\ML.wav;0;". PHP_EOL);
		    //fwrite($file, "Otra mas" . PHP_EOL);
		    //echo  $row["celular"]." /><br>";	 
					 	 
					 
					     	   
		};
     fclose($file);	
	
			
?>


</a>
<html>
	<body>
		<a href="clientes.csv" download="clientes.csv">
		Descargar Archivo
	</body>
</html>