<?php 
//echo "ID: ".$id." - Tipo: ".$tipo;

$valorPaseCompetidor = 0;
$fechaActual = strtotime(date("Y-m-d H:i:s"));
$paseCompetidores = PaseCompetidor::model()->findAll('id_competencia ='.$id.' ORDER BY fecha_pase DESC');
foreach ($paseCompetidores as $paseCompetidor){
//    echo $paseCompetidor->valor."-".$paseCompetidor->fecha_pase."<br>";
    $fechaPase = strtotime($paseCompetidor->fecha_pase);
    if($fechaPase >= $fechaActual){
        $valorPaseCompetidor = $paseCompetidor->valor;
//        break;
    }

}

//echo $valorPaseCompetidor;    
    

$form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'pago-form',
//        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'enableAjaxValidation'=>false,
)); ?>


<input id="valorPase" name="valorPase" type="hidden" value="<?php echo $valorPaseCompetidor;?>">
<input id="id" name="id" value="<?php echo $id; ?>" type="hidden">
<input id="tipo" name="tipo" value="<?php echo $tipo; ?>" type="hidden">
<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
    <div class="col-sm-12 col-md-6">
        
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label required" for="Usuario_tipo_documento">
                        T. de Identificación:
                    <span class="required">*</span>
                    </label>
                    <select id="tipo_documento" class="span5 form-control" placeholder="Tipo Documento" name="tipo_documento">
                        <option value="">Seleccione...</option>
                        <option selected="selected" value="1">Cédula Ciudadanía</option>
                        <option value="2">Licencia de Conducir</option>
                        <option value="3">Cédula de Extranjería</option>
                        <option value="4">Pasaporte</option>
                        <option value="5">Tarjeta de Identidad</option>
                        <option value="6">Registro Civil</option>
                    </select>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    
                    <label class="control-label required" for="Usuario_tipo_documento">
                       N. de Identificación:
                    <span class="required">*</span>
                    </label>
                    <div class="col-sm-12 bootstrap-timepicker input-group">
                        <input onblur='findIdentificacion(this.value)'  onKeyPress='return soloNumeros(event)' style=" width: 100%;" id="usuarioBusqueda" class="form-control" type="text" onblur="" placeholder="Ingrese su número de identificación" name="correoBusqueda" maxlength="30" size="45">
                        <label onclick="findIdentificacion()" class="input-group-addon btn btn-primary" style="width: 10%;" onclick="">
                            <span onclick="findIdentificacion()" class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            Buscar
                        </label>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div id="UsuarioEncontrado">
                    
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span onclick="" class="glyphicon glyphicon-user" aria-hidden="true"></span>  Datos
                    </div>
                    <div class="panel-body">
                        <div style=" margin-top: 0px;" class="pd-inner">
                        <div id="table-participante" style="padding: 0 5px 5px 5px;">
                            <div class="row" id="head-table-participante">
                              <!--<div class="col-xs-4" style="padding: 8px;"><center><strong>Identificación</strong></center></div>-->
                              <div class="col-xs-6" style="padding: 5px;"><strong>Usuario</strong></div>
                              <div class="col-xs-4" style="padding: 5px;"><strong>Identificación</strong></div>
                              <div class="col-xs-2" style="text-align: right; padding: 5px;"><strong>Acción</strong></div>
                            </div>
                            <?php
                            $count = 0;
                            $countRowParticipante = 0;
                            if (!$model->isNewRecord){
                                /*$countRowParticipante = 1;
                                $i = 0;
                                if(isset($categoriaItemsCount)){
                                    $count = count($categoriaItemsCount);
                                    foreach($categoriaItemsCount as $ItemsCount){
                                        ?>
                             <div id="removeParticipante<?php echo $i;?>" class="row"  style="border-top: 1px solid #ddd;">
                            <!--<div class="row">-->
                                <div class="col-xs-3" style="padding: 8px;">
                                    <?php
                                    $categoriaItems->id_item_calificacion = $ItemsCount->id_item_calificacion;
                                    $data = CHtml::listData(ItemCalificacion::model()->findAll(array()), 'id_item_calificacion', 'item_calificacion');
                                    echo $form->dropDownListGroup($categoriaItems,'id_item_calificacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'name'=>'AddItemsCategoria'.$i), 'data'=>$data), 'labelOptions'=>array('label'=>false))); ?>
                                </div>
                                <div class="col-xs-3" style="padding: 8px;">
                                    <?php
                                    $categoriaItems->rango_min = $ItemsCount->rango_min;
                                    echo $form->textFieldGroup($categoriaItems, 'rango_min', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'onkeyup'=>"miles_decimales(this,this.value.charAt(this.value.length-1),'decimales')", 'maxlength' => 3, 'name'=>'CategoriaItemCalificacion_rango_min'.$i)), 'labelOptions'=>array('label'=>false)));
                                    ?>
                                </div>
                                <div class="col-xs-3" style="padding: 8px;">
                                    <?php
                                    $categoriaItems->rango_max = $ItemsCount->rango_max;
                                    echo $form->textFieldGroup($categoriaItems, 'rango_max', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'onkeyup'=>"miles_decimales(this,this.value.charAt(this.value.length-1),'decimales')", 'maxlength' => 3, 'name'=>'CategoriaItemCalificacion_rango_max'.$i)), 'labelOptions'=>array('label'=>false)));
                                    ?>
                                </div>
                                <div class="col-xs-3" style="padding: 8px;">
                                    <a class="delete" data-original-title="Borrar" title="" data-toggle="tooltip" href="javascript:removeParticipante(<?php echo $i; ?>)">
                                    <i class="glyphicon glyphicon-trash"></i>
                                    </a>
                                </div>
                            </div>
                                        <?php
                                        $i++;
                                        $countRowParticipante++;
                                    }
                                }*/
                            }else{
                              ?>
                             </div>
                              <?php

                            }
                            ?>
                        </div>
                        <input id="countRowParticipante" type="hidden" name="countRowParticipante" value="<?php echo $countRowParticipante; ?>" />
                        <input id="nextRowParticipante" type="hidden" name="nextRowParticipante" value="<?php echo $count; ?>" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <?php // echo $form->textFieldGroup($model,'id_tipo_pago',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php // echo $form->textFieldGroup($model,'id_copetencia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php // echo $form->textFieldGroup($model,'id_categoria',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php // echo $form->textFieldGroup($model,'id_usuario',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php // echo $form->textFieldGroup($model,'id_usuario_pagador',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php //echo $form->textFieldGroup($model,'costo_pagar',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

	<?php //echo $form->textFieldGroup($model,'costo_pagado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>
        <input id="Pago_referencia" class="span5 form-control" type="hidden" name="Pago[referencia]" placeholder="Referencia" value="Pago vía Paypal" maxlength="250">
	<?php /*//echo $form->textFieldGroup($model,'id_forma_pago',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
        
        <div class="row">    
            <div class="col-sm-12 col-md-12">
                <?php echo $form->textFieldGroup($model,'referencia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250)))); ?>
            </div>
        </div>
        <div class="row">    
            <div class="col-sm-12 col-md-12">
                <?php echo $form->textAreaGroup($model,'descripcion', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
            </div>
        </div>
        <div class="row">    
            <div class="col-sm-12 col-md-12">
                <!--<div class="row">-->
                    <?php echo $form->labelEx($model,'img'); ?>
                    <?php echo CHtml::activeFileField($model, 'img'); ?>  
                    <?php echo $form->error($model,'img'); ?>
                <!--</div>-->
                    <?php if($model->isNewRecord!='1'){ ?>
                    <!--<div class="row">-->
                        <br>
                     <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/pago/'.$model->img,"image",array("width"=>200)); ?>  
                <!--</div>-->

                <?php } ?>
            </div>
        </div>
        <br>
	<?php */// echo $form->textAreaGroup($model,'img', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
        <br>

        <div class="panel panel-warning">
            <div class="panel-heading"> <span onclick="" class="glyphicon glyphicon-list" aria-hidden="true"></span>  Factura</div>
                <div class="panel-body">
                    <div style=" margin-top: 0px;" class="pd-inner">
                    <div id="table-participante2" style="padding: 0 0px 0px 0px;">
                        <div class="row" id="head-table-participante">
                          <!--<div class="col-xs-4" style="padding: 8px;"><center><strong>Identificación</strong></center></div>-->
                          <div class="col-xs-6" style="padding: 0px;"><strong>Items</strong></div>
                          <div class="col-xs-6" style=" text-align: right; padding: 0px;"><strong>Monto</strong></div>
                        </div>
                        <?php
                        $count2 = 0;
                        $countRowParticipante2 = 0;
                        $resultadoAcumulador = 0;
                        if (!$model->isNewRecord){
                            /*$countRowParticipante = 1;
                            $i = 0;
                            if(isset($categoriaItemsCount)){
                                $count = count($categoriaItemsCount);
                                foreach($categoriaItemsCount as $ItemsCount){
                                    ?>
                         <div id="removeParticipante<?php echo $i;?>" class="row"  style="border-top: 1px solid #ddd;">
                        <!--<div class="row">-->
                            <div class="col-xs-3" style="padding: 8px;">
                                <?php
                                $categoriaItems->id_item_calificacion = $ItemsCount->id_item_calificacion;
                                $data = CHtml::listData(ItemCalificacion::model()->findAll(array()), 'id_item_calificacion', 'item_calificacion');
                                echo $form->dropDownListGroup($categoriaItems,'id_item_calificacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'name'=>'AddItemsCategoria'.$i), 'data'=>$data), 'labelOptions'=>array('label'=>false))); ?>
                            </div>
                            <div class="col-xs-3" style="padding: 8px;">
                                <?php
                                $categoriaItems->rango_min = $ItemsCount->rango_min;
                                echo $form->textFieldGroup($categoriaItems, 'rango_min', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'onkeyup'=>"miles_decimales(this,this.value.charAt(this.value.length-1),'decimales')", 'maxlength' => 3, 'name'=>'CategoriaItemCalificacion_rango_min'.$i)), 'labelOptions'=>array('label'=>false)));
                                ?>
                            </div>
                            <div class="col-xs-3" style="padding: 8px;">
                                <?php
                                $categoriaItems->rango_max = $ItemsCount->rango_max;
                                echo $form->textFieldGroup($categoriaItems, 'rango_max', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'onkeyup'=>"miles_decimales(this,this.value.charAt(this.value.length-1),'decimales')", 'maxlength' => 3, 'name'=>'CategoriaItemCalificacion_rango_max'.$i)), 'labelOptions'=>array('label'=>false)));
                                ?>
                            </div>
                            <div class="col-xs-3" style="padding: 8px;">
                                <a class="delete" data-original-title="Borrar" title="" data-toggle="tooltip" href="javascript:removeParticipante(<?php echo $i; ?>)">
                                <i class="glyphicon glyphicon-trash"></i>
                                </a>
                            </div>
                        </div>
                                    <?php
                                    $i++;
                                    $countRowParticipante++;
                                }
                            }*/
                        }else{
                          ?>
                         </div>
                          <?php

                        }
                        ?>
                    </div>
                    
                    <input id="resultadoAcumulador" type="hidden" name="resultadoAcumulador2" value="<?php echo $resultadoAcumulador; ?>" />
                    <input id="countRowParticipante2" type="hidden" name="countRowParticipante2" value="<?php echo $countRowParticipante2; ?>" />
                    <input id="nextRowParticipante2" type="hidden" name="nextRowParticipante2" value="<?php echo $count2; ?>" />
                </div>
            <div class="panel-heading">
                <div class="row">
                    <div  style="margin-left: 20px; ">
                        <b>Total</b>
                    </div>
                    <div style="margin-right: 35px; text-align: right;" >
                        <label  id="resultadosPago"><b>0</b></label>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
	
