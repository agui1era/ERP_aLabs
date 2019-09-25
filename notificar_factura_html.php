
<html>
<head>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	</head>
	<body>
	<div class="container">
    <h1 style="font-family: Helvetica; font-size: 20pt"> NOTIFICADOR DE FACTURAS  </h1>
  

<?php

include("verificar_sesion.php");


	
//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
include("conexion.php");
	
$fecha = date('Y-m-j');
$nuevafecha = strtotime ( '-30 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
	
$query = "select * from alabscl_ventas.despachos WHERE (fecha >= '".$nuevafecha." 00:00:00') AND (fecha <='".date("Y-m-d")." 23:59:59')  ORDER BY fecha DESC;";
//echo $query."<br>";
$result = mysql_query($query);  
	
while ($row=mysql_fetch_array($result))
{            
             if ($row["flag_factura"] == 'SI')
			 
			 {
             echo "_________________________________________________________________<br><br>";
			 // echo  "FECHA DE INGRESO DESPACHO: ".$row["fecha"]."<br><br>";
           
             echo '<form action="subir_factura.php" method="post" enctype="multipart/form-data">';
			 echo '<b><br>RUT FACTURA:</b><br><input type="text" name="rut_factura"   size="80" value="'.$row["rut_factura"].'"/><br>';
			 echo '<b><br>RAZON SOCIAL Y GIRO:</b><br><input type="text" name="razon social y giro"   size="80" value="'.$row["giro"].'"/><br>';
			 echo '<b><br>ITEM:</b><br><input type="text" name="item"   size="80" value="'.$row["item"].'"/><br>';
			 echo '<b><br>MONTO:</b><br><input type="text" name="monto"   size="80" value="'.$row["monto"].'"/><br>';
			 
			 echo '<b><br>DIRECCION FACTURA:</b><br><input type="text" name="direccion_facturacion"   size="80" value="'.$row["direccion_facturacion"].'"/><br>';
			 echo '<b><br>ID:</b><br><input type="text" name="ID"   size="80" value="'.$row["ID_BD"].'"/><br>';

			 echo '<b><br>PARA:</b><br> <input type="text" name="nombre" size="80" value="'.$row["destinatario"].'" /><br>';
			 echo '<b><br>RUT:</b><br><input type="text" name="rut" size="80" value="'.$row["rut"].'" /><br>';
			 echo '<b><br>EMAIL:</b><br><input type="text" name="correo" size="80" value="'.$row["correo"].'"/><br>';
			 
			 echo '<b><br>METODO:</b><br><input type="text" name="metodo"   size="80" value="'.$row["empresa"].'"/><br>';
			 echo '<b><br>FONO:</b><br><input type="text" name="fono"   size="80" value="'.$row["fono"].'"/><br>' ;
			 echo '<b><br>DIRECCION:</b><br><input type="text" name="direccion"   size="80" value="'.$row["direccion"].'"/><br>';
			 echo '<br><br><input type="file" name="archivo" id="archivo"></input><br><br>';
			 echo '<input type="submit" value="Enviar FACTURA"></input>';
			 echo '</form>';
			   }  
};
	
?>
    </div>
	</body>
</html>