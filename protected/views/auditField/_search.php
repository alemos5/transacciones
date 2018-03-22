<?php
/* @var $this AuditFieldController */
/* @var $model AuditField */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

    <?php echo $form->textFieldGroup($model,'id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php echo $form->textFieldGroup($model,'audit_request_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php echo $form->textFieldGroup($model,'user_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php echo $form->textFieldGroup($model,'old_value',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php echo $form->textFieldGroup($model,'new_value',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php echo $form->textFieldGroup($model,'action',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php echo $form->textFieldGroup($model,'model_name',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php echo $form->textFieldGroup($model,'model_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php echo $form->textFieldGroup($model,'field',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php echo $form->textFieldGroup($model,'created',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>


    <div class="form-actions">
        
        <?php $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'context'=>'primary',
            'label'=>__('Search'),
        )); ?>
            </div>



<?php $this->endWidget(); ?>
