
<?php

session_start();

if ( $_SESSION['YYY']=='OK')

    {
      header('Location:confirmador_html.php');
    }  
 ?>


<html>
<head>
	<title></title>
</head>
<body>

<p>&nbsp;</p>

<h2><strong><span style="color:#0000CD;">INGRESAR CONTRASE&Ntilde;A</span></strong></h2>
	
	<form name="mant_sesion" method="post" action="sesion_confirmador.php">

    <p><span style="color:#0000CD;"><input name="CLAVE" size="40" type="password" /></span></p>

    <p><strong><span style="color:#FF0000;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<input name="Ingresar" type="submit" /></span></strong></p>

	</form>	
	
<p><strong><span style="color:#FF0000;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;CONFIRMADOR</span></strong></p>
</body>
</html>

	
	