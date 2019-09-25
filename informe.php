
<?php

include("verificar_sesion.php");

 ?>  

<html>
 
	  <head>
	    <script src="script.js"> 	</script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<body>
		
		<b><title> INFORME </title></b> 
		<br>
		
	  </head>
	  
	  <body>
	      <div class="container">
		  <b><h1><strong> INFORME VENTAS </strong></h1></b><BR>
		  
		                <form name="mant_informe" method="post" action="ver_informe.php">
												
						DIA INICIAL: <input type="text" name="DIAINICIAL"  size="1"/>  MES INICIAL: <input type="text" name="MESINICIAL" size="1" /><br><br>
						DIA FINAL: <input type="text" name="DIAFINAL"  size="1"/> MES FINAL: <input type="text" name="MESFINAL" size="1"  /><br><br> 
														
					 <input type="button" class="btn btn-info btn-lg" value="VER INFORME" onClick="ver_informe()" > &nbsp &nbsp
					 <input type="button" class="btn btn-info btn-lg" value="VER INFORME MENSUAL" onClick="ver_informe_mensual()" > &nbsp &nbsp
					 <input type="button" class="btn btn-info btn-lg" value="VER INFORME DIA" onClick="ver_informe_diario()" >
						</form>
												
		
		</body>
		</div>
	</html>