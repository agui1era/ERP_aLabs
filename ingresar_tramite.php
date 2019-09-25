
<?php

include("verificar_sesion.php");

 ?>  


<html>
<body>

<?php
$TIPO = $_POST['TIPO'];
echo "TIPO: <font color=\"red\"> ".$TIPO."</font><br>";
$DESCRIPCION = $_POST['DESCRIPCION'];
echo "DESCRIPCION: <font color=\"red\"> ".$DESCRIPCION."</font><br>";


if ( $DESCRIPCION != "")
{
//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
include("conexion.php");
//echo $link;
$sql = "INSERT INTO alabscl_ventas.tramites (id,fecha,tipo,descripcion) VALUES ( NULL,NULL ,'".$TIPO."','".$DESCRIPCION."');";
//echo $sql."<BR>";
$result = mysql_query($sql);


if ($result==1)
{
//Titulo
$titulo = "NUEVA TAREA: ".$TIPO;
//cabecera
}
else{

$titulo= "ATENCION INGRESO INCORRECTO DE LA TAREA: ".$TIPO;
};

$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//dirección del remitente 
$headers .= "From: TAREA<TRAMITE>\r\n";

$bool = mail("Kathycornejoza@gmail.com",$titulo,$mail,$headers);
$bool = mail("aguileraelectro+ventas@gmail.com",$titulo,$mail,$headers);

echo "<br>".$titulo."<br> <br> ";
echo "<input type=\"button\" value=\"VER TAREAS\" onClick=\" window.location.href='ver_tramites.php'\" ><br>";
}
?> 
</body>
</html>