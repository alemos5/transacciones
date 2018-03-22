<?php 
//session_start();
if(!$_SESSION["mlx_id_cliente"]){
	header("location:login.php");
}
include("admin/clases/clientes.class.php");
include("admin/clases/ordenes.class.php");
include("admin/clases/facturas.class.php");
$ordenes = new Ordenes();
$clientes = new Clientes();
$facturas = new Facturas();

//print_r($_POST); exit();

if($_POST["guardarregistro"]){
	$code_cliente = $_POST["code_cliente"];
	$id_ope = $_SESSION["mlx_id_cliente"];
	$nombre_cliente = $_POST["nombre_cliente"];
	$direccion_cliente = $_POST["direccion"];
	$ciudad = $_POST["estado"];
	$telefono = $_POST["telefono"];
	$descripcion = $_POST["descripcion0"];
	$costo = $_POST["costo"];
	$seguro	=	($_POST["seguro"]==1)?1:"0";
	$numero_guia = $_POST["numero_guia"];
	$tracking = $_POST["tracking"];
	$courier = $_POST["courier"]; 
	$alto = $_POST["alto"];
	$ancho = $_POST["ancho"];
	$largo = $_POST["largo"]; 
	$peso = $_POST["peso"]; 
	$mailcc = $_POST["email"]; 
	$cant = $_POST["cant"]; 
	$peli = $_POST["peli"]; 
	$tienda = $_POST["tienda"]; 
	$cliente = $clientes->listar(" code_cliente = '$code_cliente' AND nombre ='".$nombre_cliente."'");
	//print_r($_POST); exit();
	/*if(!$cliente){
		header("location:modulo_operador.php?msj=error");	
	}	*/
	//echo $tienda;	
	//$numero_guia = rand(1,10000);
	$numero_guia = substr(rand(0, 1000000), 0, 7);
	//$patrón = '/\s+/i';
	//$sustitución = '';
	//$numero_guia= preg_replace($patrón, $sustitución, $numero_guia);
	$ware_reciept = $code_cliente.'-'.$numero_guia.substr($tracking,-4);
	//echo $ware_reciept; exit();
	
	if(count($cliente) != 0){
		$id_orden = $ordenes->agregar($ware_reciept,$numero_guia,$tracking, $courier, $id_ope, $code_cliente, $nombre_cliente, $alto, $ancho, $largo, $peso, $descripcion, $costo, "0", "0", "0", $seguro, "0", "0",$mailcc, "0", "0", $_POST["cant"], $_POST["peli"], $_POST["tienda"], "0", $_POST["doc"], $direccion_cliente,$ciudad,$telefono);	
		$facturas->agregar($id_orden,0,1);
		$requeridon = $id_orden-247201;
		$ware_reciept2 = $code_cliente.'-'.substr($tracking,-4).$requeridon;
		$numero_guia = $id_orden+1000000;
		$ordenes->editar($id_orden,$ware_reciept2,$numero_guia);
		$code_cliente;
		include("admin/mail/var_orden.php");
		include("admin/mail/mail.php");
		?>
		<script language="javascript">
			document.location.href="ordenes.php";
		</script>
        <?php 
	}else{
		?>
		<script language="javascript">
			alert("Se presento un problema, código de cliente o nombre inexistentes");
		</script>
<?php }
}?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.9.custom.min.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
<script language="javascript" src="admin/js/jquery.numeric.js"></script>
<link href="css/jquery-ui-1.8.9.custom.css" rel="stylesheet" type="text/css" />
<script language="javascript">
$(function(){
	$("#cerrar_session").click(function(){
		$.ajax({
			type: "POST",
			url: "ajax/cerrar.php",
			success: function(msg){	
				document.location.href="login.php";
			}
		});
	});	   
	$("#alto, #ancho, #largo, #peso, #costo").numeric();	   
	$( "#dialog:ui-dialog" ).dialog( "destroy" );
	$( "#dialog-message" ).dialog({
		resizable: false,
		autoOpen: false,
		modal: true,
		buttons: {
			Ok: function() {
				$( this ).dialog( "close" );
			}
		}
	});

	$('.obt').focus(function(){
		var valor = $(this).val();
		if(valor == 'Campo Obligatorio' || valor == 'Formato de correo invalido'){
			$(this).val('');
		}
	});
	
	$('.obt').blur(function(){
		var valor = $(this).val(), nomcamp = $(this).attr('name');
		if(valor == ''){
			$(this).css('color', '#990000');
			$(this).val('Campo Obligatorio');
		}else{
			$(this).css('color', '#666');
		}
		if(nomcamp == "email"){
			var mail = $(this);
			valMail(mail);
		}
	});
	
	$(".boton-orden").click(function(){
		var code = $("#code_cliente").val(),nom_cli = $("#nombre_cliente").val();
		var dir = $("#direccion").val(),direccion = $("#direccion").val();
		var est = $("#estado").val(),estado = $("#estado").val();
		valido = true;
		$(".obt").each(function(){
			val_cmp($(this));
			valido = valido && val_cmp($(this));
			if($(this).attr("name") == "email"){
				valMail($(this));
				valido = valido && valMail($(this));
			}
		});	
		
		if(valido){
			//$( "#dialog-message" ).html( "No hay campos obligatorios vac&iacute;os" );
			//$( "#dialog-message" ).dialog( "open" );
			return true;
		}else{
			$( "#dialog-message" ).html( "Hay campos obligatorios vac&iacute;os" );
			$( "#dialog-message" ).dialog( "open" );
			return false;
		}
	});	
		
		var cache = {},
		lastXhr;
		
		$( "#nombre_cliente" ).autocomplete({
			minLength: 3,
			source: function( request, response ) {
				var term = request.term;
				if ( term in cache ) {
					response( cache[ term ] );
					return;
				}

				lastXhr = $.getJSON( "search.php?rel=1", request, function( data, status, xhr ) {																	 
					cache[ term ] = data;
					if ( xhr === lastXhr ) {
						response( data );
					}
				});
			},
			select:function(event,ui){
				var val =ui.item.value,rel = 1;
				$.ajax({
					type: "POST",
					url: "ajax/obtener.php",
					data: "val=" + val + "&tipo=" + rel,
					success: function(msg){						
						msg = msg.split("|");
							$("#code_cliente").val(msg[0]);
							$("#email").val(msg[1]);
							$("#direccion").val(msg[3]);
							$("#estado").val(msg[4]);
							$("#telefono").val(msg[5]);
					}
				});
			}
		});
		
		$( "#code_cliente" ).autocomplete({
			minLength: 3,
			source: function( request, response ) {
				var term = request.term;
				if ( term in cache ) {
					response( cache[ term ] );
					return;
				}

				lastXhr = $.getJSON( "search.php?rel=2", request, function( data, status, xhr ) {																	 
					cache[ term ] = data;
					if ( xhr === lastXhr ) {
						response( data );
					}
				});
			},
			select:function(event,ui){
				var val =ui.item.value,rel = 2;
				$.ajax({
					type: "POST",
					url: "ajax/obtener.php",
					data: "val=" + val + "&tipo=" + rel,
					success: function(msg){						
						msg = msg.split("|");
						if($("#nombre_cliente").val(msg[0]) != $("#nombre_cliente").val()){
							$("#nombre_cliente").val(msg[0]);
							$("#direccion").val(msg[3]);
							$("#estado").val(msg[4]);
							$("#telefono").val(msg[5]);
						}
						$("#email").val(msg[1]);
					}
				});
			}
		});

		
		$( "#code_cliente,#nombre_cliente,#direccion,#estado,#telefono" ).change(function(){
			var val = $(this).val(), rel= $(this).attr("rel");
			$.ajax({
				type: "POST",
				url: "ajax/obtener.php",
				data: "val=" + val + "&tipo=" + rel,
				success: function(msg){						
					msg = msg.split("|");
					if(rel == 2){
						if($("#nombre_cliente").val(msg[0]) != $("#nombre_cliente").val()){
							$("#nombre_cliente").val(msg[0]);
							$("#direccion").val(msg[3]);
							$("#telefono").val(msg[5]);
						}
					}else{
						if($("#code_cliente").val(msg[0]) != $("#code_cliente").val()){
							$("#code_cliente").val(msg[0]);
							$("#direccion").val(msg[3]);
							$("#estado").val(msg[4]);
							$("#telefono").val(msg[5]);
						}						
					}
					$("#email").val(msg[1]);
				}
			});	
		});
});
</script>
<style type="text/css">
<!--
-->
</style>
<link href="tracking_styles.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #1056B2}
.style2 {
	color: #000000;
	font-weight: bold;
}
.ui-autocomplete {
	max-height: 200px;
	overflow-y: auto;
	/* prevent horizontal scrollbar */
	overflow-x: hidden;
	/* add padding to account for vertical scrollbar */
	padding-right: 20px;
}
/* IE 6 doesn't support max-height
 * we use height instead, but this forces the menu to always be this tall
 */
