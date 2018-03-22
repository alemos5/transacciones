<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'perfil-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-xs-8">
      <?php echo $form->textFieldGroup($model,'nombre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
    </div>
    <div class="col-xs-4">
      <?php echo $form->dropDownListGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data' => array('1' => 'Activo', '0'=>'Inactivo' ),))); ?>
    </div>
  </div>
</div>

<div class="form-actions" style="padding-left: 15px;">
<?php $this->widget('booster.widgets.TbButton', array(
	'buttonType'=>'submit',
	'context'=>'primary',
	'label'=>$model->isNewRecord ? 'Create' : 'Save',
)); ?>
</div>

<?php $this->endWidget(); ?>
