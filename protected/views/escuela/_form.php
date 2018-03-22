<?php
/* @var $this EscuelaController */
/* @var $model Escuela */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'escuela-form',
	'enableAjaxValidation'=>false,
)); ?>

    <p class="alert alert-warning"><?php echo __('The required fields contain <span class="required">*</span>'); ?>.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldGroup($model,'escuela',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php echo $form->textFieldGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>


    <div class="form-actions">
        <?php $this->widget('booster.widgets.TbButton', array(
            'buttonType'=>'submit',
            'context'=>'primary',
            'label'=>$model->isNewRecord ? __('Create') : __('Save'),
        )); ?>
            </div>


<?php $this->endWidget(); ?>

</div><!-- form -->