* html .ui-autocomplete {
	height: 100px;
}
-->
</style>
</head>

<body>
<div class="content" style="padding-left:86px;">
 <?php include("header_interno.php");?>
  <form id="orden" name="orden" method="post" enctype="multipart/form-data">
  <input name="guardarregistro" type="hidden" class="guardarregistro" id="guardarregistro" value="1" />
  <input name="email" type="hidden" class="email" id="email" value="1" />
   <div class="contenedor_tabla" style=" width:410px; margin-bottom:10px;">
      <div class="left" style="padding-left:40px; margin-top:6px;"><strong>C&oacute;digo del Cliente:</strong></div>
      
      <div class="right" style="width:200px;">
        <input name="code_cliente" type="text" rel="2" class="formulario obt" id="code_cliente" />
      </div>
    </div>
    <div class="contenedor_tabla" style="padding-left:100px;; width:540px;"><div class="contenedor_tabla style1" style=" width:410px; margin-bottom:10px; margin-top:10px;">
      <div align="center"><strong>M&oacute;dulo de Tracking - Operador</strong></div>
    </div>
    <div class="contenedor_tabla style1" style=" width:410px; margin-bottom:10px; margin-top:10px; <?php echo $msj ?'display:block;':'display:none;' ?>">
      <div align="center" style="color:#F00; text-align:center;"><strong>Error al subir la orden código o nombre de cliente Inexitentes</strong></div>
    </div>
      <div class="contenedor_tabla" style=" width:410px; margin-bottom:10px; margin-top:10px;">
        <div class="left" style="padding-left:40px; margin-top:6px;">Tracking Number:</div>
        <div class="right" style="width:200px;">
          <input name="tracking" type="text" class="formulario obt" id="tracking" />
        </div>
      </div>
	  
	  <div class="contenedor_tabla" style=" width:410px; margin-bottom:10px; margin-top:10px;">
        <div class="left" style="padding-left:40px; margin-top:6px;">N&uacute;mero Gu&iacute;a:</div>
        <div class="right" style="width:200px;">
          <input name="numero_guia" type="text"  value="Automatico" 	class="formulario" id="numero_guia" />
        </div>
      </div>
	  
      <div class="contenedor_tabla" style=" width:410px; margin-bottom:10px;">
      <div class="left" style="padding-left:40px; margin-top:6px;">Nombre del Courier:</div>
      
      <div class="right" style="width:200px;">
        <select style="width:200px;" class="obligatorio" name="courier">
        	<option>DHL</option>
        	<option>FEDEX</option>
        	<option>Lasership</option>
        	<option>UPS</option>
        	<option>USPS</option>
        	<option>otro</option>
        </select>
      </div>
    </div>
      <div class="contenedor_tabla" style=" width:410px; margin-bottom:10px;">
        <div class="left" style="padding-left:40px; margin-top:6px;">Nombre del Cliente:</div>
        <div class="right" style="width:200px;">
          <input name="nombre_cliente" type="text" rel="1" class="formulario obt" id="nombre_cliente" />
        </div>
      </div>
               <div class="contenedor_tabla" style=" width:410px; margin-bottom:10px;">
        <div class="left" style="padding-left:40px; margin-top:6px;">Direccion de Envio:</div>
        <div class="right" style="width:200px;">
          <input name="direccion" type="text" rel="3" class="formulario obt" id="direccion" />
        </div>
      </div>
                          <div class="contenedor_tabla" style=" width:410px; margin-bottom:10px;">
        <div class="left" style="padding-left:40px; margin-top:6px;">Ciudad:</div>
        <div class="right" style="width:200px;">
          <input name="estado" type="text" rel="4" class="formulario obt" id="estado" />
        </div>
      </div>
                                <div class="contenedor_tabla" style=" width:410px; margin-bottom:10px;">
        <div class="left" style="padding-left:40px; margin-top:6px;">Telefono:</div>
        <div class="right" style="width:200px;">
          <input name="telefono" type="text" rel="5" class="formulario obt" id="telefono" />
        </div>
      </div>
      <div class="contenedor_tabla" style=" width:410px; margin-bottom:10px;">
        <div class="left" style="padding-left:40px; margin-top:6px;">Tienda:</div>
        <div class="right" style="width:200px;">
          <input name="tienda" type="text" rel="1" class="formulario obt" id="tienda" />
        </div>
      </div>
     
        <div class="contenedor_tabla" style=" width:410px; margin-bottom:10px;">
      <div class="left" style="padding-left:40px; margin-top:6px;">Peligroso:</div>
      
      <div class="right" style="width:200px;">
        <select style="width:200px;" class="obligatorio" name="peli">
        	<option value="0">No</option>
        	<option value="1">Si</option>
        </select>
      </div>
    </div> <div class="contenedor_tabla" style=" width:410px; margin-bottom:10px;">
      <div class="left" style="padding-left:40px; margin-top:6px;">Documentaci&oacute;n:</div>
      
      <div class="right" style="width:200px;">
        <select style="width:200px;" class="obligatorio" name="doc">
        	<option value="0">No</option>
        	<option value="1">Si</option>
        </select>
      </div>
    </div>
    <div class="contenedor_tabla" style=" width:410px; margin-bottom:10px;">
      <div class="left" style="padding-left:40px; margin-top:6px;">
      Medidas en pulgadas:<br />
      (largo x ancho x alto)
      </div>
      
      <div class="right" style="width:200px;">
        <label>
        <input name="alto" type="text" class="formulario_peq obt" id="alto" />
        </label>
       x <input name="ancho" type="text" class="formulario_peq obt" id="ancho" />
       x <input name="largo" type="text" class="formulario_peq obt" id="largo" /></div>
    </div>
    <div class="contenedor_tabla" style=" width:410px; margin-bottom:10px;">
      <div class="left" style="padding-left:40px; margin-top:6px;">Peso en Libras:</div>
      <div class="right" style="width:200px;">
        <input name="peso" type="text" class="formulario obt" id="peso" />
      </div>
    </div>
