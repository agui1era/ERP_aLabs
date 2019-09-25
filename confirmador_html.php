
<?php

include("verificar_sesion.php");

 ?>  
<html>
	  <head>
	    <script src="script.js"> 	</script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<b><title> CONFIRMADOR</title></b>
		<br>
		
	  </head>
	      <body>
		  <div class="container">
		  <b><h2> CONFIRMAR COMPRA</h2></b><br>
					
						
						<form name="form_confirmador" method="post" action="confirmador.php">
						
						
							<?php
							//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
							include("conexion.php");

							$query = "select * from alabscl_ventas.stock_general ORDER BY item ASC;";     // Esta linea hace la consulta 
							$result2 = mysql_query($query);  

							echo 'ITEM:<select name="ITEM">';
							while ($row=mysql_fetch_array($result2))
							{
							   echo  '<option value="'.$row["item"].'">'.$row["item"].'</option>';  
							};
							echo '</select><br> <br>';

							?> 
					
						CELULAR: <br>
						<input type="text" name="CELULAR" size="50"  /><br><br>
						
									
					    <input type="button"  class="btn btn-info btn-lg"value="ENVIAR" onClick="ingresa_conf()" >
						</form>
												
		</div>
		</body>
	</html>