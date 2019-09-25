

<html>


<body>

<?php

include("funciones.php");
include("verificar_sesion.php");

$EMPRESA = $_POST['EMPRESA'];
echo "EMPRESA: <font color=\"red\"> ".$EMPRESA."</font><br>";
$DIA_DESPACHO = $_POST['DIA_DESPACHO'];
echo "DIAS DE PLAZO: <font color=\"red\"> ".$DIA_DESPACHO."</font><br>";
$NOTAS = $_POST['NOTAS'];
echo "NOTAS: <font color=\"red\"> ".$NOTAS."</font><br>";
$ITEM= $_POST['ITEM'];
echo "ITEM: <font color=\"red\"> ".$ITEM."</font><br>";
$PARA = $_POST['PARA'];
echo "PARA: <font color=\"red\"> ".$PARA."</font><br>";
$RUT = $_POST['RUT'];
echo "RUT: <font color=\"red\"> ".$RUT."</font><br>";
$EMAIL = $_POST['EMAIL'];
echo "EMAIL: <font color=\"red\"> ".$EMAIL."</font><br>";
$FONO = $_POST['FONO'];
echo "CEL: <font color=\"red\"> ".$FONO."</font><br>";
$DIRECCION = $_POST['DIRECCION'];
echo "DIRECCION: <font color=\"red\"> ".$DIRECCION."</font><br>";

$RUT_FACTURA = $_POST['RUT_FACTURA'];
echo "RUT_FACTURA: <font color=\"red\"> ".$RUT_FACTURA."</font><br>";

$MONTO = $_POST['MONTO'];
echo "MONTO: <font color=\"red\"> ".$MONTO."</font><br>";
$GIRO = $_POST['GIRO'];
echo "RAZON SOCIAL Y GIRO: <font color=\"red\"> ".$GIRO."</font><br>";
$DIRECCION_FACTURACION = $_POST['DIRECCION_FACTURACION'];
echo "DIRECCION_FACTURACION: <font color=\"red\"> ".$DIRECCION_FACTURACION."</font><br>";

$FACTURA = $_POST['FACTURA'];
echo "FACTURA: <font color=\"red\"> ".$FACTURA."</font><br>";



if ((int)$DIA_DESPACHO > 0)

{
    $fecha = date('Y-m-j');
    $nuevafecha = strtotime ( '+'.$DIA_DESPACHO.' day' , strtotime ( $fecha ) ) ;
    $nuevafecha = date ( 'Y-m-j' , $nuevafecha );

	$time=$nuevafecha." 00:00:00";
	echo "FECHA DESPACHO: ".$time;

}

else {

	$dia=date('d');
	$dia_siguiente=(int)$dia+(int)$DIA_DESPACHO;
	$timestamp = date('Y-m-d G:i:s');

	$anno=date('Y');
	$mes=date('m');

	$time=$anno."-".$mes."-".$dia_siguiente." ".date('G:i:s');
	echo "FECHA DESPACHO: ".$time;

};


//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
//echo $link;
include("conexion.php");

if ($FACTURA== "NADA")
   {
	$sql = "INSERT INTO alabscl_ventas.despachos (fecha,empresa,item,destinatario,correo,fono,direccion,rut,ID_BD,monto) VALUES ( '".$time."','".$EMPRESA."   ".$NOTAS."','".$ITEM."','".$PARA."','".$EMAIL."','".$FONO."','".$DIRECCION."','".$RUT."',NULL,".$MONTO.");";
	//echo $sql."<BR>";
	$result = mysql_query($sql);
   }
   
if ($FACTURA == "FACTURA")
	{
	$sql = "INSERT INTO alabscl_ventas.despachos (fecha,empresa,item,destinatario,correo,fono,direccion,rut,ID_BD,rut_factura,flag_factura,giro,monto,direccion_facturacion) VALUES ( '".$time."','".$EMPRESA."   ".$NOTAS."','".$ITEM."','".$PARA."','".$EMAIL."','".$FONO."','".$DIRECCION."','".$RUT."',NULL,'".$RUT_FACTURA."','SI','".$GIRO."',".$MONTO.",'".$DIRECCION_FACTURACION."');";
	//echo $sql."<BR>";
	$result = mysql_query($sql);
	
	}
	
