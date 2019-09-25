
<?php

include("verificar_sesion.php");

 ?>  
<html>
	  <head>
	    <meta charset="UTF-8">
	    <script src="script.js"> 	</script>
		<script type="text/javascript" src="validarut.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		
	    </head>
	      <body>
		 <div class="container">
		  <b><h2> INGRESAR BOLETA</h2></b> <br>
		  
					
						<input type="button" class="btn btn-info btn-lg" value="INGRESAR BOLETA" onClick="ingresa_boleta()" >
						<br> <br> <br>
						<form name="mant_desp" method="post" action="ingresar_despachoSDFJSA2435gdsA.php" >
						
						<input type="radio" name="FACTURA" value="BOLETA"  checked="checked" id="id_boleta"> BOLETA<br><br><br>
                        
						
						NOTAS: <br>
						<input type="text" name="NOTAS" size="50"  /><br><br>
						ITEM: <br>
						<input type="text" name="ITEM"  size="50" /><br><br>
						MONTO: <br>
						<input type="text" name="MONTO" size="50"  /><br><br>
						
														  
						</form>
												
		</div >
		</body>
	</html>