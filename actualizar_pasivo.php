

<html>
<body>

<?php
include("verificar_sesion.php");
include("funciones.php");
include("conexion.php");

$PASIVO= $_POST['PASIVO'];
echo "PASIVO: <font color=\"red\"> ".$PASIVO."</font><br>";

//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");

//echo $link;

$sql = "UPDATE alabscl_ventas.pasivos SET valor=".$PASIVO." WHERE tipo ='deuda_internacional';";
$result = mysql_query($sql);

//echo $sql;

if ($result==1) 
{
//Titulo
$titulo = "SE HAN INGRESADO LOS PASIVOS";
//cabecera
}
else{

$titulo= "ATENCION INGRESO INCORRECTO DEl REGISTRO";

};

Enviar_email("PASIVO ACTUALIZADO",$titulo,'aguileraelectro@gmail.com');

echo "<br>".$titulo."<br> ";


?> 
</body>
</html>