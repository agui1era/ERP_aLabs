<html>
    <head>
        <title>Enviando Mensaje </title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>

<body> 


<?php

include("verificar_sesion.php");


       
	   $mensaje="MAMOR";
	   $numero="984153050";

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
                                                                                               
                    ?>

      
</body>
</html>