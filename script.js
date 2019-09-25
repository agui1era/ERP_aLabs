function VerificaRut(rut) {
    if (rut.toString().trim() != '' && rut.toString().indexOf('-') > 0) {
        var caracteres = new Array();
        var serie = new Array(2, 3, 4, 5, 6, 7);
        var dig = rut.toString().substr(rut.toString().length - 1, 1);
        rut = rut.toString().substr(0, rut.toString().length - 2);

        for (var i = 0; i < rut.length; i++) {
            caracteres[i] = parseInt(rut.charAt((rut.length - (i + 1))));
        }

        var sumatoria = 0;
        var k = 0;
        var resto = 0;

        for (var j = 0; j < caracteres.length; j++) {
            if (k == 6) {
                k = 0;
            }
            sumatoria += parseInt(caracteres[j]) * parseInt(serie[k]);
            k++;
        }

        resto = sumatoria % 11;
        dv = 11 - resto;

        if (dv == 10) {
            dv = "K";
        }
        else if (dv == 11) {
            dv = 0;
        }

        if (dv.toString().trim().toUpperCase() == dig.toString().trim().toUpperCase())
            return true;
        else
            return false;
    }
    else {
        return false;
    }
}




function pregunta(){ 
			if (confirm('Desea ingresar el producto?')){
				document.mant1.submit()
				} 
			} 
			
function ingresa_deposito()
          {
			if (confirm('Desea registrar el deposito?'))
			    {
				
				      document.mant2.submit()
					
				} 	
		} 
function ingresa_registro_general()
          {
			if (confirm('Desea ingresar el registro?'))
			    {
				
				      document.mant3.submit()
					
				} 	
		} 
function confirmar_actualizar_stock()
          {
			if (confirm('Desea ingresar el registro?'))
			    {
				
				      document.mant4.submit()
					
				} 	
		}
function confirmar_actualizar_stock_oficina()
          {
			if (confirm('Desea ingresar el registro?'))
			    {
				
				      document.actualizar_stock_oficina.submit()
					
				} 	
		} 		
		
function validarEmail( email ) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if ( !expr.test(email) )
        return false;
	   else
		return true;
}
function ingresa_despacho()
          {
			if (VerificaRut(document.mant_desp.RUT.value))
			  {
        	      if ( validarEmail( document.mant_desp.EMAIL.value ))
				  {
					 
		             if ( (document.mant_desp.FONO.value.length == 9) &&  (document.mant_desp.ITEM.value.length > 8)  &&  (document.mant_desp.PARA.value.length > 10) &&  (document.mant_desp.DIRECCION.value.length > 10) &&  (document.mant_desp.MONTO.value.length > 3) )
					    
						{
							if (document.mant_desp.RUT_FACTURA.value == '')
						     {
							
									  if (confirm('Desea ingresar el despacho?'))
										{
										document.mant_desp.submit();
										}
						     }
					    
						    else
							 {
								 
									  if (VerificaRut(document.mant_desp.RUT_FACTURA.value) &&  (document.mant_desp.GIRO.value.length > 8)&&  (document.mant_desp.DIRECCION_FACTURACION.value.length > 8))
										{
											  if (confirm('Desea ingresar el despacho?'))
												 {
											     document.mant_desp.submit();
												 }
									
										}
									else
										{
										alert('Formatos Facturacion Incorrecto');
										}
								 
							 }
						}
				      
						else
							{
							alert('Celular, direccion , nombre ,monto o item con formato incorrecto');
							}
				  }
                  else
					{
					alert('Correo no valido');
                    }
			  }
            else
            {
			alert('Rut no valido');	
			}				
		  }
		  
function ingresa_factura_terreno()
          {
			
        	      if ( validarEmail( document.mant_desp.EMAIL.value ))
				  {
					 
		             if ( (document.mant_desp.FONO.value.length == 9) &&  (document.mant_desp.ITEM.value.length > 8)  )
					    
						{
							if (document.mant_desp.RUT_FACTURA.value == '')
						     {
							
									  if (confirm('Desea ingresar la factura?'))
										{
										document.mant_desp.submit();
										}
						     }
					    
						    else
							 {
								 
									  if (VerificaRut(document.mant_desp.RUT_FACTURA.value) &&  (document.mant_desp.GIRO.value.length > 8))
										{
											  if (confirm('Desea ingresar la factura?'))
												 {
											     document.mant_desp.submit();
												 }
									
										}
									else
										{
										alert('Formatos Facturacion Incorrecto');
										}
								 
							 }
						}
				      
						else
							{
							alert('Celular, item con formato incorrecto');
							}
				  }
                  else
					{
					alert('Correo no valido');
                    }
							
		  }
		  
