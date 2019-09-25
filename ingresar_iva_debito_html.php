
<?php

include("verificar_sesion.php");

 ?>  


<html>
	  <head>
	    <script src="script.js"> 	</script>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		
		<b><title> IVA</title></b>
		<br>
		
	  </head>
	      <body>
		  <div class="container">
		  <b><h2> INGRESAR IVA DEBITO</h2></b> <BR>
					
						
						<form name="mant_iva" method="post" action="ingresar_IVA_debito.php">
								
						MONTO TOTAL: <br>
						<input type="text" name="MONTO" size="50"  /><br><br>
						DESCRIPCION: <br>
						<input type="text" name="DESCRIPCION"  size="100" /><br><br>
									
					    <input type="button" class="btn btn-info btn-lg" value="INGRESAR IVA" onClick="ingresar_IVA_debito()" >
						</form>
												
		
		</body>
		</div>
	</html>