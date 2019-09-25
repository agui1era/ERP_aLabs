
<html>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<body>
<div >
<?php
//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
include("conexion.php");
include("verificar_sesion.php");
$fecha = date('Y-m-j');
$nuevafecha = strtotime ( '-1 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
 
//echo $nuevafecha;

$query = "select * from alabscl_ventas.despachos WHERE (fecha >= '".$nuevafecha." 00:00:00') AND (fecha <='".$nuevafecha." 23:59:59')  ORDER BY fecha DESC;";     // Esta linea hace la consulta 

//echo $query."<br>";
$result = mysql_query($query);  




echo "<B>DESPACHOS AYER </B> <br><br>";
	
while ($row=mysql_fetch_array($result))
{            
 
 if (($row["empresa"] != 'FACTURA') && ($row["empresa"] != ''))
             
			 {
             
             echo "_________________________________________________________________<br><br>";
			 // echo  "FECHA DE INGRESO DESPACHO: ".$row["fecha"]."<br><br>";
             echo "</B><font color=\"red\">EMPRESA: ".$row["empresa"]."</font></B><br>" ;
			 echo "</B><font color=\"blue\">ITEM: ".$row["item"]."</font></B><br>" ;
			 echo "<B>PARA: </B>".$row["destinatario"]."<br>" ;
			 echo "<B>EMAIL: </B>".$row["correo"]."<br>" ;
			 echo "<B>CELULAR: </B>".$row["fono"]."<br>" ;
             echo "<B>DIRECCION: </B>".$row["direccion"]."<br><br><br>" ;
			 
			 echo "	<B>DE:</B> Ingenieria Oscar Aguilera EIRL<br>"	;	
             echo " <B>RUT:</B> 76523193-0<br> "	;			 
			 echo " <B>CELULAR:</B> 987108266<br>";
			 echo " <B>DIRECCION</B>: Bravo 943 (Conserjeria) Providencia Santiago	<br> "	;
			 echo " <h3><B><font color=\"red\">WWW.ALABS.CL</font></B></h3><br>";
            
           
			 }			     
};


$query = "select * from alabscl_ventas.despachos WHERE (fecha >= '".date("Y-m-d")." 00:00:00') AND (fecha <='".date("Y-m-d")." 23:59:59')  ORDER BY fecha DESC;";
//echo $query."<br>";
$result = mysql_query($query);  



echo "<B>DESPACHOS HOY </B> <br><br>";
	
while ($row=mysql_fetch_array($result))
{            
          if (($row["empresa"] != 'FACTURA' ) && ($row["empresa"] != ''))
             
		  {
             echo "_________________________________________________________________<br><br>";
			 // echo  "FECHA DE INGRESO DESPACHO: ".$row["fecha"]."<br><br>";
             echo "</B><font color=\"red\">EMPRESA: ".$row["empresa"]."</font></B><br>" ;
			 echo "</B><font color=\"blue\">ITEM: ".$row["item"]."</font></B><br>" ;
			 echo "<B>PARA: </B>".$row["destinatario"]."<br>" ;
			 echo "<B>EMAIL: </B>".$row["correo"]."<br>" ;
			 echo "<B>CELULAR: </B>".$row["fono"]."<br>" ;
             echo "<B>DIRECCION: </B>".$row["direccion"]."<br><br><br>" ;
			 
			 echo "	<B>DE:</B> Ingenieria Oscar Aguilera EIRL<br>"	;	
             echo " <B>RUT:</B> 76523193-0<br> "	;			 
			 echo " <B>CELULAR:</B>987108266<br>";
			 echo " <B>DIRECCION</B>: Bravo 943 (Conserjeria) Providencia Santiago	<br> "	;
			 echo " <h3><B><font color=\"red\">WWW.ALABS.CL</font></B></h3><br>";
		  }
           
			     
};

$fecha = date('Y-m-j');
$nuevafecha = strtotime ( '+1 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
 
//echo $nuevafecha;

$query = "select * from alabscl_ventas.despachos WHERE (fecha >= '".$nuevafecha." 00:00:00') AND (fecha <='".$nuevafecha." 23:59:59')  ORDER BY fecha DESC;";     // Esta linea hace la consulta 
//echo $query."<br>";
$result = mysql_query($query);  



echo "<B>DESPACHOS MANANA </B> <br><br>";
	
while ($row=mysql_fetch_array($result))
{            
           if (($row["empresa"] != 'FACTURA' )&& ($row["empresa"] != ''))
             
			{
             
             echo "_________________________________________________________________<br><br>";
			 // echo  "FECHA DE INGRESO DESPACHO: ".$row["fecha"]."<br><br>";
             echo "</B><font color=\"red\">EMPRESA: ".$row["empresa"]."</font></B><br>" ;
			 echo "</B><font color=\"blue\">ITEM: ".$row["item"]."</font></B><br>" ;
			 echo "<B>PARA: </B>".$row["destinatario"]."<br>" ;
			 echo "<B>EMAIL: </B>".$row["correo"]."<br>" ;
			 echo "<B>CELULAR: </B>".$row["fono"]."<br>" ;
             echo "<B>DIRECCION: </B>".$row["direccion"]."<br><br>" ;
			 
			 echo "	<B>DE:</B> Ingenieria Oscar Aguilera EIRL<br>"	;	
             echo " <B>RUT:</B> 76523193-0<br> "	;			 
			 echo " <B>CELULAR:</B>987108266<br>";
			 echo " <B>DIRECCION</B>: Bravo 943 (Conserjeria) Providencia Santiago	<br> "	;
			 echo " <h3><B><font color=\"red\">WWW.ALABS.CL</font></B></h3><br>";
            
            }
			     
};


?> 
</div>
</body>
</html>