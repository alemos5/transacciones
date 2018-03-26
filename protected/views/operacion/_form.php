<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'operacion-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>

<?php echo $form->errorSummary($model); ?>
<div class="row">
    <div class="col-sm-12 col-md-12">
	    <?php //echo $form->textFieldGroup($model,'code_operacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php $data = CHtml::listData(TipoProducto::model()->findAll(), 'id_tipo_producto', 'tipo_producto');
        echo $form->dropDownListGroup($model,'id_tipo_operacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'FindCiudad(this.value)'), 'data'=>array(''=>__('Select...'))+$data))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php $data = CHtml::listData(Pais::model()->findAll(), 'id_pais', 'pais');
        echo $form->dropDownListGroup($model,'id_pais',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'FindCiudad(this.value)'), 'data'=>array(''=>__('Select...'))+$data))); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-3">
        <?php echo $form->textFieldGroup($model,'monto_operacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>
    </div>
    <div class="col-sm-12 col-md-3">
        <?php $data = CHtml::listData(Moneda::model()->findAll(), 'id_moneda', 'moneda');
        echo $form->dropDownListGroup($model,'id_moneda_origen',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'FindCiudad(this.value)'), 'data'=>array(''=>__('Select...'))+$data))); ?>
    </div>
    <div class="col-sm-12 col-md-3">
        <?php $data = CHtml::listData(Moneda::model()->findAll(), 'id_moneda', 'moneda');
        echo $form->dropDownListGroup($model,'id_moneda_destino',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'calcularCobro(this.value)'), 'data'=>array(''=>__('Select...'))+$data))); ?>
    </div>
    <div class="col-sm-12 col-md-3">
        <?php echo $form->textFieldGroup($model,'monto_ganancia',array('widgetOptions'=>array('htmlOptions'=>array('readonly'=>"readonly", 'class'=>'span5','maxlength'=>15)), 'labelOptions'=>array('label'=>'Monto a cobrar'))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textFieldGroup($model,'monto_cierre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->datePickerGroup($model,'fecha_operacion',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'')); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php $data = CHtml::listData(CuentaBancaria::model()->findAll(), 'id_cuenta_bancaria', 'alias_cuenta_bancaria');
        echo $form->dropDownListGroup($model,'id_cuenta_entrada',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'FindCiudad(this.value)'), 'data'=>array(''=>__('Select...'))+$data))); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php $data = CHtml::listData(CuentaBancaria::model()->findAll(), 'id_cuenta_bancaria', 'alias_cuenta_bancaria');
        echo $form->dropDownListGroup($model,'id_cuenta_salida',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'FindCiudad(this.value)'), 'data'=>array(''=>__('Select...'))+$data))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->dropDownListGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data' => array('1' => 'Activo', '0'=>'Inactivo' ),))); ?>
    </div>
</div>

    <?php //echo $form->textFieldGroup($model,'monto_oficial',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

    <?php //echo $form->textFieldGroup($model,'porcentaje_oficial',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

    <?php //echo $form->textFieldGroup($model,'monto_ganancia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

    <?php //echo $form->textFieldGroup($model,'porcentaje_ganancia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

    <?php //echo $form->textFieldGroup($model,'id_producto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php //echo $form->textFieldGroup($model,'tarifa',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

    <?php //echo $form->textFieldGroup($model,'id_cuenta_salida',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php //echo $form->textFieldGroup($model,'id_cuenta_entrada',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php //echo $form->textFieldGroup($model,'id_usuario_registro',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php //echo $form->textFieldGroup($model,'fecha_registro',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php //echo $form->textFieldGroup($model,'id_usuario_modifica',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php //echo $form->textFieldGroup($model,'fecha_modifica',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
		)); ?>
</div>

<?php $this->endWidget(); ?>

<script>
    function calcularCobro(idMoneda){
        var monto = $('#Operacion_monto_operacion').val();
        var moneda_entrada = $('#Operacion_id_moneda_origen').val();
        var tipo_operacion = $('#Operacion_id_tipo_operacion').val();
        var id_pais =  $('#Operacion_id_pais').val();
    }
</script>