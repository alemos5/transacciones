<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'servicio-form',
	'enableAjaxValidation'=>false,
)); 

//echo "<hr>".$model->precio_neto."<hr>";

?>

<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>

<?php echo $form->errorSummary($model); ?>
<div class="row">
    <div class="col-sm-12 col-md-12">
       	<?php
        $data = CHtml::listData(Empresa::model()->findAll(array()), 'id_empresa', 'empresa');
        echo $form->dropDownListGroup($model,'id_empresa',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array(''=>'Seleccione ...')+$data), 'labelOptions'=>array('label'=>'Empresa'))); 
        ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-4">
       	<?php echo $form->textFieldGroup($model,'servicio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250)))); ?>
    </div>
    <div class="col-sm-12 col-md-3">
        <?php echo $form->textFieldGroup($model,'precio_neto',array('widgetOptions'=>array('htmlOptions'=>array('disabled'=>'disabled' ,'class'=>'span5', 'placeholder'=>"0.00", 'maxlength'=>10, 'onkeypress'=>"return NumCheck(event, this)"))));  // 'onblur'=>'gastoOperativo(this.value)', ?>
    </div>
    <div class="col-sm-12 col-md-3">
        <?php echo $form->textFieldGroup($model,'precio_sugerido',array('widgetOptions'=>array('htmlOptions'=>array('disabled'=>'disabled', 'class'=>'span5', 'placeholder'=>"0.00", 'onblur'=>'calculoPorcentajeGanancia(this.value)','onkeypress'=>"return NumCheck(event, this)")))); ?>
    </div>
    <div class="col-sm-12 col-md-2">
        <?php echo $form->textFieldGroup($model,'porcentaje_ganacia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'placeholder'=>"0.00",'maxlength'=>10, 'disabled'=>'disabled')))); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default">
        <div class="panel-heading"><span class="glyphicon glyphicon-indent-right" aria-hidden="true"></span>&nbsp;&nbsp;Gastos</div>
          <div class="pd-inner">
                <div id="table-participante" style="padding: 0 20px 20px 20px;">
                    <div class="row" id="head-table-participante">
                      <div class="col-xs-2" style="padding: 8px;"><center><strong>Gastos</strong></center></div>
                      <div class="col-xs-2" style="padding: 8px;"><center><strong>Costo Gasto</strong></center></div>
                      <div class="col-xs-2" style="padding: 8px;"><center><strong>Precio Sugerido</strong></center></div>
                      <div class="col-xs-1" style="padding: 8px;"><center><strong>Unidad de Medida</strong></center></div>
                      <div class="col-xs-1" style="padding: 8px;"><center><strong>Tipo de Cobro</strong></center></div>
                      <div class="col-xs-1" style="padding: 8px;"><center><strong>Kg C&aacute;lculo</strong></center></div>
                      <div class="col-xs-1" style="padding: 8px;"><center><strong>Lb C&aacute;lculo</strong></center></div>
                      <div class="col-xs-1" style="padding: 8px;"><center><strong>Calculado Por</strong></center></div>
                      <div class="col-xs-1" style="padding: 8px;"><center><strong>Acción</strong></center></div>
                    </div>
                    <?php
                    $count = 0;
                    $countRowParticipante = 0;
                    if (!$model->isNewRecord){
                        $countRowParticipante = 1;
                        $i = 0;
                        if(isset($servicioItemsCount)){
                            $count = count($servicioItemsCount);
                            foreach($servicioItemsCount as $ItemsCount){
                                ?>
                     <div id="removeParticipante<?php echo $i;?>" class="row"  style="border-top: 1px solid #ddd;">
                    <!--<div class="row">-->
                        <div class="col-xs-2" style="padding: 8px;">
                            <?php
                            $servicioImpuesto->id_impuesto = $ItemsCount->id_impuesto;
                            $data = CHtml::listData(Impuesto::model()->findAll(array()), 'id_impuesto', 'impuesto');
                            echo $form->dropDownListGroup($servicioImpuesto,'id_impuesto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'name'=>'AddItemsImpuesto'.$i), 'data'=>$data), 'labelOptions'=>array('label'=>false))); ?>
                        </div>
                        <div class="col-xs-2" style="padding: 8px;">
                            <?php
                            $servicioImpuesto->	precio_impuesto = $ItemsCount->	precio_impuesto;
                            echo $form->textFieldGroup($servicioImpuesto, 'precio_impuesto', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 9, 'onKeyup'=>"calculoGastoOperativoMonto(this.value, ".$i.")" ,  'name'=>'ImpuestoCosto'.$i )),  'labelOptions'=>array('label'=>false)));
                            ?>
                        </div>
                        <div class="col-xs-2" style="padding: 8px;">
                            <?php
                            $servicioImpuesto->precio_sugerido = $ItemsCount->precio_sugerido;
                            echo $form->textFieldGroup($servicioImpuesto, 'precio_sugerido', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 9, 'onKeyup'=>"sumaPrecioSugerido(this.value, ".$i." )",  'name'=>'PrecioSugerido'.$i)), 'labelOptions'=>array('label'=>false)));
                            ?>
                        </div>
                        <div class="col-xs-1" style="padding: 8px;">
                            <?php
                            $servicioImpuesto->id_unidad_medida = $ItemsCount->id_unidad_medida;
                            $data = CHtml::listData(UnidadMedida::model()->findAll(array()), 'id_unidad_medida', 'unidad_medida');
                            echo $form->dropDownListGroup($servicioImpuesto,'id_unidad_medida',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'name'=>'AddItemsImpuestoUnidadMedida'.$i), 'data'=>$data), 'labelOptions'=>array('label'=>false))); ?>
                        </div>
                        <div class="col-xs-1" style="padding: 8px;">
                            <?php
                            $servicioImpuesto->id_tipo_cobro = $ItemsCount->id_tipo_cobro;
                            $data = CHtml::listData(TipoCobro::model()->findAll(array()), 'id_tipo_cobro', 'tipo_cobro');
                            echo $form->dropDownListGroup($servicioImpuesto,'id_tipo_cobro',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'name'=>'AddItemsImpuestoTipoCobro'.$i), 'data'=>$data), 'labelOptions'=>array('label'=>false))); ?>
                        </div>
                    
                        
                        <div class="col-xs-1" style="padding: 8px;">
                            <?php
                            $servicioImpuesto->kg_c = $ItemsCount->kg_c;
                            $data = CHtml::listData(CalculoPeso::model()->findAll(array()), 'id_calculo_peso', 'calculo_peso');
                            echo $form->dropDownListGroup($servicioImpuesto,'kg_c',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'name'=>'AddItemsKg_c'.$i), 'data'=>$data), 'labelOptions'=>array('label'=>false))); ?>
                        </div>
                        <div class="col-xs-1" style="padding: 8px;">
                            <?php
                            $servicioImpuesto->lb_c = $ItemsCount->lb_c;
                            $data = CHtml::listData(CalculoPeso::model()->findAll(array()), 'id_calculo_peso', 'calculo_peso');
                            echo $form->dropDownListGroup($servicioImpuesto,'lb_c',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'name'=>'AddItemsLb_c'.$i), 'data'=>$data), 'labelOptions'=>array('label'=>false))); ?>
                        </div>
                    
                    
                        <div class="col-xs-1" style="padding: 8px;">
                            <?php
                            $servicioImpuesto->id_calculo_a = $ItemsCount->id_calculo_a;
                            $data = CHtml::listData(CalculoA::model()->findAll(array()), 'id_calculo_a', 'calculo_a');
                            echo $form->dropDownListGroup($servicioImpuesto,'id_calculo_a',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'name'=>'AddItemsCalculo_a'.$i), 'data'=>$data), 'labelOptions'=>array('label'=>false))); ?>
                        </div>
                        <div class="col-xs-1" style="padding: 8px;">
                            <center>
                                <a class="delete" data-original-title="Borrar" title="" data-toggle="tooltip" href="javascript:removeParticipante(<?php echo $i; ?>)">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                            </center>
                        </div>
                    </div>
                                <?php
                                $i++;
                                $countRowParticipante++;
                            }
                        }
                    }else{
                      ?>
                     </div>
                      <?php

                    }
                    ?>
                </div>
                <input id="countRowParticipante" type="hidden" id="countRowParticipante" name="countRowParticipante" value="<?php echo $countRowParticipante; ?>" />
                <input id="nextRowParticipante" type="hidden" name="nextRowParticipante" value="<?php echo $count; ?>" />
                <div class="row" style="text-align: center;">
                    <div class="col-xs-12">
                        <?php $this->widget('booster.widgets.TbButton', array(
                          'label'=>'Agregar Gasto',
                          'icon'=>'plus-sign',
                          'htmlOptions'=>array('id'=>'btn-form','onclick'=>'addNewParticipante()')
                        )); ?>
                    </div>
                </div>
                <br>
          </div>
        </div>
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

