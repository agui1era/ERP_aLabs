

<?php

include("verificar_sesion.php");

 ?>                                                                                              
<body>

<html>
	  <head>
	    <script src="script.js"> 	</script>
		
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        	<!-- Optional theme -->
		   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		
		<b><title> VENTA DIRECTA </title></b>
		<br>
		
	  </head>
	      <body>
		   <div class="container">
		  <b><h1> INGRESAR VENTA </h1></b><BR>
		  <form name="mant_venta_directa" method="post" action="add_venta_directa.php">

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
			 
		 

				CANTIDAD:<select name="CANTIDAD" >
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						</select><br>
						<br>
				TIPO:<select name="TIPO" >
						<option value="COBRO">COBRO</option>
						<option value="ENVIO">ENVIO</option>
						<option value="OFICINA_COBRO">OFICINA_COBRO</option>
						<option value="OFICINA_ENVIO">OFICINA_ENVIO</option>
						</select><br>
						<br><br>		
		   
						<input type="Button"  class="btn btn-info btn-lg" name="enviar"  onClick="venta_directa()" value="INGRESAR PRODUCTO" ><br><br>
						</form>
						</div>						
								
		
		</body>
	</html>
	
	
                            
                            
                            