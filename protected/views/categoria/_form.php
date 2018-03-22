<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'categoria-form',
	'enableAjaxValidation'=>false,
)); ?>


<p class="alert alert-warning"><?php echo __('The required fields contain <span class="required">*</span>'); ?>.</p>

<?php echo $form->errorSummary($model); ?>
<div class="row">
    <div class="col-sm-12 col-md-3">
        <?php //echo $form->textFieldGroup($model,'id_bloque',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
        <?php $data = CHtml::listData(Bloque::model()->findAll(), 'id_bloque', 'bloque');
        echo $form->dropDownListGroup($model,'id_bloque',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array('0'=>__('Select...'))+$data))); ?>
    </div>
    <div class="col-sm-12 col-md-3">
        <?php //echo $form->textFieldGroup($model,'id_tipo_categoria',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
        <?php $data = CHtml::listData(TipoCategoria::model()->findAll(), 'id_tipo_categoria', 'tipo');
        echo $form->dropDownListGroup($model,'id_tipo_categoria',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data'=>array('0'=>__('Select...'))+$data))); ?>
    </div>
    <div class="col-sm-12 col-md-3">
        <?php echo $form->textFieldGroup($model,'categoria',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250)))); ?>
    </div>
    <div class="col-sm-12 col-md-3">
        <?php echo $form->dropDownListGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'), 'data' => array('1' => 'Active', '0'=>'Inactive' ),))); ?>
    </div>
</div>
	
