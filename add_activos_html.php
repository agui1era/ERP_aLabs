
<?php

include("verificar_sesion.php");

 ?>  
 
<html>

<head>
	    <script src="script.js"> 	</script>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		
		<b><title> INGRESAR ACTIVOS </title></b>
		<br>
		
	  </head>
	  <body>
		  
 <div class="container">
 <b><h2> INGRESAR ACTIVOS</h2></b><BR>
						
						<form name="form_ingresar_activos" method="post" action="add_activos.php">
						
						INVENTARIO: <br>
						<input type="text" name="INVENTARIO"    /><br><br>
						
						CAJA: <br>
						<input type="text" name="CAJA"   /><br><br>
						
						
					    <input type="button" class="btn btn-info btn-lg" value="INGRESAR " onClick="ingresar_activos()" >
						</form>
											
						<br><br>
</div>	
</head>						
</html>

					
						