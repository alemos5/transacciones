<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'banco-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'id_pais',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'banco',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>245)))); ?>

	<?php echo $form->textFieldGroup($model,'siglas',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45)))); ?>

	<?php echo $form->textFieldGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