<script>
function addNewParticipante() {

    if ($('#countRowParticipante').val()==0) {
//      $('#table-participante').append('<div id="removeParticipante'+$('#nextRowParticipante').val()+'" class="row" style="border-top: 1px solid #ddd;"><div class="col-xs-3" style="padding: 8px;"><select onchange="" id="itemsCategoria'+$('#nextRowParticipante').val()+'" class="span5 form-control" name="AddItemsCategoria'+$('#nextRowParticipante').val()+'"><?php echo $options; ?></select></div><div class="col-xs-3" style="padding: 8px;"><input type="text" class="span5 form-control" name="CategoriaItemCalificacion_rango_min'+$('#nextRowParticipante').val()+'"  id="CategoriaItemCalificacion_rango_min'+$('#nextRowParticipante').val()+'" onkeypress="return soloNumeros(event)"  value="" placeholder="0.0" maxlength="3" /></div><div class="col-xs-3" style="padding: 8px;"><input class="span5 ui-autocomplete-input form-control" type="text" name="ImpuestoCosto'+$('#nextRowParticipante').val()+'" id="ImpuestoCosto'+$('#nextRowParticipante').val()+'" onkeypress="return soloNumeros(event)"  placeholder="0.0" ></div><div class="col-xs-2" style="padding: 8px;"><a class="delete" href="javascript:removeParticipante('+$('#nextRowParticipante').val()+')" data-toggle="tooltip" title="" data-original-title="Borrar"><i class="glyphicon glyphicon-trash"></i></a></div></div>');
    }
    <?php

    $impuestos = Impuesto::model()->findAll('estatus = 1');
    $options = '<option value="">Seleccione...</option>';
    foreach($impuestos as $impuesto) {
      $options .= '<option value="'.$impuesto->id_impuesto.'">'.$impuesto->impuesto.'</option>';
    }
    
    $unidadesMedidas = UnidadMedida::model()->findAll('estatus = 1');
    $options2 = '<option value="">Seleccione...</option>';
    foreach($unidadesMedidas as $unidadMedida) {
      $options2 .= '<option value="'.$unidadMedida->id_unidad_medida.'">'.$unidadMedida->unidad_medida.'</option>';
    }
    
    $tiposCobros = TipoCobro::model()->findAll('estatus = 1');
    $options3 = '<option value="">Seleccione...</option>';
    foreach($tiposCobros as $tipoCobro) {
      $options3 .= '<option value="'.$tipoCobro->id_tipo_cobro.'">'.$tipoCobro->tipo_cobro.'</option>';
    }
    
    $CalculosAs = CalculoA::model()->findAll('estatus = 1');
    $options4 = '<option value="">Seleccione...</option>';
    foreach($CalculosAs as $calculoA) {
      $options4 .= '<option value="'.$calculoA->id_calculo_a.'">'.$calculoA->calculo_a.'</option>';
    }
    
    $CalculoPesos = CalculoPeso::model()->findAll('estatus = 1');
    $options5 = '<option value="">Seleccione...</option>';
    foreach($CalculoPesos as $CalculoPeso) {
      $options5 .= '<option value="'.$CalculoPeso->id_calculo_peso.'">'.$CalculoPeso->calculo_peso.'</option>';
    }
    
    ?>
    $('#table-participante').append(
       '<div id="removeParticipante'+$('#nextRowParticipante').val()+'" class="row" style="border-top: 1px solid #ddd;">\
            <div class="col-xs-2" style="padding: 8px;">\
                <select onchange="" id="itemsImpuesto'+$('#nextRowParticipante').val()+'" class="span5 form-control" name="AddItemsImpuesto'+$('#nextRowParticipante').val()+'"><?php echo $options; ?></select>\
            </div>\
            <div class="col-xs-2" style="padding: 8px;">\n\
                <input onKeyup="sumaPrecioNeto(this.value, '+$('#nextRowParticipante').val()+')" onkeypress="return NumCheck(event, this)" class="span5 ui-autocomplete-input form-control"  type="text" name="ImpuestoCosto'+$('#nextRowParticipante').val()+'" id="ImpuestoCosto'+$('#nextRowParticipante').val()+'"  placeholder="0.0" maxlength="9" >\n\
            </div>  \n\
            <div class="col-xs-2" style="padding: 8px;">\
                <input onKeyup="sumaPrecioSugerido(this.value, '+$('#nextRowParticipante').val()+')" onkeypress="return NumCheck(event, this)" class="span5 ui-autocomplete-input form-control" type="text" class="span5 form-control" name="PrecioSugerido'+$('#nextRowParticipante').val()+'"  id="PrecioSugerido'+$('#nextRowParticipante').val()+'"   value="" placeholder="0.0" maxlength="9" />\
            </div>\n\
            <div class="col-xs-1" style="padding: 8px;">\n\
                <select onchange="" id="itemsImpuestoUnidadMedida'+$('#nextRowParticipante').val()+'" class="span5 form-control" name="AddItemsImpuestoUnidadMedida'+$('#nextRowParticipante').val()+'"><?php echo $options2; ?></select>\n\
            </div>\n\
            <div class="col-xs-1" style="padding: 8px;">\n\
                <select onchange="" id="itemsImpuestoTipoCobro'+$('#nextRowParticipante').val()+'" class="span5 form-control" name="AddItemsImpuestoTipoCobro'+$('#nextRowParticipante').val()+'"><?php echo $options3; ?></select>\n\
            </div>\n\
            <div class="col-xs-1" style="padding: 8px;">\n\
                <select id="itemsKg_c'+$('#nextRowParticipante').val()+'" class="span5 form-control" name="AddItemsKg_c'+$('#nextRowParticipante').val()+'"><?php echo $options5; ?></select>\n\
            </div>\n\
            <div class="col-xs-1" style="padding: 8px;">\n\
                <select id="itemsLb_c'+$('#nextRowParticipante').val()+'" class="span5 form-control" name="AddItemsLb_c'+$('#nextRowParticipante').val()+'"><?php echo $options5; ?></select>\n\
            </div>\n\
            <div class="col-xs-1" style="padding: 8px;">\n\
                <select onchange="" id="Calculo_a'+$('#nextRowParticipante').val()+'" class="span5 form-control" name="AddItemsCalculo_a'+$('#nextRowParticipante').val()+'"><?php echo $options4; ?></select>\n\
            </div>\n\
            <div class="col-xs-1" style="padding: 8px;">\n\
                <center>\n\
                    <a class="delete" href="javascript:removeParticipante('+$('#nextRowParticipante').val()+')" data-toggle="tooltip" title="" data-original-title="Borrar"><i class="glyphicon glyphicon-trash"></i></a>\n\
                </center>\n\
            </div>\n\
        </div>'  
     );
    $('#nextRowParticipante').val(parseInt($('#nextRowParticipante').val())+1);
    $('#countRowParticipante').val(parseInt($('#countRowParticipante').val())+1);
}

