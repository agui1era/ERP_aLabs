
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

$TIPO = $_POST['TIPO'];
echo "TIPO: <font color=\"red\"> ".$TIPO."</font><br>";

//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
//echo $link;
include("conexion.php");

$sql = "INSERT INTO alabscl_ventas.registro_ventas (FECHA,ITEM,CANTIDAD,TIPO,VENDEDOR,PRECIO,MARGEN,ID_VENTAS) VALUES (CURRENT_TIMESTAMP,'".$CONCEPTO.",',0,'','',".$MONTOEXP.",".$MONTOUTL.",NULL);";
$result = mysql_query($sql);


//$sql = "INSERT INTO `alabscl_ventas`.`registro_ventas_colaborador` (`ID_BD`,`FECHA`,`ITEM`,`CANTIDAD`,`TIPO`,`COMISION`,`PRECIO`) VALUES (NULL,CURRENT_TIMESTAMP,'".$CONCEPTO."',0,'".$TIPO."',0,".$MONTOEXP.");";
//$result2 = mysql_query($sql);

if ($result==1 )
{
//Titulo
$titulo = "SE HA INGRESADO VENTA EXTRA, PRECIO: ".$MONTOEXP." MARGEN: ".$MONTOUTL;
//cabecera
}
else{

$titulo= "ATENCION INGRESO INCORRECTO DEl REGISTRO";
};

$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//dirección del remitente 
$headers .= "From: VENTA EXTRA<VENTA>\r\n";

$bool = mail("aguileraelectro+ventas@gmail.com",$titulo,$mail,$headers);
$bool = mail("Kathycornejoza@gmail.com",$titulo,$mail,$headers);
echo "<br>".$titulo."<br> ";


?> 
</body>
</html>