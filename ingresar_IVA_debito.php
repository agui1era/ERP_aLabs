

<html>
<body>

<?php
include("verificar_sesion.php");
$MONTO = $_POST['MONTO'];
echo "MONTO: <font color=\"red\"> ".$MONTO."</font><br>";
$DESCRIPCION = $_POST['DESCRIPCION'];
echo "DESCRIPCION: <font color=\"red\"> ".$DESCRIPCION."</font><br>";


$EMPRESA = 'FACTURA';
$NOTAS ='';
$PARA ='';
$RUT = '';
$EMAIL = '';
$FONO = '';
$DIRECCION = '';
$RUT_FACTURA = '';
$GIRO = $_POST['GIRO'];
$DIRECCION_FACTURACION = '';
$ITEM=$DESCRIPCION;


//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
include("conexion.php");
//echo $link;
$sql = "INSERT INTO alabscl_ventas.despachos (fecha,empresa,item,destinatario,correo,fono,direccion,rut,ID_BD,rut_factura,flag_factura,giro,monto,direccion_facturacion) VALUES ( NULL,'".$EMPRESA."   ".$NOTAS."','".$ITEM."','".$PARA."','".$EMAIL."','".$FONO."','".$DIRECCION."','".$RUT."',NULL,'".$RUT_FACTURA."','OK','".$GIRO."',".$MONTO.",'".$DIRECCION_FACTURACION."');";
//echo $sql."<BR>";
$result = mysql_query($sql);


if ($result==1)
{
//Titulo
$titulo = "INGRESADO: ".$MONTO;
//cabecera
echo $titulo."<BR>";
}
else{

$titulo= "ATENCION INGRESO INCORRECTO EN LA BD ";
};


?> 
</body>
</html>