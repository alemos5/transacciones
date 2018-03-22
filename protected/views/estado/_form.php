<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'estado-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<div class="row">
    <div class="col-md-6">
	<?php echo $form->textFieldGroup($model,'nombre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
        </div>
        
        <div class="col-md-6">
	<?php //echo $form->textFieldGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
        <?php echo $form->dropDownListGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data' => array('1' => 'Activo', '0'=>'Inactivo' ),), 'labelOptions'=>array('label'=>'Estatus:'))); ?>   
        </div>

    
    </div>
    
    
    
    <div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Update',
		)); ?>
    </div>

<?php $this->endWidget(); ?>
