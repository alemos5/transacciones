<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'franquiciado-form',
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning"><?php echo __('The required fields contain <span class="required">*</span>'); ?>.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
    <div class="col-sm-12 col-md-4">
        <?php $data = CHtml::listData(Usuario::model()->findAll(array('order'=>'usuario ASC')), 'id_usuario_sistema', 'usuario');
        echo $form->dropDownListGroup($model,'id_usuario_sistema',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array(''=>__('Select...'))+$data))); ?>
    </div>
    <div class="col-sm-12 col-md-4">
        <?php $data = CHtml::listData(Competencia::model()->findAll(), 'id_copetencia', 'competencia');
        echo $form->dropDownListGroup($model,'id_competencia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array(''=>__('Select...'))+$data))); ?>
    </div>
    <div class="col-sm-12 col-md-4">
        <?php $data = array(''=>__('Select'),
                            '1'=>__('Active'),
                            '0'=>__('Inactive')
                            );
        echo $form->dropDownListGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>$data)));
        ?>
        <?php //echo $form->dropDownListGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data' => array('1' => 'Active', '0'=>'Inactive' ),), 'labelOptions'=>array('label'=>'Status:'))); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-4">
        <?php echo $form->textFieldGroup($model,'porcentaje',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    </div>
    <div class="col-sm-12 col-md-4">
        <?php $data = array(''=>'Seleccione',
                            '1'=>'Validado', 
                            '0'=>'No validado'
                            );
        echo $form->dropDownListGroup($model,'validado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>$data)));
        ?>
        <?php //echo $form->textFieldGroup($model,'validado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    </div>
    <div class="col-sm-12 col-md-4">
        <?php $data = array('1'=>'Paypal', 
                            '2'=>__('Wire transfer')
                          );
        echo $form->dropDownListGroup($model,'forma_pago',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>$data)));
        ?>
        <?php //echo $form->textFieldGroup($model,'forma_pago',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-4">
        <?php echo $form->textAreaGroup($model,'descripcion', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
    </div>
    
    <div class="col-sm-12 col-md-4">
        <?php $data = array(''=>'Seleccione',
                            '1'=>'Si', 
                            '0'=>'No'
                            );
        echo $form->dropDownListGroup($model,'lider',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>$data)));
        ?>
        <?php //echo $form->dropDownListGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data' => array('1' => 'Active', '0'=>'Inactive' ),), 'labelOptions'=>array('label'=>'Status:'))); ?>
    </div>
    <div class="col-sm-12 col-md-4">
        <?php echo $form->labelEx($model,'img'); ?>
        <?php echo CHtml::activeFileField($model, 'img'); ?>  
        <?php echo $form->error($model,'img'); ?>
    </div>


</div>
	<?php //echo $form->textFieldGroup($model,'id_usuario_sistema',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php //echo $form->textFieldGroup($model,'id_competencia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php //echo $form->textFieldGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? __('Create') : __('Save'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
