<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
  'action'=>Yii::app()->createUrl($this->route),
  'method'=>'get',
)); ?>

<?php echo $form->textFieldGroup($model,'id_usuario_sistema',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<?php echo $form->textFieldGroup($model,'cedula',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<?php echo $form->textFieldGroup($model,'usuario',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>

<?php echo $form->textFieldGroup($model,'primer_nombre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>

<?php echo $form->textFieldGroup($model,'segundo_nombre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>

<?php echo $form->textFieldGroup($model,'primer_apellido',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>

<?php echo $form->textFieldGroup($model,'segundo_apellido',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>

<?php echo $form->datePickerGroup($model,'fecha_nacimiento',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'Click on Month/Year to select a different Month/Year.')); ?>

<?php echo $form->textFieldGroup($model,'sexo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>1)))); ?>

<?php echo $form->textFieldGroup($model,'observacion_personal',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

<?php echo $form->textFieldGroup($model,'contrasena',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>

<?php echo $form->datePickerGroup($model,'fecha_registro',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'Click on Month/Year to select a different Month/Year.')); ?>

<?php echo $form->textFieldGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<?php echo $form->textFieldGroup($model,'estatus_contrasena',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<?php echo $form->textFieldGroup($model,'id_perfil_sistema',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<?php echo $form->textFieldGroup($model,'direccion_ip',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>

<?php echo $form->textFieldGroup($model,'id_registrador',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions">
<?php $this->widget('booster.widgets.TbButton', array(
  'buttonType' => 'submit',
  'context'=>'primary',
  'label'=>'Buscar',
)); ?>
</div>

<?php $this->endWidget(); ?>