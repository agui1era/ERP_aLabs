
<?php

include("verificar_sesion.php");

 ?>  
<html>
<body>

<?php

$CONCEPTO= $_POST['CONCEPTO'];
echo "CONCEPTO: <font color=\"red\"> ".$CONCEPTO."</font><br>";

$MONTOEXP = $_POST['MONTOEXP'];
echo "MONTOEXP: <font color=\"red\"> ".$MONTOEXP."</font><br>";

$MONTOUTL = $_POST['MONTOUTL'];
echo "MONTOUTL: <font color=\"red\"> ".$MONTOUTL."</font><br>";

//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
include("conexion.php");
//echo $link;
$sql = "INSERT INTO alabscl_ventas.registro_ventas (FECHA,ITEM,CANTIDAD,TIPO,VENDEDOR,PRECIO,MARGEN,ID_VENTAS) VALUES (CURRENT_TIMESTAMP,'".$CONCEPTO."',0,'','',-".$MONTOEXP.",-".$MONTOUTL.",NULL);";
$result = mysql_query($sql);

if($result <> 1)
{
$estado="ERROR INSERT registro general "." codigo: ".$result."<br>";
echo $estado;
};
	
//Titulo
$titulo = "SE HA REGISTRADO: ".$CONCEPTO.".<br> ESTADO:".$estado;
//cabecera
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//dirección del remitente 
$headers .= "From: REGISTRO<VENTA>\r\n";

$bool = mail("aguileraelectro+ventas@gmail.com",$titulo,$mail,$headers);
Enviar_push("NUEVO DESPACHO", $producto,"o.jYs7YJBJdMyss5j02eQ11Z1ws7atIsp7");

echo $titulo;


?> 
</body>
</html>