
<?php

session_start();

if ( $_SESSION['YYY']=='OK')

    {
      header('Location:mantenedor23qSFs28ad.php');
    }  
 ?>

<html>
<head>
	<title></title>
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>

<body>


<p>&nbsp;</p>

<div class="jumbotron container ">

    
    <span><h2><strong> &nbsp; &nbsp; INGRESAR CONTRASE&Ntilde;A</strong></h2></span><BR><BR>
	
	<form name="mant_sesion" method="post" action="sesion.php">
	<span><strong> USER:</strong></span>
    <p> <input name="USER"  class="form-control"   /></p>
	<span><strong> PASS:</strong></span>
    <p> <input name="CLAVE"  class="form-control" type="password" /></p>
    </div>
	<div class="container ">
    <p><strong><span style="color:#FF0000;"><input name="Ingresar" value="INGRESAR" class="btn btn-info btn-lg" type="submit" /></span></strong></p>
	</div>

	</form>	
 

</body>
</html>

	
		