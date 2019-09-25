
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
		
		<b><title> DESPACHOS</title></b>
		<br>
		
		  </head>
	      <body>
		  <div class="container">
		  <b><h1> INGRESAR DESPACHO</h1></b> <br><br>
		  
					
						<input type="button" id="btn_mercado_envio"   class="btn btn-info btn-lg" value="MERCADO ENVIOS" onClick="mercado_envios()" >
						&nbsp 
						<input type="button" id="btn_mercado_entrega" class="btn btn-info btn-lg" value="ENTREGA" onClick="entrega_personal()" >
						&nbsp 
						<input type="button" class="btn btn-info btn-lg" value="INGRESAR DESPACHO" onClick="ingresa_despacho()" >
						<br> <br> <br>
						<form name="mant_desp" method="post" action="ingresar_despachoSDFJSA2435gdsA.php" >
						<input type="radio" name="FACTURA" value="NADA" checked="checked" id="id_nada" > NADA<br>
						<input type="radio" name="FACTURA" value="BOLETA"  id="id_boleta"> BOLETA<br>
                        <input type="radio" name="FACTURA" value="FACTURA" id="id_factura"> FACTURA<br><br> <br>
						EMPRESA: &nbsp;  &nbsp;<select name="EMPRESA" id="id_empresa" >
						<option value="Chilexpress">Chilexpress</option>
						<option value="Starken">Starken</option>
						<option value="Correos de Chile">Correos de Chile</option>											
						<option value="MERCADO ENVIOS"> MERCADO ENVIOS</option>
						<option value="ENTREGA PERSONAL"> ENTREGA PERSONAL</option>
						</select><br> <br>
						DIA DE DESPACHO:<select name="DIA_DESPACHO">
						<option value="0">Hoy</option>
						<option value="1">Manana</option>
						<option value="3">Viernes  para Lunes</option>
						<option value="2">Sabado  para Lunes</option>
						</select><br> <br>
							
						NOTAS: <br>
						<input type="text" name="NOTAS" size="50"  /><br><br>
						ITEM: <br>
						<input type="text" name="ITEM"  size="50" /><br><br>
						MONTO: <br>
						<input type="text" name="MONTO" size="50"  /><br><br>
						PARA: <br>
						<input type="text" name="PARA"  size="50" /><br><br>
						RUT: <br>
						<input id="rut" type="text" name="RUT"  value="1-9" size="50" /><br><br>
						EMAIL: <br>
						<input id="email" type="text" name="EMAIL"  size="50" /><br><br>
						CELULAR: <br>
						<input type="text" name="FONO"  size="50" /><br><br>
						DIRECCION: <br>
						<input id="direccion" type="text" name="DIRECCION" size="50"  /><br><br>
						RUT FACTURA: <br>
						<input type="text" name="RUT_FACTURA" size="50" onchange="cambio_factura()" /><br><br>						
						RAZON SOCIAL Y GIRO: <br>
						<input type="text" name="GIRO" size="50"  /><br><br>
						DIRECCION FACTURACION: <br>
						<input type="text" name="DIRECCION_FACTURACION" size="50"  /><br><br><br>
														  
						</form>
												
		</div >
		</body>
	</html>