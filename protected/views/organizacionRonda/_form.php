<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'organizacion-ronda-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning">The required fields contain <span class="required">*</span>.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
    <div class="col-md-3">
        <?php 
            //echo $form->textFieldGroup($model,'id_competencia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); 
        ?>
        <?php $data = CHtml::listData(Competencia::model()->findAll(), 'id_copetencia', 'competencia');
        echo $form->dropDownListGroup($model,'id_competencia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array(''=>'Select...')+$data), 'labelOptions'=>array('label'=>'Competence:'))); ?>
    </div>
    <div class="col-md-3">
        <?php
            echo $form->textFieldGroup($model,'ronda',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250))));
        ?>
    </div>
    <div class="col-md-3">
        <?php
            echo $form->textFieldGroup($model,'capacidad_max_categoria',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
        ?>
        <?php 
//        $data = array(''=>'Seleccione',
//                            '5'=>'5', 
//                            '15'=>'15',
//                            '16'=>'16',
//                            
//                            );
//        echo $form->dropDownListGroup($model,'capacidad_max_categoria',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>$data)));
        ?>
        
    </div>
    <div class="col-md-3">
        <?php
            //echo $form->textFieldGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));
        ?>
        <?php $data = array(''=>'Seleccione',
                            '1'=>'Activo', 
                            '0'=>'Inactivo'
                            );
        echo $form->dropDownListGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'),'data'=>$data)));
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <?php 
            echo $form->datePickerGroup($model,'fecha_inicio',array('widgetOptions'=>array('options'=>array('format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); 
        ?>
    </div>
    <div class="col-md-3">
        <?php
          echo $form->timepickerGroup($model,'hora_inicio',array('widgetOptions' => array('options' => array('showMeridian' => false),'wrapperHtmlOptions' => array('class' => 'span5'),)));
        ?>
    </div>
    <div class="col-md-3">
        <?php 
            echo $form->datePickerGroup($model,'fecha_final',array('widgetOptions'=>array('options'=>array('format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); 
        ?>
    </div>
    <div class="col-md-3">
        <?php
          echo $form->timepickerGroup($model,'hora_final',array('widgetOptions' => array('options' => array('showMeridian' => false),'wrapperHtmlOptions' => array('class' => 'span5'),)));
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <?php
          echo $form->timepickerGroup($model,'duracion_inscripcion',array('widgetOptions' => array('options' => array('format'=>'H:i:s', 'showMeridian' => false),'wrapperHtmlOptions' => array('class' => 'span5'),)));
        ?>
    </div>
    <div class="col-md-3">
    <br>
    <a class="btn btn-default" onclick="calcular()">
            <span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;<?php echo __('Calculate'); ?>
        </a>
    </div>
</div>
<br>
<div class="panel panel-default">
    <div class="panel-heading">
        <?php echo __('Event calculation'); ?>
    </div>
    <div class="panel-body">
        <div id="reglas"></div>
        
    </div>
</div>



	

	<?php  ?>

	<?php // echo $form->datePickerGroup($model,'fecha_inicio',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'Click on Month/Year to select a different Month/Year.')); ?>

	<?php // echo $form->textFieldGroup($model,'hora_inicio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php // echo $form->datePickerGroup($model,'fecha_final',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>', 'append'=>'Click on Month/Year to select a different Month/Year.')); ?>

	<?php // echo $form->textFieldGroup($model,'hora_final',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php  ?>


<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

<script>
function calcular(){
    var OrganizacionRonda_id_competencia = $('#OrganizacionRonda_id_competencia').val();
    var OrganizacionRonda_capacidad_max_categoria = $('#OrganizacionRonda_capacidad_max_categoria').val();
    var OrganizacionRonda_fecha_inicio = $('#OrganizacionRonda_fecha_inicio').val();
    var yw1 = '00:'+$('#yw1').val();
    var OrganizacionRonda_fecha_final = $('#OrganizacionRonda_fecha_final').val();
    var yw3 = '00:'+$('#yw3').val();
    var yw4 = '00:'+$('#yw4').val();
    
    if(OrganizacionRonda_id_competencia){
        if(OrganizacionRonda_capacidad_max_categoria){
            if(OrganizacionRonda_fecha_inicio){
                if(yw1){
                    if(OrganizacionRonda_fecha_final){
                        if(yw3){
                            if(yw4){
                                $.post("<?php echo Yii::app()->createUrl('organizacionRonda/calcular') ?>",{ 
                                    //inscripcion:inscripcion, accion:accion 
                                    OrganizacionRonda_id_competencia:OrganizacionRonda_id_competencia,
                                    OrganizacionRonda_capacidad_max_categoria:OrganizacionRonda_capacidad_max_categoria,
                                    OrganizacionRonda_fecha_inicio:OrganizacionRonda_fecha_inicio,
                                    yw1:yw1,
                                    OrganizacionRonda_fecha_final:OrganizacionRonda_fecha_final,
                                    yw3:yw3,
                                    yw4:yw4
                                },
                                function(data){
                                    $('#reglas').html(data);
                                });
                            }else{

                            }
                        }else{

                        }
                    }else{

                    }
                }else{

                }
            }else{

            }
        }else{
            
        }
    }else{
        
    }
}    
</script>