<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Pagar' : 'Actualizar Pago',
		)); ?>
</div>

<?php $this->endWidget(); ?>

<script>
    
//============================================================================//    
// Registro de items en factura    
//============================================================================//    
    
function addNewParticipante2() {
    var valorPase = $('#valorPase').val();
    var usuario_e  = $('#usuario_e').val();
    var usuario_i  = $('#id_usuario_i').val();
    var resultadoAcumulador = $('#resultadoAcumulador').val();
    $('#table-participante2').append(
       '<div id="removeParticipante2'+$('#nextRowParticipante2').val()+'" class="row" style="border-top: 1px solid #ddd;"><div class="col-xs-6" style="padding: 0px;"> <input type="hidden" id="pagoDetalle'+$('#nextRowParticipante2').val()+'" name="pagoDetalle'+$('#nextRowParticipante2').val()+'" value="Pase - '+usuario_e+' - '+usuario_i+'">      <input type="hidden" id="acumulador'+$('#nextRowParticipante2').val()+'" name="acumulador'+$('#nextRowParticipante2').val()+'" value="'+valorPase+'">   <label>Pase - '+usuario_e+' - '+usuario_i+'</label></div><div style="text-align: right" class="col-xs-6" style="padding: 0px;"><label>'+valorPase+'$</label></div></div>'  
     );
    $('#nextRowParticipante2').val(parseFloat($('#nextRowParticipante2').val())+1);
    $('#countRowParticipante2').val(parseFloat($('#countRowParticipante2').val())+1);
    var r = parseFloat(resultadoAcumulador)+parseFloat(valorPase);
    $('#resultadoAcumulador').val(r);
    $('#resultadosPago').html(r+'$');
}
    
    
function removeParticipante2(id) {
    var valorPase = $('#valorPase').val();
    var resultadoAcumulador = $('#resultadoAcumulador').val();
    $('#removeParticipante2'+id).remove();
    $('#countRowParticipante2').val(parseFloat($('#countRowParticipante2').val())-1);
    var r = parseFloat(resultadoAcumulador)-parseFloat(valorPase);
    $('#resultadoAcumulador').val(r);
    $('#resultadosPago').html(r+'$');
}    
    
