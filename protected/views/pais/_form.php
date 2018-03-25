<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'pais-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'Code',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>3)))); ?>

	<?php echo $form->textFieldGroup($model,'pais',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>52)))); ?>

	<?php echo $form->textFieldGroup($model,'nombre_largo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250)))); ?>

	<?php echo $form->dropDownListGroup($model,'Continent', array('widgetOptions'=>array('data'=>array("Asia"=>"Asia","Europe"=>"Europe","North America"=>"North America","Africa"=>"Africa","Oceania"=>"Oceania","Antarctica"=>"Antarctica","South America"=>"South America",), 'htmlOptions'=>array('class'=>'input-large')))); ?>

	<?php echo $form->textFieldGroup($model,'Region',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>26)))); ?>

	<?php echo $form->textFieldGroup($model,'SurfaceArea',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'IndepYear',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'Population',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'LifeExpectancy',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'GNP',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'GNPOld',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'LocalName',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45)))); ?>

	<?php echo $form->textFieldGroup($model,'GovernmentForm',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45)))); ?>

	<?php echo $form->textFieldGroup($model,'HeadOfState',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>60)))); ?>

	<?php echo $form->textFieldGroup($model,'Capital',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'codigo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>2)))); ?>

	<?php echo $form->textFieldGroup($model,'calling_code',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>8)))); ?>

    <?php echo $form->textFieldGroup($model,'permitido',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

    <?php //echo $form->textFieldGroup($model,'tarifa_peso',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>



<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
