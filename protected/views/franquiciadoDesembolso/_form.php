<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'franquiciado-desembolso-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning">The required fields contain <span class="required">*</span>.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
    <div class="col-sm-12 col-md-3">
        <?php $data = CHtml::listData(Competencia::model()->findAll(), 'id_copetencia', 'competencia');
        echo $form->dropDownListGroup($model,'id_competencia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'franquiciado(this.value)'), 'data'=>array(''=>'Select...')+$data), 'labelOptions'=>array('label'=>'Competencia:'))); ?>
    </div>
    <div class="col-sm-12 col-md-3">
        <?php 
        if($model->id_franquiciado){
            $data = CHtml::listData(Usuario::model()->findAll(array('order'=>'usuario ASC')), 'id_usuario_sistema', 'correo');
        }else{
            $data = array();
        }
        
        echo $form->dropDownListGroup($model,'id_franquiciado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array(''=>'Select...')+$data), 'labelOptions'=>array('label'=>'Competence:'))); ?>
        <?php //echo $form->textFieldGroup($model,'id_franquiciado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    </div>
    <div class="col-sm-12 col-md-3">
        <?php echo $form->textFieldGroup($model,'monto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>
    </div>
    <div class="col-sm-12 col-md-3">
        <?php $data = array(''=>'Seleccione',
                            '1'=>'Activo', 
                            '0'=>'Inactivo'
                            );
        echo $form->dropDownListGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>$data)));
        ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textAreaGroup($model,'descripcion', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
    </div>
</div>
	

	


	<?php //echo $form->textFieldGroup($model,'fecha_registro',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php //echo $form->textFieldGroup($model,'id_usuario',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	

	

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

<script>
function franquiciado(competencia){
    //alert(competencia);
    $.post("<?php echo Yii::app()->createUrl('franquiciado/findFranquiciado') ?>",{ competencia:competencia },function(data){$("#FranquiciadoDesembolso_id_franquiciado").html(data);});
}    
</script>