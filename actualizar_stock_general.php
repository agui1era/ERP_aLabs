
<?php

include("verificar_sesion.php");

 ?>  

<html>
	  <head>
	   
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		
	    <script src="script.js"> 	</script>
		
		<b><title> Mantenedor </title></b>
		<br>
	
	  </head>
	      <body>
               <div class="container">
               <b><h2> ACTUALIZAR STOCK GENERAL</h2></b><br>
						
				<form name="mant_stock_general" method="post" action="add_stock_general.php">

				<?php
					//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
					include("conexion.php");

					$query = "select * from alabscl_ventas.stock_general ORDER BY item ASC ;";     // Esta linea hace la consulta 
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
					
		   
						<input type="Button" class="btn btn-info btn-lg" name="enviar"  onClick="stock()" value="ACTUALIZAR" >
						</form>
		</div>
		</body>
	</html>