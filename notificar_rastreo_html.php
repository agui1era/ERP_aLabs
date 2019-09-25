
<html>
	<head>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	</head>
	<body>
	<div class="container">
   <b><h1 style="font-family: Helvetica; font-size: 20pt; "> NOTIFICADOR DE RASTREOS  </h1></b>
<?php

include("verificar_sesion.php");

 
//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
include("conexion.php");
	
$fecha = date('Y-m-j');
$nuevafecha = strtotime ( '-15 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
	
$query = "select * from alabscl_ventas.despachos WHERE (fecha >= '".$nuevafecha." 00:00:00') AND (fecha <='".date("Y-m-d")." 23:59:59')  ORDER BY fecha DESC;";
//echo $query."<br>";
$result = mysql_query($query);  
	
while ($row=mysql_fetch_array($result))
{            
             if (($row["rastreo"] == '') && ($row["empresa"] !='FACTURA' ) && ($row["empresa"] !='ENTREGA PERSONAL' ) && ($row["empresa"] !='' )   )
			 
			 {
             echo "_________________________________________________________________<br><br>";

			 // echo  "FECHA DE INGRESO DESPACHO: ".$row["fecha"]."<br><br>";
			 
           
             echo '<form action="subir_archivo.php" method="post" enctype="multipart/form-data">';
			 echo '<input type="text" name="nombre" size="40" value="'.$row["destinatario"].'" /><br>'  ;
			 echo '<input type="text" name="correo" size="40" value="'.$row["correo"].'"/><br>'  ;
			 echo '<input type="text" name="item"   size="40" value="'.$row["item"].'"/><br>';
			 echo '<input type="text" name="metodo"   size="40" value="'.$row["empresa"].'"/><br>'  ;
			 echo '<input type="text" name="fono"   size="40" value="'.$row["fono"].'"/><br>'  ;
			 echo '<input type="text" name="direccion"   size="40" value="'.$row["direccion"].'"/><br>'  ;
			 echo '<input type="text" name="ID"   size="40" value="'.$row["ID_BD"].'"/><br>'  ;
			 echo '<input type="file" name="archivo" id="archivo"></input><br><br>';
			 echo 'Código de Rastreo:<br><br>';
			 echo '<input type="text" name="cod_seguimiento"   size="40" /><br><br>'  ;
			 echo '<input type="submit" value="Enviar Rastreo"></input>';
			 echo '</form>';
			   }  
};
	
?>
     </div >
	</body>
</html>