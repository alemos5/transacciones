<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'cuenta-bancaria-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
    <div class="col-sm-12 col-md-12">
	<?php echo $form->textFieldGroup($model,'alias_cuenta_bancaria',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php $data = CHtml::listData(Banco::model()->findAll(), 'id_banco', 'banco');
        echo $form->dropDownListGroup($model,'id_banco',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array(''=>__('Select...'))+$data))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php $data = array(
            '1'=>'Corriente',
            '2'=>'Ahorro',
        );
        echo $form->dropDownListGroup($model,'tipo_cunta',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array(''=>__('Select...'))+$data))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
	<?php echo $form->textFieldGroup($model,'cbu',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
	<?php echo $form->textFieldGroup($model,'Cuenta',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php $data = array(
            '1'=>'C.I',
            '2'=>'DNI',
            '3'=>'Pasaporte',
        );
        echo $form->dropDownListGroup($model,'tipo_documento',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array(''=>__('Select...'))+$data))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
	<?php echo $form->textFieldGroup($model,'documentacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>145)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
	<?php echo $form->textFieldGroup($model,'correo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>145)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->dropDownListGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data' => array('1' => 'Activo', '0'=>'Inactivo' ),))); ?>
    </div>
</div>

<?php //echo $form->textFieldGroup($model,'img',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45)))); ?>

<?php //echo $form->textFieldGroup($model,'id_pais',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45)))); ?>

<?php //echo $form->textFieldGroup($model,'id_usuario_registro',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<?php //echo $form->textFieldGroup($model,'fecha_registro',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<?php //echo $form->textFieldGroup($model,'id_usuario_modificacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<?php //echo $form->textFieldGroup($model,'fecha_modificacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<?php //echo $form->textFieldGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
