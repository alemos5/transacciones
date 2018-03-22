<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'ordenes-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>

<?php echo $form->errorSummary($model); 



?>
<div class="row">
  <div class="col-xs-12">
      <label class="control-label required" for="Afianzamiento_id_socio">
        Código del Cliente:
        <span class="required">*</span>
      </label>
      <?php 
      if($model->code_cliente){
        $socio = Clientes::model()->find("code_cliente ='".$model->code_cliente."'");
      }
      ?>
      <input id="codigoCliente" onblur="vaciar(this.value)" class="span5 ui-autocomplete-input form-control" type="text" name="codigoCliente" placeholder="Código de Cliente" autocomplete="off" value="<?php echo $socio->nombre; ?>">
      <?php //echo $form->textFieldGroup($model,'id_socio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
      <?php echo $form->hiddenField($model,'code_cliente',array('type'=>"hidden")); ?>
      <br>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading"><div align="center"><strong>M&oacute;dulo de Tracking - Operador</strong></div></div>
  <div class="panel-body">
      
      
  

<div class="row">
    <div class="col-sm-12 col-md-12">
        <label class="control-label required" for="Afianzamiento_id_socio">
            Tracking:
            <span class="required">*</span>
        </label>
        <?php 
        if($model->tracking){
          $tracking = $model->tracking;
        }
        ?>
        <input id="TrackingCliente" onblur="" class="span5 ui-autocomplete-input form-control" type="text" name="TrackingCliente" placeholder="Tracking" autocomplete="off" value="<?php echo $tracking; ?>">
        <?php //echo $form->textFieldGroup($model,'id_socio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
        <?php echo $form->hiddenField($model,'tracking',array('type'=>"hidden")); ?>
        <br>
        
        
        
    <?php //echo $form->textFieldGroup($model,'tracking',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
    </div>