function ingresa_conf()
          {
			  
        	     
		             if (  document.form_confirmador.CELULAR.value.length == 9 )
					 
						{
							
						 
						    document.form_confirmador.submit();
							
						}
					 
					 else
						{
						alert('Formato incorrecto');
						}
				  }
                 		
		  
				     					 	
		 	
function ingresar_comision()
          {
			if (confirm('Desea ingresar la comision?'))
			    {
				
				      document.form_comision.submit()
					
				} 	
		} 
function ingresar_descuento()
          {
			if (confirm('Desea ingresar el descuento?'))
			    {
				
				      document.form_descuento.submit()
					
				} 	
		} 
function ingresar_IVA()
          {
			if (confirm('Desea ingresar el IVA?'))
			    {
				
				      document.mant_iva.submit()
					
				} 	
		} 	
function ingresar_IVA_debito()
          {
			if (confirm('Desea ingresar el IVA?'))
			    {
				
				      document.mant_iva.submit()
					
				} 	
		} 			
function ingresar_gasto_extra()
          {
			if (confirm('Desea ingresar el gasto?'))
			    {
				
				      document.form_gasto_extra.submit()
					
				} 	
		} 
function ingresar_pasivo()
          {
			if (confirm('Desea ingresar el pasivo?'))
			    {
				
				      document.form_ingresar_pasivo.submit()
					
				} 	
		} 		
function ingresar_pago()
          {
			if (confirm('Desea ingresar el pago?'))
			    {
				
				      document.form_pago_comision.submit()
					
				} 	
		} 	
function ingresar_pago_inversionista()
          {
			if (confirm('Desea ingresar el pago?'))
			    {
				
				      document.form_pago_inversionista.submit()
					
				} 	
		} 
function ingresar_pago_venta_directa()
          {
			if (confirm('Desea ingresar el pago?'))
			    {
				
				      document.form_pago_venta_directa.submit()
					
				} 	
		} 		
function ingresar_venta_extra()
          {
			if (confirm('Desea ingresar la venta?'))
			    {
				
				      document.form_venta_extra.submit()
					
				}
		}	
function ver_informe()
          {
			
				      document.mant_informe.submit()
					
		 }	
function ver_informe_mensual()
          {
		
				      document.location.href="ver_informe_mensual.php";
					
		}				
function ver_informe_diario()
          {
		
				      document.location.href="ver_informe_dia.php";
					
		}
		
function ingresar_tramite()
          {
		
				      if (confirm('Desea ingresar la tarea?'))
			    {
				
				      document.mant_tramite.submit()
					
				}
					
		}
		
function venta_directa()
          {
		
				      if (confirm('Desea ingresar la venta?'))
			    {
				
				      document.mant_venta_directa.submit()
					
				}
					
		}
function reversa()
          {
		
				      if (confirm('Desea ingresar la reversa?'))
			    {
				
				      document.mant_reversa.submit()
					
				}
					
		}
function stock()
          {
		
				      if (confirm('Desea actualizar el stock?'))
			    {
				
				      document.mant_stock_general.submit()
					
				}
			}	
function ingresar_activos()
          {
		
				      if (confirm('Desea ingresar el inventario?'))
			    {
				      
				      document.form_ingresar_activos.submit()
					
				}
					
		}
function ingresar_facturas()
          {
		
				      if (confirm('Desea ingresar factura?'))
			    {
				      
				      document.form_facturas.submit()
					
				}
					
		}

          		  			
function validarNro(e) {
var key;
if(window.event) // IE
	{
	key = e.keyCode;
	}
else if(e.which) // Netscape/Firefox/Opera
	{
	key = e.which;
	}

if (key < 48 || key > 57)
    {
    if(key == 46 || key == 8) // Detectar . (punto) y backspace (retroceso)
        { return true; }
    else 
        { return false; }
    }
return true;
}

function mercado_envios()
  {
	document.getElementById("id_empresa").selectedIndex = 3;
	document.getElementById("rut").value="1-9";
	document.getElementById("email").value="ventas@alabs.cl";
	//document.getElementById("id_boleta").checked = true;
	
	
  }
  function entrega_personal()
  {
	document.getElementById("id_empresa").selectedIndex = 4;
	document.getElementById("rut").value="1-9";
	document.getElementById("direccion").value="ENTREGA PERSONAL";
	
  }
  function cambio_factura() {
	  
     document.getElementById("id_factura").checked = true;
}

function ingresa_boleta()
          {
			
			if (confirm('Desea ingresar la boleta?'))
			 {
			  document.mant_desp.submit();
		     }
									
								
		  }
