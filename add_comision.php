 
<html>
<body>

<?php

include("verificar_sesion.php");
include("funciones.php");
include("conexion.php");

$MONTO = $_POST['MONTO'];
echo "MONTO: <font color=\"red\"> ".$MONTO."</font><br>";

$sql = "INSERT INTO alabscl_ventas.registro_ventas (FECHA,ITEM,CANTIDAD,TIPO,VENDEDOR,PRECIO,MARGEN,COMISION,ID_VENTAS) VALUES (CURRENT_TIMESTAMP,'COMISION',0,'','',0,0,".$MONTO.",NULL);";
$result = mysql_query($sql);

$sql = "INSERT INTO `alabscl_ventas`.`registro_ventas_colaborador` (`ID_BD`,`FECHA`,`ITEM`,`CANTIDAD`,`TIPO`,`COMISION`,`PRECIO`) VALUES (NULL,CURRENT_TIMESTAMP,'COMISION',0,'',".$MONTO.",0);";
$result2 = mysql_query($sql);

if  (($result==1) && ($result2==1) )
{
//Titulo
$titulo = "SE HA INGRESADO LA COMISION: ".$MONTO;
//cabecera
}
else{

$titulo= "ATENCION INGRESO INCORRECTO DE LA COMISION: ".$MONTO;
};

 Enviar_push("SE HA INGRESADO LA COMISION", $MONTO,"o.jYs7YJBJdMyss5j02eQ11Z1ws7atIsp7");
 Enviar_push("SE HA INGRESADO LA COMISION", $MONTO,"o.4zyOy5iiJDQ7yVwweLkSe12xt4h7yMaW");
 //Enviar_email("INGRESO DE COMISION",$titulo,'katherine@alabs.cl');
 //Enviar_email("INGRESO DE COMISION",$titulo,'aguileraelectro@gmail.com');



echo "<br>".$titulo."<br> ";


?> 
</body>
</html>