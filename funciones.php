<?php

function Enviar_push($titulo,$cuerpo,$token)
{
	$curl = curl_init('https://api.pushbullet.com/v2/pushes');

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer '.$token]);
	curl_setopt($curl, CURLOPT_POSTFIELDS, ["email" => "", "type" => "link", "title" => $titulo, "body" => $cuerpo, "url" => ""]);

// UN-COMMENT TO BYPASS THE SSL VERIFICATION IF YOU DON'T HAVE THE CERT BUNDLE (NOT RECOMMENDED).
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

	$response = curl_exec($curl);

print_r($response);
}

function Enviar_SMS($numero,$mensaje)

{

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

function venta_inversionistas($ITEM,$CANTIDAD)
{
	
	
    $error_general=0;
	$query = "select * from `alabscl_ventas`.`stock_inversionistas` where producto='".$ITEM."';";     // Esta linea hace la consulta 
	$result = mysql_query($query);  
    //echo $result;
  while ($registro = mysql_fetch_array($result))
         {  
            //echo $registro['cantidad'] ;
			$cantidad_bd=$registro['cantidad'];
			$nombre=$registro['nombre'];
			$producto=$registro['producto'];
			$correo=$registro['correo'];
			$monto_pago=$registro['monto_pago'];
		         
		  };
if ($producto<> '')
{
	   $diff=((int)$cantidad_bd -(int)$CANTIDAD);
	   $pago=((int)$monto_pago *(int)$CANTIDAD);
	   
	   //echo $diff;		    		   
	      
  $sql = "INSERT INTO alabscl_ventas.registro_ventas_inversionistas (ID,inversionista,fecha,producto,cantidad,precio) VALUES (NULL,'".$nombre."',CURRENT_TIMESTAMP,'".$producto."',".$CANTIDAD.",".$pago.");";
  //echo $sql;
  $result = mysql_query($sql);

  if($result <> 1)
	  {
	  $estado="ERROR INSERT registro INVERSIONISTA "." codigo: ".$result."<br>";
	  $error_general=1;
	  };


   $query="UPDATE alabscl_ventas.stock_inversionistas SET cantidad = '".$diff."' WHERE stock_inversionistas.producto ='".$ITEM."';";
   $result = mysql_query($query); 

  if($result <> 1)
	  {
	  $estado="ERROR UPDATE stock INVERSIONIASTA "." codigo: ".$result."<br>";
	  $error_general=1;
	  };

  if ($error_general==0)
	{	
//Titulo
	$titulo = "SE HA VENDIDO: ".$ITEM." CANTIDAD: ".$CANTIDAD." TIPO: ".$TIPO." ESTADO:".$estado;
//cabecera
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//direcci�n del remitente 
	$headers .= "From: VENTA REALIZADA:".$estado."<VENTA>\r\n";
	$bool = mail($correo,$titulo,$mail,$headers);
	echo $correo;
	
	Enviar_push("VENTA", $ITEM,"o.IxdiuS1Alo2zaZ2W47utHGZlpQJUfG00");
	}
};
  return $error_general;
	
};

function updata_stock_oc()

{
	
	$query = "select * from alabscl_ventas.stock_general ;";     
	$result2 = mysql_query($query);  


	while ($row=mysql_fetch_array($result2))
		{

		$sku=$row["item"];
		$stock=$row["cantidad"];
		$precio=$row["precio"];
				
		$query = "SELECT post_id FROM zadmin_alabswp.wp_postmeta WHERE meta_key='_sku' AND meta_value='". $sku."' ; ";    // Esta linea hace la consulta 
		 //echo $query ."<BR>";
		$result = mysql_query($query);  
    
		$row=mysql_fetch_array($result);
  
        //echo  $row[0];
	
		$query = "UPDATE zadmin_alabswp.wp_postmeta SET  meta_value=".$stock." WHERE meta_key='_stock' AND post_id='". $row[0]."' ;";
		//echo $sku ."<BR>";
		//echo $query ."<BR>";
		
		$result = mysql_query($query);  
	
		$query = "UPDATE zadmin_alabswp.wp_postmeta SET  meta_value=".$precio." WHERE meta_key='_price' AND post_id='". $row[0]."' ;";
		//echo $query ."<BR>";
		$result = mysql_query($query); 

        if 	($stock >= 1)
		    {
				$query = "UPDATE zadmin_alabswp.wp_postmeta SET  meta_value='instock' WHERE meta_key='_stock_status' AND post_id='". $row[0]."' ;";				
				//echo $query ."<BR>";
				$result = mysql_query($query);
			}
          else
			{
				$query = "UPDATE zadmin_alabswp.wp_postmeta SET  meta_value='outofstock' WHERE meta_key='_stock_status' AND post_id='". $row[0]."' ;";	
				$result = mysql_query($query);
			}			
			       
        };
	

return 0;	
}

function Enviar_email($asunto,$body,$destinatario)

{

   require_once 'PHPMailerAutoload.php';
	
	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; // or 587
	$mail->IsHTML(true);
	$mail->Username = "alabs@alabs.cl";
	$mail->Password = "skypic6616";
	$mail->SetFrom("alabs@alabs.cl");
	$mail->Subject = $asunto;
	$mail->Body = $body;
	$mail->AddAddress($destinatario);

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }	
	
}

function calcular_comision($precio)
{

 $COMISION=0.07;
 $COMISION_MIN=2000;
 $COMISION_MAX=10000;


	if (($COMISION*$precio) < $COMISION_MIN)
	{
	 return $COMISION_MIN;	
	}
	
	if (($COMISION*$precio) > $COMISION_MAX)
	{
	 return $COMISION_MAX;	
	}
	
	if (($COMISION*$precio >= $COMISION_MIN) || ($COMISION*$precio <= $COMISION_MAX))
	{
	 return $COMISION*$precio;
	}
	
	
}





?>