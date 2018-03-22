<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'item-calificacion-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning"><?php echo __('The required fields contain <span class="required">*</span>.'); ?>.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'item_calificacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250)))); ?>

	<?php echo $form->textFieldGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? __('Create') : __('Save'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
