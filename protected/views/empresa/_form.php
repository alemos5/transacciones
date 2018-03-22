<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'empresa-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textFieldGroup($model,'empresa',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textAreaGroup($model,'descripcion', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
    </div>
</div>
<?php echo $form->errorSummary($model); ?>



	<?php //echo $form->textFieldGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
