
<?php

include("verificar_sesion.php");

 ?>  
<html>
<body>

<?php
$MONTO = $_POST['MONTO'];
echo "MONTO: <font color=\"red\"> ".$MONTO."</font><br>";

//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
//echo $link;
include("conexion.php");

$sql = "INSERT INTO `alabscl_ventas`.`registro_venta_directa` (`ID_BD`,`FECHA`,`ITEM`,`CANTIDAD`,`TIPO`,`PRECIO`) VALUES (NULL,CURRENT_TIMESTAMP,'DEPOSITO',1,'COBRO',-".$MONTO.");";
//echo $sql;
$result = mysql_query($sql);

if  ($result==1)
{
//Titulo
$titulo = "SE HA INGRESADO EL PAGO: ".$MONTO;
//cabecera
}
else{

$titulo= "ATENCION INGRESO INCORRECTO DEL PAGO: ".$MONTO;
};


Enviar_email("PAGO VENTA DIRECTA",$titulo,'aguileraelectro@gmail.com');

echo "<br>".$titulo."<br> ";


?> 
</body>
</html>