function sumaPrecioSugerido(valor, items){

        var count = $('#countRowParticipante').val();
            count = parseInt(count)*parseInt(2);
        var sumaImpuesto = 0;
        for (var i= 0; i <= count; i++) {
            var precioSugerido = $('#PrecioSugerido'+i).val();
            
            if(precioSugerido === undefined){
                
            }else{
                if(precioSugerido || precioSugerido != ""){
                    sumaImpuesto = parseFloat(sumaImpuesto) + parseFloat(precioSugerido);

                }
            }
        }
        $('#Servicio_precio_sugerido').val(sumaImpuesto.toFixed(2));
        calculoPorcentajeGanancia();
}

function sumaPrecioNeto(valor, items){

        var count = $('#countRowParticipante').val();
            count = parseInt(count)*parseInt(2);
        var sumaImpuesto = 0;
        for (var i= 0; i <= count; i++) {
            var precioSugerido = $('#ImpuestoCosto'+i).val();
            
            if(precioSugerido === undefined){
                
            }else{
                if(precioSugerido || precioSugerido != ""){
                    sumaImpuesto = parseFloat(sumaImpuesto) + parseFloat(precioSugerido);

                }
            }
        }
        $('#Servicio_precio_neto').val(sumaImpuesto.toFixed(2));
//        calculoPorcentajeGanancia();
}

