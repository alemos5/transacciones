<div class="container-fluid">
  <?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
    'id'=>'inspection-form',
    'enableAjaxValidation'=>false,
  )); ?>
  <p class="note">Fields with <span class="required">*</span> are required.</p>
  <?php echo $form->errorSummary($model); ?>
  <div class="row">
    <div class="col-md-4">
      <?php echo $form->textFieldGroup($model,'nombre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
    </div>
    <div class="col-md-4">
      <?php echo $form->textFieldGroup($model,'ruta',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>
    </div>
    <div class="col-md-4">
      <?php $data = CHtml::listData(Menu::model()->findAll(), 'id_menu_sistema', 'nombre');
      echo $form->dropDownListGroup($model,'padre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data' => array('0'=>'Seleccione...') + $data))); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <?php echo $form->textFieldGroup($model,'nivel',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    </div>
    <div class="col-md-4">
      <?php echo $form->dropDownListGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data' => array('1' => 'Activo', '0'=>'Inactivo' )))); ?>
    </div>
    <div class="col-md-4">
    </div>
  </div>
  <div class="form-actions">
    <?php $this->widget('booster.widgets.TbButton', array(
      'buttonType'=>'submit',
      'context'=>'primary',
      'label'=>$model->isNewRecord ? 'Create' : 'Edit',
    )); ?>
  </div>
  <?php $this->endWidget(); ?>
</div>
