
<html>
<body>

<?php
include("verificar_sesion.php");
include("funciones.php");
include("conexion.php");

$MONTO = $_POST['MONTO'];
echo "MONTO: <font color=\"red\"> ".$MONTO."</font><br>";

$sql = "INSERT INTO `alabscl_ventas`.`registro_ventas_colaborador` (`ID_BD`,`FECHA`,`ITEM`,`CANTIDAD`,`TIPO`,`COMISION`,`PRECIO`) VALUES (NULL,CURRENT_TIMESTAMP,'DEPOSITO',0,'COBRO',0,-".$MONTO.");";
$result2 = mysql_query($sql);

//$sql = "INSERT INTO alabscl_ventas.registro_depositos (`TIPO`,`Depositos`, `Fecha`, `ID_BD`) VALUES ('DEPOSITO',".$MONTO.", CURRENT_TIMESTAMP, NULL);";
//$result = mysql_query($sql);

if  ($result2==1)
{
//Titulo
$titulo = "SE HA DEPOSITADO: ".$MONTO;
//cabecera
}
else{

$titulo= "ATENCION INGRESO INCORRECTO DE DEPOSITO: ".$MONTO;
};

Enviar_push("SE HA DEPOSITADO", $MONTO,"o.jYs7YJBJdMyss5j02eQ11Z1ws7atIsp7");
Enviar_push("SE HA DEPOSITADO", $MONTO,"o.4zyOy5iiJDQ7yVwweLkSe12xt4h7yMaW");
//Enviar_email("SE HA DEPOSITADO",$titulo,'katherine@alabs.cl');
//Enviar_email("SE HA DEPOSITADO",$titulo,'aguileraelectro@gmail.com');
echo "<br>".$titulo."<br> ";


?> 
</body>
</html>