function removeParticipante(id) {
  var valorRestar = $('#ImpuestoCosto'+id).val();
  var gastoOperativo = $('#Servicio_gasto_operativo').val();
  gastoOperativo = parseFloat(gastoOperativo) - parseFloat(valorRestar);
  if(confirm('¿Está seguro que desea borrar este elemento?')) {
    $('#removeParticipante'+id).remove();
    $('#Servicio_gasto_operativo').val(gastoOperativo.toFixed(2));
    $('#countRowParticipante').val(parseInt($('#countRowParticipante').val())-1);
    sumaPrecioNeto();
    sumaPrecioSugerido();
    calculoPorcentajeGanancia();
    if ($('#countRowParticipante').val()==0) {
//      $('#head-table-participante').remove();
    }
  }
  
}    

function gastoOperativo(valor){
    var campo = valor;
    if(campo === ''){
        $('#Servicio_gasto_operativo').val('');
    }else{
        var count = $('#countRowParticipante').val();
        var sumaImpuesto = 0;
        for (var i= 0; i < count; i++) {
            var precioImpuesto = $('#ImpuestoCosto'+i).val();
            if(precioImpuesto){
                sumaImpuesto = parseFloat(sumaImpuesto) + parseFloat(precioImpuesto);
            }
    //            sumaImpuesto = parseFloat(sumaImpuesto) + parseFloat($('#ImpuestoCosto'+i).val());
        }
    //        alert(sumaImpuesto);
        sumaImpuesto = parseFloat(sumaImpuesto) + parseFloat(valor);
        $('#Servicio_gasto_operativo').val(sumaImpuesto.toFixed(2));
        calculoPorcentajeGanancia();
    }
}

