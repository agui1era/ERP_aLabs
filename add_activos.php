
<html>
<body>

<?php
include("verificar_sesion.php");
include("funciones.php");
include("conexion.php");

$INVENTARIO= $_POST['INVENTARIO'];
echo "INVENTARIO: <font color=\"red\"> ".$INVENTARIO."</font><br>";

$CAJA = $_POST['CAJA'];
echo "CAJA: <font color=\"red\"> ".$CAJA."</font><br>";


$sql = "INSERT INTO alabscl_ventas.activos (id,fecha,inventario,caja) VALUES (NULL,CURRENT_TIMESTAMP,".$INVENTARIO.",".$CAJA.");";
$result = mysql_query($sql);

//echo $sql;



if ($result==1) 
{
//Titulo
$titulo = "SE HAN INGRESADO LOS ACTIVOS";
//cabecera
}
else{

$titulo= "ATENCION INGRESO INCORRECTO DEl REGISTRO";

};

Enviar_email("ACTIVOS ACTUALIZADOS",$titulo,'aguileraelectro@gmail.com');


echo "<br>".$titulo."<br> ";


?> 
</body>
</html>