<!--     <div class="contenedor_tabla" style=" width:410px; margin-bottom:10px;">
      <div class="left" style="padding-left:40px; margin-top:6px;">Cantidad de Paquetes:</div>
      <div class="right" style="width:200px;">
        <input name="cant" type="text" class="formulario obt" id="cant" />
      </div> -->
      <div class="contenedor_tabla" style=" width:410px; margin-bottom:10px;">
      <div class="left" style="padding-left:40px; margin-top:6px;">Cantidad de Paquetes:</div>
      <div class="right" style="width:200px;">
             <select name="cant"  id="cant" >
             <option value=0>Selecionar Cantidad</option>
    <option value=1>1</option>
     <option value=2>2</option>
     <option value=3>3</option>
    <option value=4>4</option>
     <option value=5>5</option>
     <option value=6>6</option>
       <option value=7>7</option>
     <option value=8>8</option>
     <option value=9>9</option>
    <option value=10>10</option>
     <option value=11>11</option>
     <option value=12>12</option> 
</select>

   

    </div><br />
    <div class="contenedor_tabla" style=" width:410px; margin-bottom:10px;">
      <div class="left" style="padding-left:40px; margin-top:6px;">Descripci&oacute;n:</div>

      <div class="right" style="width:200px;">
      <div id="outputArea"></div>
      </div>
        <!-- <input name="descripcion" type="text" class="formulario obt" id="descripcion" /> -->
      </div>
    </div>
    <div class="contenedor_tabla" style=" width:410px; margin-bottom:10px;">
      <div class="left" style="padding-left:40px; margin-top:6px;">Valor del producto:</div>
      
      <div class="right" style="width:200px;">
        <input name="costo" type="text" class="formulario obt" id="costo" />
      </div>
    </div>
    <div class="contenedor_tabla" style=" width:410px; margin-bottom:10px; margin-top:10px;">
      <div align="center"><input type="image" src="images/BOTONACEPTAR.png" class="boton-orden" /></div>
    </div>
  </div>
  </form>
  <div class="clear"> </div>
</div>
<?php 

 ?>
<script>
	$("#cant").change(function() {
  var htmlString = "";
  var len = $(this).val();
  for (var i = 0; i < len; i++) {
    htmlString += "</br><input type='text' name='descripcion"+ i +"' placeholder='Descripcion' class='formulario obt'></br>";
   // htmlString += "<input type='text' class='name'>";

  }

  $("#outputArea").html(htmlString);
})
</script>
</body>
</html>
