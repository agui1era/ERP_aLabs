
<?php

include("verificar_sesion.php");


$correo = $_POST['CORREO'];
echo "CORREO: <font color=\"red\"> ".$correo."</font><br>";

$item = $_POST['ITEM'];
echo "ITEM: <font color=\"red\"> ".$item."</font><br>";


$celular = $_POST['CELULAR'];
echo "CELULAR: <font color=\"red\"> ".$celular."</font><br>";



 
 $comando_linux='python /root/envia2.py "PARA COMPRA DIRECTA: " " Katherine cel: 996386399 (si no contesta, enviar un mensaje usando whatsapp y respondera a la brevedad)"  "....... PARA DESPACHOS Y SOPORTE TECNICO" " Oscar cel: 987108266 (tiene whatsapp) email: oscar@alabs.cl" . "Favor confimar compra de '.$item.'" '.$correo;
// echo $comando_linux;
// $output = shell_exec($comando_linux);
 
 //$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
 include("conexion.php");
//echo $link;
 $sql = "INSERT INTO alabscl_ventas.pre_comprador (id,nombre,celular,email,mensaje,fecha,item) VALUES (NULL,'',".$celular.",'".$correo."','',CURRENT_TIMESTAMP,'".$item."');";
 //echo $sql;
 $result = mysql_query($sql);
 
 $correo2=$correo;
 $correo='aguileraelectro+notificador@gmail.com';

 
 $comando_linux='python /root/envia2.py '.$correo2.' . . . . "CORREO ENVIADO '.$item.'" '.$correo;
 //echo $comando_linux;
 //$output = shell_exec($comando_linux);
 
 if ($item  <> 'INGRESO_CLIENTE' )
	 
	 {
       $mensaje="Para la compra de ".$item." puedes coordinar con Oscar al celular  987108266 o en www.aLabs.cl";

                        curl_setopt_array($ch = curl_init(), array(
                            CURLOPT_URL => "http://panel.smasivos.com/api.envio.new.php",
                            CURLOPT_POST => TRUE,
                            CURLOPT_RETURNTRANSFER => TRUE,
                            CURLOPT_POSTFIELDS => array(
                            "apikey" => "4bc8d9178019cd396a0f9dad3f3e82f12d57cd98",
                            "mensaje" => $mensaje,
                            "numcelular" => $celular,
                            "numregion" => "56"
                                    )
                                )
                        );
                        $respuesta=curl_exec($ch);
                        curl_close($ch);
                        $respuesta=json_decode($respuesta);
                        echo $respuesta->mensaje;
						echo "<br>";
	 }

 /*
  $comando_linux='python /root/envia2.py "ITEM: '.$item.'" "CELULAR: '.$celular .'"  .   .   . "COORDINAR COMPRA "  Kathycornejoza@gmail.com ';
 //echo $comando_linux;
 //$output = shell_exec($comando_linux);
 

 
	   $mensaje="Favor llamame a mi numero ".$celular." necesito un ".$item;
	   $numero="996386399";

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

 
 $titulo= "NOTIFICACION ENVIADA ".$correo2;
 $headers = "MIME-Version: 1.0\r\n"; 
 $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//dirección del remitente 
 $headers .= "From: CONFIRMADOR<NOTIFICACION>\r\n";

$bool = mail("aguileraelectro+CONFIRMADOR@gmail.com",$titulo,$mail,$headers);
*/
?>