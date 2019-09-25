
<?php

include("verificar_sesion.php");

 ?>  
<html>
<body>

<?php

include("funciones.php");
include("conexion.php");

$MONTO = $_POST['MONTO'];
echo "MONTO: <font color=\"red\"> ".$MONTO."</font><br>";

$sql = "INSERT INTO `alabscl_ventas`.`registro_ventas_colaborador` (`ID_BD`,`FECHA`,`ITEM`,`CANTIDAD`,`TIPO`,`COMISION`,`PRECIO`) VALUES (NULL,CURRENT_TIMESTAMP,'PAGO COMISION',0,'',-".$MONTO.",0);";
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

 Enviar_push("PAGO COMISION", $MONTO,"o.jYs7YJBJdMyss5j02eQ11Z1ws7atIsp7");
 Enviar_push("PAGO COMISION", $MONTO,"o.4zyOy5iiJDQ7yVwweLkSe12xt4h7yMaW");
 //Enviar_email("PAGO COMISION",$titulo,'katherine@alabs.cl');
 //Enviar_email("PAGO COMISION",$titulo,'aguileraelectro@gmail.com');
echo "<br>".$titulo."<br> ";


?> 
</body>
</html>