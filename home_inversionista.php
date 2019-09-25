
<?php

include("verificar_sesion.php");

 ?>     


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>SISTEMA DE CONTROL DE VENTAS</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="script.js"> </script>

<script>
function ver_ventas(){
        
        $.ajax({
               
                url:   'ver_ventas_inversionistas.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                }
        });
}
</script>
<script>
function ver_stock(){
        
        $.ajax({
               
                url:   'ver_stock_inversionistas.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                }
        });
}
</script>

</head>
<body>

  <div class="container">
   <ul class="nav nav-pills">
   <li><a data-toggle="tab" href="#sectionA"><h4>SELECCIONAR<h4> </a> </li>
        
    </ul>
		<div class="tab-content">
	
	       <div id="sectionA" class="tab-pane fade in active">
                <br><br>				
				<input type="button" class="btn btn-info btn-lg"  href="javascript:;" onclick="ver_ventas();return false;" value="Ver Ventas"/>&nbsp
				<input type="button" class="btn btn-info btn-lg"  href="javascript:;" onclick="ver_stock();return false;" value="Ver Stock"/>
				 <BR><BR>
				<span id="resultado"></span>
				
			</div>
          </div> 
     
   </div>

</body>
</html>         