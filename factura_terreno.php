
<?php

include("verificar_sesion.php");

 ?>  
<html>
	  <head>
	    <meta charset="UTF-8">
	    <script src="script.js"> 	</script>
		<script type="text/javascript" src="validarut.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		
		<b><title>FACTURA TERRENO</title></b>
		<br>
		
	  </head>
	      <body>
		  <div class="container">
		  <strong>
		  <b> <span class="text-success"> <h1 > FACTURA TERRENO</h1></span></b><br>
					
						
						<form name="mant_desp" method="post" action="ingresar_despachoSDFJSA2435gdsA.php" >
						OPERACION:<select name="EMPRESA">						
						<option value="FACTURA">FACTURA</option>					
						</select><br> <br>
						
						DIA FACTURA:<select name="DIA_DESPACHO">
						<option value="0">Hoy</option>				
						</select><br> <br>
						<input type="radio" name="FACTURA" value="FACTURA" checked="checked"> FACTURA<br><br> <br>	
						
						ITEM (Nombre completo ): <br>
						<input type="text" name="ITEM"  size="50" /><br><br>	
                        RAZON SOCIAL Y GIRO  (nombre completo): <br>
						<input type="text" name="GIRO" size="50"  /><br><br>	
                        RUT FACTURA (sin puntos ej: 76523193-0): <br>
						<input type="text" name="RUT_FACTURA" size="50"  /><br><br>	
						MONTO (Sin puntos): <br>
						<input type="text" name="MONTO" size="50"  /><br><br>
						EMAIL: <br>
						<input type="text" name="EMAIL"  size="50" /><br><br>
						CELULAR (9 digitos): <br>
						<input type="text" name="FONO"  size="50" /><br><br>				
						
						
						
						
									
					    <input type="button" value="INGRESAR FACTURA" onClick="ingresa_factura_terreno()" >
						</form>
		  </strong>								
		 <div>
		 
		</body>
	</html>