function calculoGastoOperativo(valor, items){
    var campo = valor;
    if(campo === ''){
        $('#Servicio_gasto_operativo').val('');
    }else{
        if(valor){

            var precioNeto = $('#Servicio_precio_neto').val();
            var gastoOperativo = $('#Servicio_gasto_operativo').val();
            var porcentajeActual = (parseFloat(precioNeto)*parseFloat(valor))/parseFloat(100);
            var valorActual = parseFloat(gastoOperativo) + parseFloat(porcentajeActual);
    //        $('#Servicio_gasto_operativo').val(valorActual);
    
//            $('#ImpuestoCosto'+items).val(porcentajeActual.toFixed(2));
            
            
            var count = $('#countRowParticipante').val();
            var sumaImpuesto = 0;
            for (var i= 0; i < count; i++) {
                var precioImpuesto = $('#ImpuestoCosto'+i).val();
                if(precioImpuesto){
                    sumaImpuesto = parseFloat(sumaImpuesto) + parseFloat(precioImpuesto);
                }
    //            sumaImpuesto = parseFloat(sumaImpuesto) + parseFloat($('#ImpuestoCosto'+i).val());
            }
    //        alert(sumaImpuesto);
            sumaImpuesto = parseFloat(sumaImpuesto) + parseFloat(precioNeto);
            $('#Servicio_gasto_operativo').val(sumaImpuesto.toFixed(2));


            calculoPorcentajeGanancia();
        }
    }
}

function calculoGastoOperativoMonto(valor, items){
    
//    var campo = valor;
//    var precioNeto = parseFloat($('#Servicio_precio_neto').val());
//    if(campo === ''){
//        $('#Servicio_gasto_operativo').val('');
//        $('#ProcentajeImpuesto'+items).val('');
//    }else{
//        if(valor){
////            if(precioNeto != "" || precioNeto != 0.00){
//                var precioNeto = $('#Servicio_precio_neto').val();
//                var porcentajeGasto = (parseFloat(valor)*parseFloat(100))/parseFloat(precioNeto);
//                if(porcentajeGasto >=0){
//                    $('#ProcentajeImpuesto'+items).val(porcentajeGasto.toFixed(2));
//                    calculoGastoOperativo(porcentajeGasto.toFixed(2), items);
//                }
////            }else{
////                alert('Debe ingresar un valor al precio neto');
////                $('#Servicio_precio_neto').focus(); 
////            }
//        }
//    }
    
}
function calculoPorcentajeGanancia(valor){
    valor = parseFloat($('#Servicio_precio_sugerido').val());
    var gastoOperativo = $('#Servicio_precio_neto').val();
    if(gastoOperativo === '' || parseFloat(gastoOperativo) == 0.00){
        alert("Debe ingresar gastos");
        $('#Servicio_precio_sugerido').val('0.00');
    }else{
        var campo = $('#Servicio_precio_sugerido').val();
        if(campo === ''){
        }else{
            if(valor || valor != 0.00){

                var porcentajeGanancia = (parseFloat(valor)*parseFloat(100))/parseFloat(gastoOperativo);
                porcentajeGanancia = parseFloat(porcentajeGanancia) - parseFloat(100);
                $('#Servicio_porcentaje_ganacia').val(porcentajeGanancia.toFixed(2));
            }else{
               $('#Servicio_porcentaje_ganacia').val('0.00'); 
            }
        }
    }
}

function NumCheck(e, field) {
  key = e.keyCode ? e.keyCode : e.which
  if (key == 8) return true
  if (key > 47 && key < 58) {
    if (field.value == "") return true
    regexp = /.[0-9]{4}$/
    return !(regexp.test(field.value))
  }
  if (key == 46) {
    if (field.value == "") return false
    regexp = /^[0-9]+$/
    return regexp.test(field.value)
  }
  return false
}

</script>