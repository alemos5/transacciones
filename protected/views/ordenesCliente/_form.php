<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'ordenes-cliente-form',
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldGroup($model,'id_cli',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="row">
    <div class="col-xs-12">
        <?php echo $form->textFieldGroup($model,'nu_orden',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>15)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <?php echo $form->textFieldGroup($model,'tienda',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <?php echo $form->textFieldGroup($model,'descripcion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <?php echo $form->textFieldGroup($model,'valor',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <?php echo $form->textFieldGroup($model,'tracking',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>60)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <?php echo $form->textFieldGroup($model,'courier',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>30)))); ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-4">
        <?php echo $form->labelEx($model,'doc'); ?>
        <?php echo CHtml::activeFileField($model, 'doc'); ?>  
        <?php echo $form->error($model,'doc'); ?>
        <?php if($model->isNewRecord!='1'){ ?>
            <br>
             <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/prealerta/'.$model->doc,"image",array("width"=>200)); ?>  
        <?php } ?>
    </div>
    <div class="col-xs-8">
        <?php echo $form->textAreaGroup($model,'observacion', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
    </div>
</div>


	

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
