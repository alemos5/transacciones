<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'cuenta-bancaria-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'alias_cuenta_bancaria',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45)))); ?>

	<?php echo $form->textFieldGroup($model,'id_banco',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'tipo_cunta',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'cbu',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250)))); ?>

	<?php echo $form->textFieldGroup($model,'Cuenta',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250)))); ?>

	<?php echo $form->textFieldGroup($model,'tipo_documento',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'documentacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>145)))); ?>

	<?php echo $form->textFieldGroup($model,'correo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>145)))); ?>

	<?php echo $form->textFieldGroup($model,'img',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45)))); ?>

	<?php echo $form->textFieldGroup($model,'id_pais',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45)))); ?>

	<?php echo $form->textFieldGroup($model,'id_usuario_registro',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'fecha_registro',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'id_usuario_modificacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'fecha_modificacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
