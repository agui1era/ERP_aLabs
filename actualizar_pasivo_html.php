
<?php

include("verificar_sesion.php");

 ?>  
 
<html>

<head>
	    <script src="script.js"> 	</script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		
		<b><title> ACTUALIZAR PASIVO </title></b>
		<br>
		
	  </head>
	      <body>
 
 <b><h1> ACTUALIZAR PASIVO</h1></b>
						
						<form name="form_ingresar_pasivo" method="post" action="actualizar_pasivo.php">
						
						PASIVO: <br>
						<input type="text" name="PASIVO" /><br><br>
			
    				    <input type="button" class="btn btn-info btn-lg" value="INGRESAR " onClick="ingresar_pasivo()" >
						</form>
											
						<br><br>
						
						
						