<div class="row">
    <div class="col-sm-12 col-md-3">
        <?php echo $form->textFieldGroup($model,'edad_min',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onKeyPress'=>"return soloNumeros(event)",'maxlength'=>2)))); ?>
    </div>
    <div class="col-sm-12 col-md-3">
     	<?php echo $form->textFieldGroup($model,'edad_max',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onKeyPress'=>"return soloNumeros(event)",'maxlength'=>2)))); ?>
    </div>
    <div class="col-sm-12 col-md-3">
    	<?php echo $form->textFieldGroup($model,'competidor_min',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onKeyPress'=>"return soloNumeros(event)",'maxlength'=>2)))); ?>
    </div>
    <div class="col-sm-12 col-md-3">
        <?php echo $form->textFieldGroup($model,'competidor_max',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onKeyPress'=>"return soloNumeros(event)",'maxlength'=>2)))); ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12">
        <?php echo $form->textAreaGroup($model,'descripcion', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
    </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading"><span class="glyphicon glyphicon-indent-right" aria-hidden="true"></span>&nbsp;<?php echo __('Qualification Items'); ?></div>
    <div class="pd-inner">
            <div id="table-participante" style="padding: 0 20px 20px 20px;">
                <div class="row" id="head-table-participante">
                  <div class="col-xs-3" style="padding: 8px;"><center><strong><?php echo __('Items'); ?></strong></center></div>
                  <div class="col-xs-3" style="padding: 8px;"><center><strong><?php echo __('Minimum Range'); ?></strong></center></div>
                  <div class="col-xs-3" style="padding: 8px;"><center><strong><?php echo __('Maximum Range'); ?></strong></center></div>
                  <div class="col-xs-3" style="padding: 8px;"><strong><?php echo __('Action'); ?></strong></div>
                </div>
                <?php
                $count = 0;
                $countRowParticipante = 0;
                if (!$model->isNewRecord){
                    $countRowParticipante = 1;
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
                    }
                }else{
                  ?>
                 </div>
                  <?php
                    
                }
                ?>
            </div>
            <input id="countRowParticipante" type="hidden" name="countRowParticipante" value="<?php echo $countRowParticipante; ?>" />
            <input id="nextRowParticipante" type="hidden" name="nextRowParticipante" value="<?php echo $count; ?>" />
            <div class="row" style="text-align: center;">
                <div class="col-xs-12">
                    <?php $this->widget('booster.widgets.TbButton', array(
                      'label'=>__('Add items'),
                      'icon'=>'plus-sign',
                      'htmlOptions'=>array('id'=>'btn-form','onclick'=>'addNewParticipante()')
                    )); ?>
                </div>
            </div>
        
    </div>
</div>



	

	

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? __('Create') : __('Update'),
		)); ?>
</div>

<?php $this->endWidget(); ?>

<script>
function soloNumeros(e)
{
    var key = window.Event ? e.which : e.keyCode
    return ((key >= 48 && key <= 57) || (key==8))
}    

function addNewParticipante() {

    if ($('#countRowParticipante').val()==0) {
//      $('#table-participante').append('<div id="removeParticipante'+$('#nextRowParticipante').val()+'" class="row" style="border-top: 1px solid #ddd;"><div class="col-xs-3" style="padding: 8px;"><select onchange="" id="itemsCategoria'+$('#nextRowParticipante').val()+'" class="span5 form-control" name="AddItemsCategoria'+$('#nextRowParticipante').val()+'"><?php echo $options; ?></select></div><div class="col-xs-3" style="padding: 8px;"><input type="text" class="span5 form-control" name="CategoriaItemCalificacion_rango_min'+$('#nextRowParticipante').val()+'"  id="CategoriaItemCalificacion_rango_min'+$('#nextRowParticipante').val()+'" onkeypress="return soloNumeros(event)"  value="" placeholder="0.0" maxlength="3" /></div><div class="col-xs-3" style="padding: 8px;"><input class="span5 ui-autocomplete-input form-control" type="text" name="CategoriaItemCalificacion_rango_max'+$('#nextRowParticipante').val()+'" id="CategoriaItemCalificacion_rango_max'+$('#nextRowParticipante').val()+'" onkeypress="return soloNumeros(event)"  placeholder="0.0" ></div><div class="col-xs-2" style="padding: 8px;"><a class="delete" href="javascript:removeParticipante('+$('#nextRowParticipante').val()+')" data-toggle="tooltip" title="" data-original-title="Borrar"><i class="glyphicon glyphicon-trash"></i></a></div></div>');
    }
    <?php

    $itemsCalificaciones = ItemCalificacion::model()->findAll('estatus = 1');
    $options = '<option value="">'.__('Select...').'</option>';
    foreach($itemsCalificaciones as $itemsCalificacion) {
      $options .= '<option value="'.$itemsCalificacion->id_item_calificacion.'">'.$itemsCalificacion->item_calificacion.'</option>';
    } 
    ?>
    $('#table-participante').append(
       '<div id="removeParticipante'+$('#nextRowParticipante').val()+'" class="row" style="border-top: 1px solid #ddd;"><div class="col-xs-3" style="padding: 8px;"><select onchange="" id="itemsCategoria'+$('#nextRowParticipante').val()+'" class="span5 form-control" name="AddItemsCategoria'+$('#nextRowParticipante').val()+'"><?php echo $options; ?></select></div><div class="col-xs-3" style="padding: 8px;"><input type="text" class="span5 form-control" name="CategoriaItemCalificacion_rango_min'+$('#nextRowParticipante').val()+'"  id="CategoriaItemCalificacion_rango_min'+$('#nextRowParticipante').val()+'" onkeyup="miles_decimales(this,this.value.charAt(this.value.length-1),\'decimales\')"  value="" placeholder="0.0" maxlength="4" /></div><div class="col-xs-3" style="padding: 8px;"><input class="span5 ui-autocomplete-input form-control" type="text" name="CategoriaItemCalificacion_rango_max'+$('#nextRowParticipante').val()+'" id="CategoriaItemCalificacion_rango_max'+$('#nextRowParticipante').val()+'"  onkeyup="miles_decimales(this,this.value.charAt(this.value.length-1),\'decimales\')"  placeholder="0.0" maxlength="4" ></div><div class="col-xs-2" style="padding: 8px;"><a class="delete" href="javascript:removeParticipante('+$('#nextRowParticipante').val()+')" data-toggle="tooltip" title="" data-original-title="Borrar"><i class="glyphicon glyphicon-trash"></i></a></div></div>'  
     );
    $('#nextRowParticipante').val(parseFloat($('#nextRowParticipante').val())+1);
    $('#countRowParticipante').val(parseFloat($('#countRowParticipante').val())+1);
}

function removeParticipante(id) {
  
  if(confirm('Are you sure you want to delete this element?')) {
    $('#removeParticipante'+id).remove();
    $('#countRowParticipante').val(parseFloat($('#countRowParticipante').val())-1);
    if ($('#countRowParticipante').val()==0) {
//      $('#head-table-participante').remove();
    }
  }
  
}

function miles_decimales(donde,caracter,campo,porcentaje, cantidadNumeroEntero, cantidadDecimales){

//  if(!cantidadDecimales){
      cantidadDecimales = 1;
//  }
//  if(!cantidadNumeroEntero){
      cantidadNumeroEntero = 2;
//  }
  var decimales = true;
  dec= cantidadDecimales;

  pat = /[\*,\+,\(,\),\?,\\,\$,\[,\],\^]/
  valor = donde.value
  largo = valor.length
  crtr = true
  if(isNaN(caracter) || pat.test(caracter) == true){
      if (pat.test(caracter)==true) 
              {caracter = "\\" + caracter}
      carcter = new RegExp(caracter,"g")
      valor = valor.replace(carcter,"")
      donde.value = valor
      crtr = false
  }else{
      var nums = new Array()
      cont = 0
      for(m=0;m<largo;m++){
          if(valor.charAt(m) == "." || valor.charAt(m) == " " || valor.charAt(m) == ","){
            continue;
          }else{
            nums[cont] = valor.charAt(m)
            cont++
          }
      }
  }

  if(decimales == true) {
    ctdd = eval(1 + dec);
    nmrs = cantidadNumeroEntero
  }else {
    ctdd = 1; nmrs = 3
  }
  var cad1="",cad2="",cad3="",tres=0
  if(largo > nmrs && crtr == true){
    for (k=nums.length-ctdd;k>=0;k--){
      cad1 = nums[k]
      cad2 = cad1 + cad2
      tres++
      if((tres%3) == 0){
          if(k!=0){
            //cad2 = "." + cad2 // agregar punto de miles
          }
      }
  }

    for (dd = dec; dd > 0; dd--){
      cad3 += nums[nums.length-dd] 
    }
    if(decimales == true){
      cad2 += "." + cad3
    }
    donde.value = cad2
  }
  donde.focus()
  
//  if(porcentaje === 999){
//    var porcentajeAfinazar = $("#Afianzamiento_porcentaje_afianzar").val();
//    //if (porcentajeAfinazar < 20){
//    var montoProyecto = $("#Afianzamiento_monto_proyectado").val();
//    var montoAfianzar = parseFloat(parseFloat(montoProyecto) * parseFloat(porcentajeAfinazar) / 100).toFixed(2);
//    var montoMaximoAfianzar = <?php if($montoMaximoAfinzarSociedadRegistradora){ echo $montoMaximoAfinzarSociedadRegistradora; }else{ echo "Null"; } ?>;
//    if(!isNaN(montoAfianzar)){
//      if (montoAfianzar<montoMaximoAfianzar){
//        $('#Afianzamiento_monto_fianza').val(montoAfianzar);
//      }else{
//        $('#Afianzamiento_monto_fianza').val('0');
//        $("#Afianzamiento_porcentaje_afianzar").val('');
//        alert("Monto de afianza ="+montoAfianzar+" Monto maximo a afianzar ="+montoMaximoAfianzar+"\nPor lo cual el monto calculado a afianzar excede el monto disponible del patrimonio para tal operación");
//      }
//    }else{
//        $('#Afianzamiento_monto_fianza').val('0');
//    }
//    deduccionFianza();
//    //}else{
//      //alert('Esta tratando de afianzar un ')
//    //}
//  }  
  
//  if (porcentaje === 998){
//    var montoFianza = $("#Afianzamiento_monto_fianza").val();
//    var porcentajeComision = $("#Afianzamiento_porcentaje_comision").val();
//    var montoComision = parseFloat(parseFloat(montoFianza) * parseFloat(porcentajeComision) / 100).toFixed(2);
//    if(montoComision){
//      $('#Afianzamiento_monto_comision').val(montoComision);
//    }else{
//      $('#Afianzamiento_monto_comision').val('0');
//    }
//  }
  
  
}

</script>

