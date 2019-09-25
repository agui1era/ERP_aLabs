
<?php

include("verificar_sesion.php");

 ?>                                 
<html>

<body>
<BR><BR>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">


<?php
//$link = mysql_connect("localhost", "alabscl_ventas","hkm150716");
include("conexion.php");

 
 $query = "select SUM(monto) from alabscl_ventas.despachos  WHERE  FECHA >= '".date("Y-m")."-01 00:00:00'  AND flag_factura <> '' ;";    // Esta linea hace la consulta 
 //$query = "select SUM(monto) from alabscl_ventas.despachos  WHERE   flag_factura <> '' ;"; 
  $res=mysql_query($query);
  $row=mysql_fetch_array($res);
  $iva_debito=($row[0]/1.19)*0.19;
  
  $query = "select SUM(IVA_credito) from alabscl_ventas.IVA WHERE fecha >= '".date("Y-m")."-01 00:00:00' ;";    // Esta linea hace la consulta 
  //$query = "select SUM(IVA_credito) from alabscl_ventas.IVA ;";    // Esta linea hace la consulta 
  //echo $query;
  $res=mysql_query($query);
  $row=mysql_fetch_array($res);
  $iva_credito=$row[0];
  
  echo "IVA DEBITO: <font color=\"red\">$".number_format($iva_debito, 0, ",", ".")."</font><br>";
  echo "IVA CREDITO: <font color=\"red\">$".number_format($iva_credito, 0, ",", ".")."</font><br>";
  echo "REMANENTE: <font color=\"red\">$".number_format($iva_debito-$iva_credito, 0, ",", ".")."</font><br><br>";
 

$query = "select * from alabscl_ventas.despachos  WHERE fecha >= '".date("Y-m")."-01 00:00:00' AND flag_factura <> '' ORDER BY FECHA DESC;";     // Esta linea hace la consulta 
//echo $query;
$result2 = mysql_query($query);  


echo "<strong>IVA DEBITO  </strong><br><br>";

echo '<TABLE   class="table table-bordered">';

echo ' <TR>  <TD> FECHA </TD>  <TD> ITEM </TD><TD> DESTINATARIO </TD><TD> EMAIL </TD> <TD> CELULAR </TD> <TD>  RUT FACTURA </TD> <TD>  MONTO </TD></TR> ';
while ($row=mysql_fetch_array($result2))
{

echo '<TR> <TD> &nbsp &nbsp';
			 echo $row["fecha"]."&nbsp &nbsp</TD>" ;
			 
echo         '<TD> &nbsp &nbsp';

             echo $row["item"]."&nbsp &nbsp</TD>" ;

echo         '<TD> &nbsp &nbsp';

             echo $row["destinatario"]."&nbsp &nbsp</TD>" ;
             
echo         '<TD> &nbsp ';

             echo $row["correo"]."&nbsp &nbsp</TD>" ;

echo         '<TD> &nbsp &nbsp';

             echo $row["fono"]."&nbsp &nbsp</TD>" ;
echo         '<TD> &nbsp &nbsp';

             echo $row["rut_factura"]."&nbsp &nbsp</TD>" ;
echo         '<TD> &nbsp &nbsp';

             echo number_format($row["monto"], 0, ",", ".")."&nbsp &nbsp</TD>" ;

   
echo     '</TR>';
}



echo '<TABLE   class="table table-bordered">';

echo "<strong>IVA CREDITO </strong><br><br>";
  
  $query = "select * from alabscl_ventas.IVA WHERE fecha >= '".date("Y-m")."-01 00:00:00';";    // Esta linea hace la consulta 
  //echo $query;
  $res2=mysql_query($query);
  
 echo ' <TR>  <TD> FECHA </TD>  <TD> DESCRIPCION</TD><TD> MONTO </TD></TR> ';
  
  while ($row=mysql_fetch_array($res2))
{

echo '<TR> <TD> &nbsp &nbsp';
			 echo $row["fecha"]."&nbsp &nbsp</TD>" ;
			 
echo         '<TD> &nbsp &nbsp';

             echo $row["descripcion"]."&nbsp &nbsp</TD>" ;

echo         '<TD> &nbsp &nbsp';

			 echo number_format($row["IVA_credito"], 0, ",", ".")."&nbsp &nbsp</TD>";
             
}
   
echo     '</TR>';


?> 
</body>
</html>
                            