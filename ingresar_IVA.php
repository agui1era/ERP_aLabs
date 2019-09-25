

<html>
<body>

<?php
include("verificar_sesion.php");
$MONTO = $_POST['MONTO'];
echo "MONTO: <font color=\"red\"> ".$MONTO."</font><br>";
$DESCRIPCION = $_POST['DESCRIPCION'];
echo "DESCRIPCION: <font color=\"red\"> ".$DESCRIPCION."</font><br>";


//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
include("conexion.php");
//echo $link;
$sql = "INSERT INTO alabscl_ventas.IVA (ID_BD,fecha,descripcion,IVA_credito) VALUES ( NULL,NULL ,'".$DESCRIPCION."',".$MONTO.");";
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