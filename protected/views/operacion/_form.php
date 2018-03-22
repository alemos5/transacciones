<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'operacion-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>

<?php echo $form->errorSummary($model); ?>
<div class="row">
    <div class="col-sm-12 col-md-4">
			<?php $data = CHtml::listData(Exchange::model()->findAll(), 'id_exchange', 'exchange');
			echo $form->dropDownListGroup($model,'id_exchange',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'vaciarMoneda()'), 'data'=>array('0'=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Exchange:'))); ?>
        <?php //echo $form->textFieldGroup($model,'id_exchange',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    </div>
    <div class="col-sm-12 col-md-4">
			<label class="control-label required" for="Moneda">
        Moneda:
        <span class="required">*</span>
			</label>
        <?php //echo $form->textFieldGroup($model,'id_moneda',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
				<?php
				if($model->id_moneda){
	        $moneda = $model->idMoneda->moneda;
	      }
				?>
        <input id="Moneda_moneda" onkeyup="validarExchange()" onblur="" class="span5 ui-autocomplete-input form-control" type="text" name="Moneda_moneda" placeholder="Moneda" autocomplete="off" value="<?php echo $moneda; ?>">
				<?php echo $form->hiddenField($model,'id_moneda',array('type'=>"hidden")); ?>
    </div>
    <div class="col-sm-12 col-md-4">
			<?php $data = CHtml::listData(EstatusOperacion::model()->findAll(), 'id_estatus_operacion', 'estatus_operacion');
			echo $form->dropDownListGroup($model,'id_estatus_operacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Tipo de Operación:'))); ?>
        <?php //echo $form->textFieldGroup($model,'id_estatus_operacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-4">
	<?php echo $form->textFieldGroup($model,'compra1',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','onkeypress'=>'return NumCheck(event, this)', 'maxlength'=>10)))); ?>		
    </div>
    <div class="col-sm-12 col-md-4">
        <?php echo $form->textFieldGroup($model,'compra2',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','onkeypress'=>'return NumCheck(event, this)','maxlength'=>10)))); ?>
    </div>
    <div class="col-sm-12 col-md-2">
        <?php echo $form->textFieldGroup($model,'stop_loss',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','onkeypress'=>'return NumCheck(event, this)','maxlength'=>10)))); ?>
    </div>
    <div class="col-sm-12 col-md-2">
        <?php echo $form->textFieldGroup($model,'porcentaje_stop_loss',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','onkeypress'=>'return porcentaje(event, this)' ,'maxlength'=>5)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-3">
        <?php echo $form->textFieldGroup($model,'venta_en',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','onkeypress'=>'return NumCheck(event, this)', 'onblur'=>'venta(this.value)' ,'maxlength'=>10)))); ?>
    </div>
    <div class="col-sm-12 col-md-1">
        <?php echo $form->textFieldGroup($model,'porcentaje_venta_en',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','onkeypress'=>'return NumCheck(event, this)', 'onblur'=>'venta(this.value)' ,'maxlength'=>5)))); ?>
    </div>
    
    <div class="col-sm-12 col-md-4">
        <?php 
        if($model->id_tipo_operacion){
            $data = CHtml::listData(TipoOperacion::model()->findAll(), 'id_tipo_operacion', 'tipo_operacion');
            echo $form->dropDownListGroup($model,'id_tipo_operacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array(''=>'Seleccione...')+$data), 'labelOptions'=>array('label'=>'Resultados:'))); 
        }else{
            $data = array('4'=>'EN PROCESO');
            echo $form->dropDownListGroup($model,'id_tipo_operacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>$data), 'labelOptions'=>array('label'=>'Resultados:'))); 
        }
        ?>
        
        <?php //echo $form->textFieldGroup($model,'id_tipo_operacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    </div>
    <div class="col-sm-12 col-md-4">
        <?php echo $form->dropDownListGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data' => array('1' => 'Activo', '0'=>'Inactivo' ),), 'labelOptions'=>array('label'=>'Estatus:'))); ?>
    </div>
</div>



<div class="panel panel-default">
  <div class="panel-heading"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>&nbsp;&nbsp;Target</div>
    <div class="pd-inner">
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <?php echo $form->textFieldGroup($model,'target1',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','onkeypress'=>'return NumCheck(event, this)', 'onblur'=>'bloqueoVenta(this.value)' ,'maxlength'=>10)))); ?>
        </div>
        <div class="col-sm-12 col-md-3">
            <?php echo $form->textFieldGroup($model,'target11',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','onkeypress'=>'return NumCheck(event, this)', 'onblur'=>'bloqueoVenta(this.value)' ,'maxlength'=>10)))); ?>
        </div>
        <div class="col-sm-12 col-md-3">
            <?php echo $form->textFieldGroup($model,'porcentaje1',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','onkeypress'=>'return porcentaje(event, this)', 'onblur'=>'bloqueoVenta(this.value)' ,'maxlength'=>5)))); ?>
        </div>
        <div class="col-sm-12 col-md-3">
            <br>
            <label class="control-label required" for="Operacion_porcentaje1">Acertado:</label>&nbsp;&nbsp;
            <?php if($model->estado1 == 1){?>
                <?php echo $form->checkBox($model,'estado1',array('value'=>1,'uncheckValue'=>0,'checked'=>'checked','class'=>'span5')); ?>
            <?php }else{ ?>
                <?php echo $form->checkBox($model,'estado1',array('value'=>1,'uncheckValue'=>0,'checked'=>'','class'=>'span5')); ?>
            <?php } ?>
        </div>
    </div>
        <hr>    
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <?php echo $form->textFieldGroup($model,'target2',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','onkeypress'=>'return NumCheck(event, this)', 'onblur'=>'bloqueoVenta(this.value)' ,'maxlength'=>10)))); ?>
        </div>
        <div class="col-sm-12 col-md-3">
            <?php echo $form->textFieldGroup($model,'target22',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','onkeypress'=>'return NumCheck(event, this)', 'onblur'=>'bloqueoVenta(this.value)' ,'maxlength'=>10)))); ?>
        </div>
        <div class="col-sm-12 col-md-3">
            <?php echo $form->textFieldGroup($model,'porcentaje2',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','onkeypress'=>'return porcentaje(event, this)', 'onblur'=>'bloqueoVenta(this.value)' ,'maxlength'=>5)))); ?>
        </div>
        <div class="col-sm-12 col-md-3">
            <br>
            <label class="control-label required" for="Operacion_porcentaje1">Acertado:</label>&nbsp;&nbsp;
            <?php if($model->estado2 == 1){?>
                <?php echo $form->checkBox($model,'estado2',array('value'=>1,'uncheckValue'=>0,'checked'=>'checked','class'=>'span5')); ?>
            <?php }else{ ?>
                <?php echo $form->checkBox($model,'estado2',array('value'=>1,'uncheckValue'=>0,'checked'=>'','class'=>'span5')); ?>
            <?php } ?>
        </div>
    </div>
        <hr>
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <?php echo $form->textFieldGroup($model,'target3',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','onkeypress'=>'return NumCheck(event, this)', 'onblur'=>'bloqueoVenta(this.value)' ,'maxlength'=>10)))); ?>
        </div>
        <div class="col-sm-12 col-md-3">
            <?php echo $form->textFieldGroup($model,'target33',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','onkeypress'=>'return NumCheck(event, this)', 'onblur'=>'bloqueoVenta(this.value)' ,'maxlength'=>10)))); ?>
        </div>
        <div class="col-sm-12 col-md-3">
            <?php echo $form->textFieldGroup($model,'porcentaje3',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','onkeypress'=>'return porcentaje(event, this)', 'onblur'=>'bloqueoVenta(this.value)' ,'maxlength'=>5)))); ?>
        </div>
        <div class="col-sm-12 col-md-3">
            <br>
            <label class="control-label required" for="Operacion_porcentaje1">Acertado:</label>&nbsp;&nbsp;
            <?php if($model->estado3 == 1){?>
                <?php echo $form->checkBox($model,'estado3',array('value'=>1,'uncheckValue'=>0,'checked'=>'checked','class'=>'span5')); ?>
            <?php }else{ ?>
                <?php echo $form->checkBox($model,'estado3',array('value'=>1,'uncheckValue'=>0,'checked'=>'','class'=>'span5')); ?>
            <?php } ?>
        </div>
    </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textAreaGroup($model,'observacion', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
    </div>
</div>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery-ui-no-conflict.min.js"></script>
<script>
function vaciarMoneda(){
    $('#Moneda_moneda').val('');
    $('#Operacion_id_moneda').val('');
}    
    
function validarExchange(){
    var exchange = $('#Operacion_id_exchange').val();
    if(exchange == 0){
        alert("Debe seleccionar un Exchange");
        document.getElementById("Operacion_id_exchange").focus(); 
    }
}    
    
    
function bloqueoVenta(target){
    var target1 = $('#Operacion_target1').val();
    var target11 = $('#Operacion_target11').val();
    var target2 = $('#Operacion_target2').val();
    var target22 = $('#Operacion_target22').val();
    var target3 = $('#Operacion_target3').val();
    var target33 = $('#Operacion_target33').val();
    if(target || target1 || target11 || target2 || target22 || target3 || target33 ){
        document.getElementById("Operacion_venta_en").disabled = true;
        document.getElementById("Operacion_porcentaje_venta_en").disabled = true;
    }else{
        document.getElementById("Operacion_venta_en").disabled = false;
        document.getElementById("Operacion_porcentaje_venta_en").disabled = false;
    }
}    
    
function venta(valor){
  if(valor){
      document.getElementById("Operacion_target1").disabled = true;
      document.getElementById("Operacion_target11").disabled = true;
      document.getElementById("Operacion_porcentaje1").disabled = true;
      document.getElementById("Operacion_estado1").disabled = true;
      
      document.getElementById("Operacion_target2").disabled = true;
      document.getElementById("Operacion_target22").disabled = true;
      document.getElementById("Operacion_porcentaje2").disabled = true;
      document.getElementById("Operacion_estado2").disabled = true;
      
      document.getElementById("Operacion_target3").disabled = true;
      document.getElementById("Operacion_target33").disabled = true;
      document.getElementById("Operacion_porcentaje3").disabled = true;
      document.getElementById("Operacion_estado3").disabled = true;
  }else{
      document.getElementById("Operacion_target1").disabled = false;
      document.getElementById("Operacion_target11").disabled = false;
      document.getElementById("Operacion_porcentaje1").disabled = false;
      document.getElementById("Operacion_estado1").disabled = false;
      
      document.getElementById("Operacion_target2").disabled = false;
      document.getElementById("Operacion_target22").disabled = false;
      document.getElementById("Operacion_porcentaje2").disabled = false;
      document.getElementById("Operacion_estado2").disabled = false;
      
      document.getElementById("Operacion_target3").disabled = false;
      document.getElementById("Operacion_target33").disabled = false;
      document.getElementById("Operacion_porcentaje3").disabled = false;
      document.getElementById("Operacion_estado3").disabled = false;
      
  }  
}    
    
function puntitos(donde,caracter,campo) {
  var decimales = false
  //campo = eval("donde.form." + campo)
  for ( d =0; d < campo.length; d++) {
    if(campo[d].checked == true) {
      dec = new Number(campo[d].value)
      break;
    }
  }
  dec = 2;
  if (dec != 0) { decimales = true }
  
  pat = /[\*,\+,\(,\),\?,\\,\$,\[,\],\^]/
  valor = donde.value
  largo = valor.length
  crtr = true
  if(isNaN(caracter) || pat.test(caracter) == true) {
    if (pat.test(caracter)==true) { caracter = "\\" + caracter }
    carcter = new RegExp(caracter,"g")
    valor = valor.replace(carcter,"")
    donde.value = valor
    crtr = false
  } else {
    var nums = new Array()
    cont = 0
    for(m=0;m<largo;m++) {
      if(valor.charAt(m) == "." || valor.charAt(m) == " " || valor.charAt(m) == ",") { continue; }
      else {
        nums[cont] = valor.charAt(m);
        cont++;
      }
    }
  }
  
  if(decimales == true) {
    ctdd = eval(1 + dec);
    nmrs = 1;
  } else {
    ctdd = 1; nmrs = 3
  }
  var cad1="",cad2="",cad3="",tres=0;
  if(largo > nmrs && crtr == true) {
    for (k=nums.length-ctdd;k>=0;k--) {
      cad1 = nums[k];
      cad2 = cad1 + cad2;
      tres++;
      if((tres%3) == 0) {
        if(k!=0) {
          cad2 = "." + cad2
        }
      }
    }

    for (dd = dec; dd > 0; dd--) { cad3 += nums[nums.length-dd]; }
    if(decimales == true) { cad2 += "," + cad3 }
    donde.value = cad2
  }
  donde.focus()
}    
    
    
    
function NumCheck(e, field) {
  key = e.keyCode ? e.keyCode : e.which
  if (key == 8) return true
  if (key > 47 && key < 58) {
    if (field.value == "") return true
    regexp = /.[0-9]{8}$/
    return !(regexp.test(field.value))
  }
  if (key == 46) {
    if (field.value == "") return false
    regexp = /^[0-9]+$/
    return regexp.test(field.value)
  }
  return false
}    
function porcentaje(e, field) {
  key = e.keyCode ? e.keyCode : e.which
  if (key == 8) return true
  if (key > 47 && key < 58) {
    if (field.value == "") return true
    regexp = /.[0-9]{2}$/
    return !(regexp.test(field.value))
  }
  if (key == 46) {
    if (field.value == "") return false
    regexp = /^[0-9]+$/
    return regexp.test(field.value)
  }
  return false
}    


jQuery('#Moneda_moneda').autocomplete({
  
  minLength: 1,
  source: function (request, response) {
    $.ajax({
      url: '<?php echo Yii::app()->createUrl('operacion/findMoneda') ?>',
      dataType: "json",
      data: {term: request.term, exchange: $('#Operacion_id_exchange').val()},
      success: function (data) {
        if(data){
            response($.map(data, function (item) {
              return {
                label: item.moneda+' (' + item.abv+')',
                value: item.abv+' ('+item.moneda+')',//item.id_socio,
                id: item.id_moneda,
                name: item.moneda,
              }
            }));
        }
    }
    });
  },
  select: function (event, ui) {
    $('#Operacion_id_moneda').val(ui.item.id);
  },
});
</script>