function removeParticipante(id) {
  
  if(confirm('¿Está seguro que desea borrar este elemento?')) {
    $('#removeParticipante'+id).remove();
    $('#countRowParticipante').val(parseFloat($('#countRowParticipante').val())-1);
    removeParticipante2(id);
  }
  
}    
    
    
//============================================================================//    
// Agregar participante
//============================================================================// 

function addNewParticipante() {
//    alert("Aqui");
    var id_usuario_e = $('#id_usuario_e').val();
    var usuario_e  = $('#usuario_e').val();
    var usuario_i  = $('#id_usuario_i').val();
    if ($('#countRowParticipante').val()==0) {
//      $('#table-participante').append('<div id="removeParticipante'+$('#nextRowParticipante').val()+'" class="row" style="border-top: 1px solid #ddd;"><div class="col-xs-3" style="padding: 8px;"><select onchange="" id="itemsCategoria'+$('#nextRowParticipante').val()+'" class="span5 form-control" name="AddItemsCategoria'+$('#nextRowParticipante').val()+'"><?php echo $options; ?></select></div><div class="col-xs-3" style="padding: 8px;"><input type="text" class="span5 form-control" name="CategoriaItemCalificacion_rango_min'+$('#nextRowParticipante').val()+'"  id="CategoriaItemCalificacion_rango_min'+$('#nextRowParticipante').val()+'" onkeypress="return soloNumeros(event)"  value="" placeholder="0.0" maxlength="3" /></div><div class="col-xs-3" style="padding: 8px;"><input class="span5 ui-autocomplete-input form-control" type="text" name="CategoriaItemCalificacion_rango_max'+$('#nextRowParticipante').val()+'" id="CategoriaItemCalificacion_rango_max'+$('#nextRowParticipante').val()+'" onkeypress="return soloNumeros(event)"  placeholder="0.0" ></div><div class="col-xs-2" style="padding: 8px;"><a class="delete" href="javascript:removeParticipante('+$('#nextRowParticipante').val()+')" data-toggle="tooltip" title="" data-original-title="Borrar"><i class="glyphicon glyphicon-trash"></i></a></div></div>');
    }
    
    $('#table-participante').append(
       '<div id="removeParticipante'+$('#nextRowParticipante').val()+'" class="row" style="border-top: 1px solid #ddd;"><div class="col-xs-6" style="padding: 8px;"> <input type="hidden" id="id_usuario_eR'+$('#nextRowParticipante').val()+'" name="id_usuario_eR'+$('#nextRowParticipante').val()+'" value="'+id_usuario_e+'">    <label>'+usuario_e+'</label></div><div class="col-xs-4" style="padding: 8px;"><label>'+usuario_i+'</label></div><div style="text-align: right" class="col-xs-2" style="padding: 8px;"><a class="delete" href="javascript:removeParticipante('+$('#nextRowParticipante').val()+')" data-toggle="tooltip" title="" data-original-title="Borrar"><i class="glyphicon glyphicon-trash"></i></a></div></div>'  
     );
    $('#nextRowParticipante').val(parseFloat($('#nextRowParticipante').val())+1);
    $('#countRowParticipante').val(parseFloat($('#countRowParticipante').val())+1);
    addNewParticipante2();
     $('#btAgregar').css('display', 'none');
}    
    
    
function findIdentificacion(identificacion) {
  var id = $('#id').val();
//  alert(id);
  var tipo = $('#tipo').val();  
  identificacion = document.getElementById("usuarioBusqueda").value;
  var tipo_documento = document.getElementById("tipo_documento").value;   
  $.post("<?php echo Yii::app()->createUrl('usuario/findIdentificacion2') ?>",{ tipo_documento:tipo_documento, identificacion:identificacion, id:id, tipo:tipo },
  function(data){
//     if(data == 1){
//         alert("Ya el usuario se encuentra registrado");
//         $('#errorRegistro').css('display', 'block');
//         $('#cedulaE').css('display', 'block');
//     }else{
//         $('#errorRegistro').css('display', 'none');
//         $('#cedulaE').css('display', 'none');
//     }
     $('#UsuarioEncontrado').html(data);
  });
}
</script>