if ($FACTURA=='BOLETA')
				
	{

    $RUT_FACTURA='';
	//$EMPRESA='FACTURA';
	$sql = "INSERT INTO alabscl_ventas.despachos (fecha,empresa,item,destinatario,correo,fono,direccion,rut,ID_BD,rut_factura,flag_factura,giro,monto,direccion_facturacion) VALUES ( '".$time."','".$EMPRESA."   ".$NOTAS."','".$ITEM."','".$PARA."','".$EMAIL."','".$FONO."','".$DIRECCION."','".$RUT."',NULL,'".$RUT_FACTURA."','BOLETA','".$GIRO."',".$MONTO.",'".$DIRECCION_FACTURACION."');";
	echo $sql."<BR>";
	$result = mysql_query($sql);	
	$EMPRESA='';
					
	}
	
if ($result==1)
 {
	//Titulo
	$titulo = "NUEVO DESPACHO: ".$EMPRESA;
	//cabecera

	if (($EMPRESA != 'FACTURA' ) && ($PARA != '') )
             
		{

			$producto=$ITEM;
			$nombre_destinatario=$PARA;
			$correo=$EMAIL;
			$direccion=$DIRECCION;
			$metodo=$EMPRESA;
							
			 $cuerpo="PRODUCTO: ".$ITEM." --- DIRECCION:  "  .$direccion. " --- METODO:   ".$metodo ;
             $asunto= $nombre." TU COMPRA ESTA SIENDO PROCESADA ";
  
             Enviar_SMS($FONO,"Tu compra  ".$ITEM."   esta siendo  procesada   www.aLabs.cl");
			 Enviar_push("NUEVO DESPACHO", $cuerpo,"o.jYs7YJBJdMyss5j02eQ11Z1ws7atIsp7");
             Enviar_push("NUEVO DESPACHO", $cuerpo,"o.4zyOy5iiJDQ7yVwweLkSe12xt4h7yMaW");
            // $output = shell_exec($comando_linux);
             Enviar_email($asunto,$cuerpo,$correo);
			 
			 $correo='aguileraelectro@gmail.com';
			 Enviar_email($asunto,$cuerpo,$correo);
			 
			 			 
			 echo "<br>".$titulo."<br> <br> ";
			 echo "<input type=\"button\" value=\"VER DESPACHOS\" onClick=\" window.location.href='despachosWEsadasd323.php'\" ><br>";
			 
				
			
			}
			
	
	   if ($EMPRESA == 'FACTURA' )
		   {
		 
			$producto=$ITEM;
			$nombre_destinatario='';
			$correo=$EMAIL;
			$direccion=$DIRECCION;
			$metodo=$EMPRESA;
		
			$cuerpo='PRODUCTO: ' .$producto.' --- RUT FACTURA: '.$RUT_FACTURA.'--- CELULAR: '.$FONO.' --- MONTO: '.$MONTO;
			$asunto=$nombre_destinatario .' TU FACTURA ESTA EN PROCESO  ';
			
			//$output = shell_exec($comando_linux);
			
			 Enviar_SMS($FONO,"La factura de tu compra  ".$ITEM."   esta en proceso y sera enviada a tu email    ".$EMAIL. "    www.aLabs.cl");
			
			 Enviar_push("NUEVA FACTURA", $producto,"o.jYs7YJBJdMyss5j02eQ11Z1ws7atIsp7");
             Enviar_push("NUEVA FACTURA", $producto,"o.4zyOy5iiJDQ7yVwweLkSe12xt4h7yMaW");
		
			 Enviar_email($asunto,$cuerpo,$correo);
			 
			 $correo="aguileraelectro+factura@gmail.com";
			 Enviar_email($asunto,$cuerpo,$correo);
						
			 $correo="kathycornejoza@gmail.com ";
		     Enviar_email($asunto,$cuerpo,$correo);
			 
			 
		
			
    
	    }
  }
 else
  {

  $titulo= "<h1> ATENCION INGRESO INCORRECTO DE DESPACHO: ".$EMPRESA ."</h1>";
   };


?> 
</body>
</html>