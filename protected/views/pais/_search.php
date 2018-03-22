<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldGroup($model,'id_pais',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

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

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType' => 'submit',
			'context'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
