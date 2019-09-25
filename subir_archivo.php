
<?php

include("verificar_sesion.php");
include("funciones.php");
include("conexion.php");

  
$nombre = $_POST['nombre'];
echo "DESTINATARIO: <font color=\"red\"> ".$nombre."</font><br>";

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

$COD_SEGUIMIENTO = $_POST['cod_seguimiento'];
echo "CÓDIGO DE SEGUIMIENTO: <font color=\"red\"> ".$ID."</font><br>";	

if ($metodo != 'MERCADO ENVIOS')

{

	echo "INGRESO <BR>";

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
  $nombre_archivo=date("Y-m-d")."_". date('G:i:s').".jpg";
  
  move_uploaded_file($_FILES['archivo']['tmp_name'],"/var/zpanel/hostdata/zadmin/public_html/alabs_cl/rastreos/" .$nombre_archivo);
  echo "<br> NOMBRE ARCHIVO: <font color=\"red\"> ".$nombre_archivo."</font><br>"; 
 
 //$comando_linux='python /root/envia2.py " COMPROBANTE: www.alabs.cl/rastreos/'.$nombre_archivo.'" "  ...........RESUMEN DE LA COMPRA >> PRODUCTO: ' .$item.'" " PARA: '.$nombre.'" " METODO: '.$metodo.'   DIRECCION: ' .$direccion.'" " .....................PARA DESCARGAR SOFTWARE Y TUTORIALES  WWW.ALABS.CL EN LA DESCRIPCION DE CADA PRODUCTO" "aLabs --- TU COMPRA HA SIDO DESPACHADA --- aLabs" '.$correo;
 //$comando_linux='python /root/envia2.py " COMPROBANTE: http://www.alabs.cl/rastreos/'.$nombre_archivo.' " " DIRECCION: ' .$direccion.'" . .  " METODO: '.$metodo.'" " '. $nombre . ' TU COMPRA HA SIDO DESPACHADA " '.$correo;
 //echo $comando_linux."<br>";
  $cuerpo="CODIGO DE RASTREO: ".$COD_SEGUIMIENTO." --- DIRECCION:  "  .$direccion. " --- METODO:   ".$metodo ;
  $asunto= $nombre." TU COMPRA HA SIDO DESPACHADA ";
  
  // $output = shell_exec($comando_linux);
  Enviar_email($asunto,$cuerpo,$correo);
   
  $correo='aguileraelectro@gmail.com';
  Enviar_email($asunto,$cuerpo,$correo);
 

 
 $query="UPDATE alabscl_ventas.despachos SET rastreo = '" .$nombre_archivo."' WHERE despachos.ID_BD ='".$ID."';";
 $result= mysql_query($query); 

//echo $query;
  

if($result <> 1)
{
$estado=" <br><br> <b><h1> ERROR AL ACTUALIZAR BD</h1></b> <br> <br>";
echo $estado;
}

 $mensaje="Tu compra ".$item." ha sido despachada por ".$metodo." codigo de seguimiento ".$COD_SEGUIMIENTO." Mas productos en   www.aLabs.cl";
	   $numero=$fono;

                        curl_setopt_array($ch = curl_init(), array(
                            CURLOPT_URL => "http://panel.smasivos.com/api.envio.new.php",
                            CURLOPT_POST => TRUE,
                            CURLOPT_RETURNTRANSFER => TRUE,
                            CURLOPT_POSTFIELDS => array(
                            "apikey" => "4bc8d9178019cd396a0f9dad3f3e82f12d57cd98",
                            "mensaje" => $mensaje,
                            "numcelular" => $numero,
                            "numregion" => "56"
                                    )
                                )
                        );
                        $respuesta=curl_exec($ch);
                        curl_close($ch);
                        $respuesta=json_decode($respuesta);
                        echo $respuesta->mensaje;

}

}
  else
  {
   
    $query="UPDATE alabscl_ventas.despachos SET rastreo = 'MERCADO ENVIOS' WHERE despachos.ID_BD ='".$ID."';";
    $result= mysql_query($query);  
	Enviar_SMS($fono,"Tu compra  ".$item."   ha sido despachada , en tu cuenta mercadolibre estara disponible el rastreo.      www.aLabs.cl");
	  
  }
?>