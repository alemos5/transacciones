<?php $date = new Date();  ?>
<div class="container-fluid">
  <?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
    'id'=>'inspection-form',
    'enableAjaxValidation'=>false,
  )); ?>
  <p class="note">Campos con <span class="required">*</span> son requeridos.</p>
  <?php echo $form->errorSummary($model); ?>
  <div class="row">
    <div class="col-md-4">
      <?php echo $form->textFieldGroup($model,'cedula',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    </div>
    <div class="col-md-4">
      <?php echo $form->textFieldGroup($model,'usuario',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
    </div>
    <div class="col-md-4">
      <?php echo $form->dropDownListGroup($model,'id_perfil_sistema',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data' => array(''=>'Seleccione...')+CHtml::listData(Perfil::model()->findAll(array('order'=>'nombre')), 'id_perfil_sistema', 'nombre'),))); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <?php echo $form->textFieldGroup($model,'primer_nombre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>
    </div>
    <div class="col-md-4">
      <?php echo $form->textFieldGroup($model,'segundo_nombre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>
    </div>
    <div class="col-md-4">
      <?php //echo $form->dropDownListGroup($model,'id_sociedad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data' => array(''=>'Seleccione...')+CHtml::listData(Sociedad::model()->findAll(array('order'=>'nombre')), 'id_sociedad', 'nombre'),))); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <?php echo $form->textFieldGroup($model,'primer_apellido',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>
    </div>
    <div class="col-md-4">
      <?php echo $form->textFieldGroup($model,'segundo_apellido',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>20)))); ?>
    </div>
    <div class="col-md-4">
      <?php echo $form->dropDownListGroup($model,'sexo',array('widgetOptions'=>array('htmlOptions'=>array(), 'data' => array('' => 'Seleccione', 'M' => 'Masculino', 'F'=>'Femenino' ),))); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <?php echo $form->passwordFieldGroup($model,'contrasena',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label class="control-label required" for="repeat">Repetir Contraseña:<span class="required">*</span></label>
        <input id="repeat" class="span5 form-control" type="password" name="repeat" placeholder="Repetir Contraseña" maxlength="200">
      </div>
    </div>
    <div class="col-md-4">
      <?php if($model->fecha_nacimiento) $model->fecha_nacimiento = $date->convertDateEnToEs($model->fecha_nacimiento);
      echo $form->datePickerGroup($model,'fecha_nacimiento',array('widgetOptions'=>array('options'=>array('format'=>'dd-mm-yyyy'), 'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'<!--Click on Month/Year to select a different Month/Year.-->')); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <?php echo $form->textAreaGroup($model,'observacion_personal',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>
    </div>
  </div>
  <div class="form-actions">
    <?php $this->widget('booster.widgets.TbButton', array(
      'buttonType'=>'submit',
      'context'=>'primary',
      'label'=>$model->isNewRecord ? 'Crear' : 'Modificar',
    )); ?>
  </div>
  <?php $this->endWidget(); ?>
</div>