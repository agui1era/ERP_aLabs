
<?php

include("verificar_sesion.php");
include("funciones.php");

$nombre = $_POST['nombre'];
echo "DESTINATARIO: <font color=\"red\"> ".$nombre."</font><br>";

$rut = $_POST['rut'];
echo "RUT: <font color=\"red\"> ".$rut."</font><br>";

$item = $_POST['item'];
echo "ITEM: <font color=\"red\"> ".$item."</font><br>";

$correo = $_POST['correo'];
echo "CORREO: <font color=\"red\"> ".$correo."</font><br>";	

$fono = $_POST['fono'];
echo "FONO: <font color=\"red\"> ".$fono."</font><br>";	
	
$metodo = $_POST['metodo'];
echo "METODO: <font color=\"red\"> ".$metodo."</font><br>";

$direccion = $_POST['direccion'];
echo "DIRECCION DE DESPACHO: <font color=\"red\"> ".$direccion."</font><br>";

$ID = $_POST['ID'];
echo "ID: <font color=\"red\"> ".$ID."</font><br>";

$monto= $_POST['monto'];
echo "MONTO: <font color=\"red\"> ".$monto."</font><br>";

$giro = $_POST['giro'];
echo "GIRO: <font color=\"red\"> ".$giro."</font><br>";	
	

if ($_FILES['archivo']["error"] > 0)
  {
  echo "Error: " . $_FILES['archivo']['error'] . "<br>";
  }
else
  {
  echo "Nombre: " . $_FILES['archivo']['name'] . "<br>";
  echo "Tipo: " . $_FILES['archivo']['type'] . "<br>";
  echo "Tamano: " . ($_FILES["archivo"]["size"] / 1024) . " kB<br>";
  echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name'];

  /*ahora co la funcion move_uploaded_file lo guardaremos en el destino que queramos*/
  $nombre_archivo=date("Y-m-d")."_". date('G:i:s').".pdf";
  
  move_uploaded_file($_FILES['archivo']['tmp_name'],"/var/zpanel/hostdata/zadmin/public_html/alabs_cl/rastreos/" .$nombre_archivo);
 echo "<br> NOMBRE ARCHIVO: <font color=\"red\"> ".$nombre_archivo."</font><br>"; 
 
 //$comando_linux='python /root/envia2.py " COMPROBANTE: www.alabs.cl/rastreos/'.$nombre_archivo.'" "  ...........RESUMEN DE LA COMPRA >> PRODUCTO: ' .$item.'" " PARA: '.$nombre.'" " METODO: '.$metodo.'   DIRECCION: ' .$direccion.'" " .....................PARA DESCARGAR SOFTWARE Y TUTORIALES  WWW.ALABS.CL EN LA DESCRIPCION DE CADA PRODUCTO" "aLabs --- TU COMPRA HA SIDO DESPACHADA --- aLabs" '.$correo;
   $cuerpo='FACTURA: http://www.alabs.cl/rastreos/'.$nombre_archivo;
   $asunto= $nombre . ' FACTURA  de tu compra  ';
  //echo $comando_linux;
   Enviar_SMS((int)$fono,"La factura de tu compra  ".$item."   ha sido enviada a tu email    ".$correo. "    www.aLabs.cl");
   Enviar_email($asunto,$cuerpo,$correo);
   $correo='aguileraelectro@gmail.com';
   Enviar_email($asunto,$cuerpo,$correo);
 //echo $output."OUT";
   
 //$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
 include("conexion.php");
 
 $query="UPDATE alabscl_ventas.despachos SET factura = '".$nombre_archivo."', flag_factura='OK'  WHERE despachos.ID_BD ='".$ID."';";
 $result= mysql_query($query);  

//echo $query;

if($result <> 1)
{
$estado=" <br><br> <b><h1> ERROR AL ACTUALIZAR BD</h1></b> <br> <br>";
echo $estado;
}

 

}
?>