<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'tarifa-producto-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php $data = CHtml::listData(Producto::model()->findAll(), 'id_producto', 'producto');
        echo $form->dropDownListGroup($model,'id_producto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'FindCiudad(this.value)'), 'data'=>array(''=>__('Select...'))+$data))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
	    <?php echo $form->textFieldGroup($model,'tarifa_producto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php $data = CHtml::listData(Pais::model()->findAll(), 'id_pais', 'pais');
        echo $form->dropDownListGroup($model,'id_pais',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'FindCiudad(this.value)'), 'data'=>array(''=>__('Select...'))+$data))); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->dropDownListGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data' => array('1' => 'Activo', '0'=>'Inactivo' ),))); ?>
    </div>
</div>

	<?php //echo $form->textFieldGroup($model,'id_usuario_registro',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php //echo $form->textFieldGroup($model,'fecha_registro',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php //echo $form->textFieldGroup($model,'id_usuario_modifica',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php //echo $form->textFieldGroup($model,'fecha_modifica',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
