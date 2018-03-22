<?php
/* @var $this EscuelaController */
/* @var $model Escuela */
/* @var $form CActiveForm */
?>


<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

    <?php echo $form->textFieldGroup($model,'id_escuela',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php echo $form->textFieldGroup($model,'escuela',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php echo $form->textFieldGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>


    <div class="form-actions">
        
        <?php $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'context'=>'primary',
            'label'=>__('Search'),
        )); ?>
            </div>



<?php $this->endWidget(); ?>