</div>
<!--<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php // echo $form->textFieldGroup($model,'numero_guia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    </div>
</div>-->
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php 
            $data = array(
                'DHL'=>'DHL',
                'FEDEX'=>'FEDEX',
                'Lasership'=>'Lasership',
                'UPS'=>'UPS',
                'USPS'=>'USPS',
                'otro'=>'otro',
                );
            echo $form->dropDownListGroup($model,'courier',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Nombre del Courier:'))); 
        ?>
        <?php //echo $form->textFieldGroup($model,'courier',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textFieldGroup($model,'nombre_cliente',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textAreaGroup($model,'direccion_cliente', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textAreaGroup($model,'ciudad', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textFieldGroup($model,'telefono',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textFieldGroup($model,'tienda',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>150)))); ?>
    </div>
</div>
<!--<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php 
            $data = array(
                '0'=>'No',
                '1'=>'Si',
                );
            echo $form->dropDownListGroup($model,'peli',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Peligroso:'))); 
        ?>
        <?php //echo $form->textFieldGroup($model,'peli',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php 
            $data = array(
                '0'=>'No',
                '1'=>'Si',
                );
            echo $form->dropDownListGroup($model,'doc',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Documentación:'))); 
        ?>
        <?php //echo $form->textFieldGroup($model,'doc',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    </div>
</div>-->

<div class="row">
  <div class="col-md-12">
      <?php
      if(Yii::app()->user->id_perfil_sistema == 1){
          $tarifas = TarifaEnvioPais::model()->findAll('estatus = 1');
          $data = array();
          foreach ($tarifas as $tarifa) {
              $data[$tarifa->id_tarifa_envio_pais] = $tarifa->idPais->pais.' / '.$tarifa->idTipoEnvio->tipo_envio.' - '.$tarifa->tarifa_envio_pais." USD";
          }
      }else{
          $usuario = Usuario::model()->find('id_usuario_sistema ='.Yii::app()->user->id_usuario_sistema);
          $pais = Pais::model()->find('codigo like "'.$usuario->codigo_pais.'"');
          $tarifas = TarifaEnvioPais::model()->findAll('id_pais ='.$pais->id_pais.' AND estatus = 1');
          $data = array();
          foreach ($tarifas as $tarifa) {
              $data[$tarifa->id_tarifa_envio_pais] = $tarifa->idPais->pais.' / '.$tarifa->idTipoEnvio->tipo_envio.' - '.$tarifa->tarifa_envio_pais." USD";
          }

      }
      echo $form->dropDownListGroup($model,'id_tipo_envio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'constante(this.value)'), 'data'=>array(''=>__('Seleccione...'))+$data))); ?>
      <input type="hidden" value="" id="contanteTarifa" name="contanteTarifa">
      <input type="hidden" value="" id="Tarifa" name="Tarifa">
  </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-4">
       <?php echo $form->textFieldGroup($model,'alto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'value'=>'', ''=>'', 'onblur'=>'calcular()', 'onkeyup'=>"miles_decimales(this,this.value.charAt(this.value.length-1),this,this,2)")))); ?>
    </div>
    <div class="col-sm-12 col-md-4">
       <?php echo $form->textFieldGroup($model,'ancho',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','value'=>'', 'onblur'=>'calcular()', 'onkeyup'=>"miles_decimales(this,this.value.charAt(this.value.length-1),this,this,2)")))); ?>
    </div>
    <div class="col-sm-12 col-md-4">
       <?php echo $form->textFieldGroup($model,'largo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','value'=>'', 'onblur'=>'calcular()', 'onkeyup'=>"miles_decimales(this,this.value.charAt(this.value.length-1),this,this,2)")))); ?>
    </div>
</div>
      <input type="hidden" id="pesoVolumetrico">
      <div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textFieldGroup($model,'peso',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','value'=>'', 'onblur'=>'calcular()', 'onkeyup'=>"miles_decimales(this,this.value.charAt(this.value.length-1),this,this,2), calculoCosto(this.value)")))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textAreaGroup($model,'descripcion', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
    </div>
</div>
<div class="row">
  <div class="col-sm-12 col-md-12">
      <?php echo $form->textFieldGroup($model,'costo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onkeyup'=>"miles_decimales(this,this.value.charAt(this.value.length-1))")))); ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-12 col-md-12">
      <?php echo $form->textFieldGroup($model,'cost_env',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onkeyup'=>"miles_decimales(this,this.value.charAt(this.value.length-1))")))); ?>
  </div>
</div>



    
        <?php /*echo $form->textFieldGroup($model,'ware_reciept',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
	<?php echo $form->textFieldGroup($model,'id_ope',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textFieldGroup($model,'status',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textFieldGroup($model,'instrucciones',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textFieldGroup($model,'orden',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textFieldGroup($model,'seguro',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textFieldGroup($model,'fecha',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textFieldGroup($model,'pt',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textFieldGroup($model,'cost_env',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textFieldGroup($model,'env_email',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
	<?php echo $form->textFieldGroup($model,'recargo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textFieldGroup($model,'status_recargo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textFieldGroup($model,'tasa_de_cambio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textFieldGroup($model,'int_manejo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textFieldGroup($model,'int_documentacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textFieldGroup($model,'int_gastos_administrativos',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textFieldGroup($model,'int_reempaque',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textFieldGroup($model,'int_descuento',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textFieldGroup($model,'int_devolucion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textFieldGroup($model,'int_almacenaje',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textFieldGroup($model,'int_comision_tc',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textFieldGroup($model,'int_desaduanamiento',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textAreaGroup($model,'descripcion1', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
	<?php echo $form->textAreaGroup($model,'ultima_milla', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
	<?php echo $form->textFieldGroup($model,'estatus_manifiesto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textAreaGroup($model,'info_extra', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); */?>
</div>
</div>
<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery-ui-no-conflict.min.js"></script>
<script>
    function constante(id){
        $.post("<?php echo Yii::app()->createUrl('tarifaEnvioPais/constante') ?>",{ id:id},
            function(data){
                var obj = JSON.parse(data);
                $('#contanteTarifa').val(obj['constante']);
                $('#Tarifa').val(obj['tarifa_envio_pais']);
                calcular();
            });
    }

function calcular(){
    var alto = parseFloat($('#Ordenes_alto').val());
    var ancho = parseFloat($('#Ordenes_ancho').val());
    var largo = parseFloat($('#Ordenes_largo').val());
    var peso = parseFloat($('#Ordenes_peso').val());
    var constante = parseFloat($('#contanteTarifa').val());
    var Tarifa = parseFloat($('#Tarifa').val());
    var pesoVolumetrico = 0;

    if(isNaN(alto) == true){
        alto = parseFloat(0);
    }
    if(isNaN(ancho) == true){
        ancho = parseFloat(0);
    }
    if(isNaN(largo) == true){
        largo = parseFloat(0);
    }
    if(isNaN(peso) == true){
        peso = parseFloat(0);
    }
    if(isNaN(constante) == true){
        constante = parseFloat(0);
    }
    if(isNaN(Tarifa) == true){
        Tarifa = parseFloat(0);
    }

    pesoVolumetrico = parseFloat(alto) * parseFloat(ancho) * parseFloat(largo);
    pesoVolumetrico = parseFloat(pesoVolumetrico) / parseFloat(constante);

    if(isNaN(pesoVolumetrico) == true){
        pesoVolumetrico = parseFloat(0);
    }else{
        if(constante == 0){
            pesoVolumetrico = parseFloat(0);
        }
        $('#pesoVolumetrico').val(Math.ceil(pesoVolumetrico));
    }
    calculoCosto();
}

    function calculoCosto(){
        var valor = parseFloat($('#Ordenes_peso').val());
        var Tarifa = parseFloat($('#Tarifa').val());
        var pesoVolumetrico = parseFloat($('#pesoVolumetrico').val());
        var calculo = 0;


        if(isNaN(valor) == true){
            valor = parseFloat(0);
        }
        if(isNaN(Tarifa) == true){
            Tarifa = parseFloat(0);
        }
        if(isNaN(pesoVolumetrico) == true){
            pesoVolumetrico = parseFloat(0);
        }

        if(valor >  pesoVolumetrico){
            calculo = parseFloat(valor) * parseFloat(Tarifa);
        }else{
            calculo = parseFloat(pesoVolumetrico) * parseFloat(Tarifa);
        }
        $('#Ordenes_cost_env').val(calculo.toFixed(2));
    }


jQuery('#codigoCliente').autocomplete({
  minLength: 3,
  source: function (request, response) {
    $.ajax({
      url: '<?php echo Yii::app()->createUrl('clientes/findJsonCliente') ?>',
      dataType: "json",
      data: {term: request.term},
      success: function (data) {
        if(data){  
            response($.map(data, function (item) {
              return {
                label: 'Código Cliente: ' + item.code_cliente + ', Nombre: ' + item.nombre,
                value: item.code_cliente+'; '+item.nombre,//item.id_socio,
                id: item.id_cliente,
                code_cliente: item.code_cliente,
                name: item.nombre,
                direccion: item.direccion,
                estado: item.estado,
                telefono: item.telefono,
              }
            }));
        }
    }
    });
  },
  select: function (event, ui) {
  $('#Ordenes_code_cliente').val(ui.item.code_cliente);
  $('#Ordenes_nombre_cliente').val(ui.item.name);
  $('#Ordenes_direccion_cliente').val(ui.item.direccion);
  $('#Ordenes_ciudad').val(ui.item.estado);
  $('#Ordenes_telefono').val(ui.item.telefono);
  },
});


//===============================================================================//
// TrackingCliente
//===============================================================================//
jQuery('#TrackingCliente').autocomplete({
  minLength: 3,
  source: function (request, response) {
    $.ajax({
      url: '<?php echo Yii::app()->createUrl('ordenesCliente/findJsonOrdenesCliente') ?>',
      dataType: "json",
      data: {term: request.term},
      success: function (data) {
        if(data){  
            response($.map(data, function (item) {
              return {
                label: 'Traking: ' + item.tracking + ', Descripción: ' + item.descripcion,
                value: item.tracking+'; '+item.descripcion,//item.id_socio,
                tracking: item.tracking,
                descripcion: item.descripcion,
                valor: item.valor,
                tienda: item.tienda,
//                code_cliente: item.code_cliente,
//                name: item.nombre,
//                direccion: item.direccion,
//                estado: item.estado,
//                telefono: item.telefono,
              }
            }));
        }
    }
    });
  },
  select: function (event, ui) {
        $('#Ordenes_tracking').val(ui.item.tracking);
        $('#Ordenes_descripcion').val(ui.item.descripcion);
        $('#Ordenes_costo').val(ui.item.valor);
        $('#Ordenes_tienda').val(ui.item.tienda);
  },
});

$("#cant").change(function() {
  var htmlString = "";
  var len = $(this).val();
  for (var i = 0; i < len; i++) {
    htmlString += "</br><input type='text' name='descripcion"+ i +"' placeholder='Descripcion' class='formulario obt'></br>";
   // htmlString += "<input type='text' class='name'>";

  }

  $("#outputArea").html(htmlString);
});

function miles_decimales(donde,caracter,campo,porcentaje, cantidadNumeroEntero, cantidadDecimales){

  if(!cantidadDecimales){
      cantidadDecimales = 2;
  }
  if(!cantidadNumeroEntero){
      cantidadNumeroEntero = 4;
  }
  var decimales = true;
  dec= cantidadDecimales;

  pat = /[\*,\+,\(,\),\?,\\,\$,\[,\],\^]/
  valor = donde.value
  largo = valor.length
  crtr = true
  if(isNaN(caracter) || pat.test(caracter) == true){
      if (pat.test(caracter)==true) 
              {caracter = "\\" + caracter}
      carcter = new RegExp(caracter,"g")
      valor = valor.replace(carcter,"")
      donde.value = valor
      crtr = false
  }else{
      var nums = new Array()
      cont = 0
      for(m=0;m<largo;m++){
          if(valor.charAt(m) == "." || valor.charAt(m) == " " || valor.charAt(m) == ","){
            continue;
          }else{
            nums[cont] = valor.charAt(m)
            cont++
          }
      }
  }

  if(decimales == true) {
    ctdd = eval(1 + dec);
    nmrs = cantidadNumeroEntero
  }else {
    ctdd = 1; nmrs = 3
  }
  var cad1="",cad2="",cad3="",tres=0
  if(largo > nmrs && crtr == true){
    for (k=nums.length-ctdd;k>=0;k--){
      cad1 = nums[k]
      cad2 = cad1 + cad2
      tres++
      if((tres%3) == 0){
          if(k!=0){
            //cad2 = "." + cad2 // agregar punto de miles
          }
      }
  }

    for (dd = dec; dd > 0; dd--){
      cad3 += nums[nums.length-dd] 
    }
    if(decimales == true){
      cad2 += "." + cad3
    }
    donde.value = cad2
  }
  donde.focus()
  
  
}




</script>