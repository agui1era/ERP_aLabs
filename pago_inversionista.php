
<html>
<body>

<?php
include("verificar_sesion.php");
include("conexion.php");
include("funciones.php");

$MONTO = $_POST['MONTO'];
echo "MONTO: <font color=\"red\"> ".$MONTO."</font><br>";

//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
//echo $link;


$sql = "INSERT INTO alabscl_ventas.registro_ventas_inversionistas (ID,inversionista,fecha,producto,cantidad,precio) VALUES (NULL,'INVERSIONISTA',CURRENT_TIMESTAMP,'TRANSFERENCIA',1,-".$MONTO.");";
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

$headers = "MIME-Version: 1.0\r\n"; 

echo "<br>".$titulo."<br> ";

 Enviar_push("PAGO INVERSIONISTA", $titulo,"o.jYs7YJBJdMyss5j02eQ11Z1ws7atIsp7");
 Enviar_push("PAGO INVERSIONISTA", $titulo,"o.IxdiuS1Alo2zaZ2W47utHGZlpQJUfG00");
 //Enviar_email("PAGO INVERSIONISTA",$titulo,'aguileraelectro@gmail.com');
 //Enviar_email("PAGO INVERSIONISTA",$titulo,'cgonzah@gmail.com ');

?> 
</body>
</html>