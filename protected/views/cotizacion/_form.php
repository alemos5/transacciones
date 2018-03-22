<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'cotizacion-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>
<div class="row">
<div class="col-sm-12 col-md-12">
    <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp;&nbsp;Servicios a Cotizar</div>
      <div class="pd-inner">
            <div id="table-participante" style="padding: 0 20px 20px 20px;">
                <div class="row" id="head-table-participante">
                  <div class="col-xs-2" style="padding: 8px;"><center><strong>Empresa</strong></center></div>
                  <div class="col-xs-2" style="padding: 8px;"><center><strong>Servicio</strong></center></div>
                  <div class="col-xs-2" style="padding: 8px;"><center><strong>Precio Sugerido</strong></center></div>
                  <div class="col-xs-1" style="padding: 8px;"><center><strong>Peso Kg</strong></center></div>
                  <div class="col-xs-1" style="padding: 8px;"><center><strong>Peso Lb</strong></center></div>
                  <div class="col-xs-1" style="padding: 8px;"><center><strong>Cantidad</strong></center></div>
                  <div class="col-xs-2" style="padding: 8px;"><center><strong>Sub-Total</strong></center></div>
                  <div class="col-xs-1" style="padding: 8px;"><center><strong>Acción</strong></center></div>
                </div>
                <?php
                $count = 0;
                $countRowParticipante = 0;
                if (!$model->isNewRecord){
                    $countRowParticipante = 1;
                    $i = 0;
                    if(isset($cotizacionDetalle)){
                        $count = count($cotizacionDetalle);
                        foreach($cotizacionDetalle as $ItemsCount){
                            ?>
                 <div id="removeParticipante<?php echo $i;?>" class="row"  style="border-top: 1px solid #ddd;">
                <!--<div class="row">-->
                    <div class="col-xs-2" style="padding: 8px;">
                        <?php
                        $cotizacionForm->id_empresa = $ItemsCount->id_empresa;
                        $data = CHtml::listData(Empresa::model()->findAll(array()), 'id_empresa', 'empresa');
                        echo $form->dropDownListGroup($cotizacionForm,'id_empresa',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'name'=>'AddItemsImpuestoEmpresa'.$i, 'onchange'=>"findServicio(this.value, ".$i.")"), 'data'=>$data), 'labelOptions'=>array('label'=>false))); ?>
                    </div>
                    <div class="col-xs-2" style="padding: 8px;">
                        <?php
                        $cotizacionForm->id_servicio = $ItemsCount->id_servicio;
                        $data = CHtml::listData(Servicio::model()->findAll(array()), 'id_servicio', 'servicio');
                        echo $form->dropDownListGroup($cotizacionForm,'id_servicio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'onchange'=>'mostrarPrecio(this.value, '.$i.')' ,'name'=>'idServicio'.$i), 'data'=>$data), 'labelOptions'=>array('label'=>false))); ?>
                        <div style=" display: none;" class="alert alert-info"><div id="Servicio<?php echo $i; ?>"></div></div>
                    </div>
                    <div class="col-xs-2" style="padding: 8px;">
                        <?php
                        $cotizacionForm->precio_unitario = $ItemsCount->precio_unitario;
                        echo $form->textFieldGroup($cotizacionForm, 'precio_unitario', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 5,  'disabled'=>"disabled", 'name'=>'PrecioSugerido'.$i)), 'labelOptions'=>array('label'=>false)));
                        ?>
                    </div>
                
                
                    <div class="col-xs-1" style="padding: 8px;">
                        <?php
                        $cotizacionForm->peso_kilo = $ItemsCount->peso_kilo;
                        echo $form->textFieldGroup($cotizacionForm, 'peso_kilo', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'disabled'=>"disabled", 'maxlength' => 9, 'name'=>'PrecioKg'.$i )), 'labelOptions'=>array('label'=>false)));
                        ?>
                    </div>
                    <div class="col-xs-1" style="padding: 8px;">
                        <?php
                        $cotizacionForm->peso_libra = $ItemsCount->peso_libra;
                        echo $form->textFieldGroup($cotizacionForm, 'peso_libra', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 9, 'name'=>'PrecioLb'.$i )), 'labelOptions'=>array('label'=>false)));
                        ?>
                    </div>
                
                
                    <div class="col-xs-1" style="padding: 8px;">
                        <?php
                        $cotizacionForm->cant_servicio = $ItemsCount->cant_servicio;
                        echo $form->textFieldGroup($cotizacionForm, 'cant_servicio', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 3, 'onkeypress'=>"return soloNumeros(event)", 'onkeyup'=>'calcularTotal(this.value, '.$i.' )', 'name'=>'CantidadCotizar'.$i )), 'labelOptions'=>array('label'=>false)));
                        ?>
                    </div>
                    <div class="col-xs-2" style="padding: 8px;">
                        <?php
                        $cotizacionForm->precio_total = $ItemsCount->precio_total;
                        echo $form->textFieldGroup($cotizacionForm, 'precio_total', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 3, 'name'=>'TotalCotizar'.$i ,  'disabled'=>"disabled")), 'labelOptions'=>array('label'=>false)));
                        ?>
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
                      'label'=>'Agregar servicio',
                      'icon'=>'plus-sign',
                      'htmlOptions'=>array('id'=>'btn-form','onclick'=>'addNewParticipante()')
                    )); ?>
                </div>
            </div>
            <br>
            <div style="text-align:right;" class="panel-footer">
                <div >
                    Impuesto (<label id="ImpuestoCalucular">0</label>%) : <label id="IpuestoMontoCalucular">0</label>
                </div>
            </div>
            <div style="text-align:right;"  class="panel-footer">
                <div >
                    Total: <label id="TotalMontoCalucular">0</label>
                </div>
            </div>
      </div>
    </div>
</div>
</div>
<?php echo $form->errorSummary($model); ?>

        <?php echo $form->hiddenField($model,'n_cotizacion',array('type'=>"hidden", 'value'=>date('Y-m-d'))); ?>
	<?php //echo $form->textFieldGroup($model,'n_cotizacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250)))); ?>

	<?php /*echo $form->textFieldGroup($model,'id_usuario_cotizacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'id_usuario_registro',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'id_usuario_modificacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'fecha_registro',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'id_estatus_cotizacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5'))));*/ ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
		)); ?>
</div>

<?php $this->endWidget(); ?>

<script>
function kgCalculo(lb, items){
    
    var kg = lb;
    if(lb || lb != ""){
        kg =  parseFloat(lb)/parseFloat(2.2046);
        $('#PrecioKg'+items).val(kg.toFixed(2));
        tablaGasto('', items, 1);
    }else{
        $('#PrecioKg'+items).val('0.00');
        tablaGasto('', items, 0);
    }
    
    
}    
    
    
function calculoFinal(){
    var count = $('#countRowParticipante').val();
    var sumaTotal = 0;
    var sumaTotalImpuesto = 0;
    var impuesto = 0;
    for (var i= 0; i < count; i++) {
        var precioTotal = $('#TotalCotizar'+i).val();
        if(precioTotal){
            sumaTotal = parseFloat(sumaTotal) + parseFloat(precioTotal);
        }
    }
    if(parseFloat(sumaTotal) > parseFloat(200.00)){
        impuesto = 19;
    }else{
        impuesto = 10;
    }
    if(parseFloat(sumaTotal) >= 0 || parseFloat(sumaTotal) != 0.00){
        $('#ImpuestoCalucular').html(impuesto.toFixed(2));
        sumaTotalImpuesto = (parseFloat(sumaTotal)* parseFloat(impuesto))/parseFloat(100);
        $('#IpuestoMontoCalucular').html(sumaTotalImpuesto.toFixed(2));
        $('#TotalMontoCalucular').html((parseFloat(sumaTotal)+parseFloat(sumaTotalImpuesto)));
    }else{
        $('#ImpuestoCalucular').html('0');
        $('#IpuestoMontoCalucular').html('');
        $('#TotalMontoCalucular').html('');
    }
}    
    
function findServicio(id_empresa, items){
    $.post("<?php echo Yii::app()->createUrl('empresa/findServicio') ?>",{ id_empresa:id_empresa },
    function(data){
        $('#idServicio'+items).html(data);
    });
}     
    
    
function mostrarPrecio(id_servicio, items){
//    mostrarServicio(id_servicio, items);
    $.post("<?php echo Yii::app()->createUrl('servicio/findServicioCotizacion') ?>",{ id_servicio:id_servicio },
    function(data){
        $('#PrecioSugerido'+items).val(data);
        calcularTotal($('#CantidadCotizar'+items).val(), items);
        tablaGasto(id_servicio, items, 0);
    });
    
    $.post("<?php echo Yii::app()->createUrl('servicio/findServicioDatos') ?>",{ id_servicio:id_servicio },
    function(data){
        $('#Servicio'+items).html(data);
    });
}    
    
function mostrarServicio(id_servicio, items){
    $.post("<?php echo Yii::app()->createUrl('servicio/findServicioDatos') ?>",{ id_servicio:id_servicio },
    function(data){
        $('#Servicio'+items).html(data);
    });
}
 
function addNewParticipante() {

    if ($('#countRowParticipante').val()==0) {
//      $('#table-participante').append('<div id="removeParticipante'+$('#nextRowParticipante').val()+'" class="row" style="border-top: 1px solid #ddd;"><div class="col-xs-3" style="padding: 8px;"><select onchange="" id="itemsCategoria'+$('#nextRowParticipante').val()+'" class="span5 form-control" name="AddItemsCategoria'+$('#nextRowParticipante').val()+'"><?php echo $options; ?></select></div><div class="col-xs-3" style="padding: 8px;"><input type="text" class="span5 form-control" name="CategoriaItemCalificacion_rango_min'+$('#nextRowParticipante').val()+'"  id="CategoriaItemCalificacion_rango_min'+$('#nextRowParticipante').val()+'" onkeypress="return soloNumeros(event)"  value="" placeholder="0.0" maxlength="3" /></div><div class="col-xs-3" style="padding: 8px;"><input class="span5 ui-autocomplete-input form-control" type="text" name="ImpuestoCosto'+$('#nextRowParticipante').val()+'" id="ImpuestoCosto'+$('#nextRowParticipante').val()+'" onkeypress="return soloNumeros(event)"  placeholder="0.0" ></div><div class="col-xs-2" style="padding: 8px;"><a class="delete" href="javascript:removeParticipante('+$('#nextRowParticipante').val()+')" data-toggle="tooltip" title="" data-original-title="Borrar"><i class="glyphicon glyphicon-trash"></i></a></div></div>');
    }
    <?php

//    $servicios = Servicio::model()->findAll('estatus = 1');
//    $options = '<option value="">Seleccione...</option>';
//    foreach($servicios as $servicio) {
//      $options .= '<option value="'.$servicio->id_servicio.'">'.$servicio->servicio.'</option>';
//    }
    
    $empresas = Empresa::model()->findAll('estatus = 1');
    $options = '<option value="">Seleccione...</option>';
    foreach($empresas as $empresa) {
      $options .= '<option value="'.$empresa->id_empresa.'">'.$empresa->empresa.'</option>';
    }
    /*
     <div class="col-xs-1" style="padding: 8px;"><input class="span5 ui-autocomplete-input form-control" type="text" name="PrecioKg'+$('#nextRowParticipante').val()+'" id="PrecioKg'+$('#nextRowParticipante').val()+'"  placeholder="0" maxlength="9" ></div> \
        <div class="col-xs-1" style="padding: 8px;"><input class="span5 ui-autocomplete-input form-control" type="text" name="PrecioLb'+$('#nextRowParticipante').val()+'" id="PrecioLb'+$('#nextRowParticipante').val()+'"  placeholder="0" maxlength="9" ></div> \
     */
    ?>
    $('#table-participante').append(
       '<div id="removeParticipante'+$('#nextRowParticipante').val()+'" class="row" style="border-top: 1px solid #ddd;">\
        <div class="col-xs-2" style="padding: 8px;"><select onchange="findServicio(this.value, '+$('#nextRowParticipante').val()+')" id="AddItemsImpuestoEmpresa'+$('#nextRowParticipante').val()+'" class="span5 form-control" name="AddItemsImpuestoEmpresa'+$('#nextRowParticipante').val()+'"><?php echo $options; ?></select></div>\
        <div class="col-xs-2" style="padding: 8px;"><select onchange="mostrarPrecio(this.value, '+$('#nextRowParticipante').val()+')" id="idServicio'+$('#nextRowParticipante').val()+'" class="span5 form-control" name="idServicio'+$('#nextRowParticipante').val()+'"><option value="">Seleccione ...</option></select>\
            <div style=" display: none;" class="alert alert-info"><div style=" display: block;" id="Servicio'+$('#nextRowParticipante').val()+'"></div></div></div>\
        <div class="col-xs-2" style="padding: 8px;"><input type="text" class="span5 form-control" name="PrecioSugerido'+$('#nextRowParticipante').val()+'"  id="PrecioSugerido'+$('#nextRowParticipante').val()+'"  disabled="disabled"  value="" placeholder="0.0" maxlength="5" /></div>\
        <div class="col-xs-1" style="padding: 8px;"><input disabled="disabled" class="span5 ui-autocomplete-input form-control" type="text" name="PrecioKg'+$('#nextRowParticipante').val()+'" id="PrecioKg'+$('#nextRowParticipante').val()+'"  placeholder="0" maxlength="9" ></div> \
        <div class="col-xs-1" style="padding: 8px;"><input class="span5 ui-autocomplete-input form-control" type="text" name="PrecioLb'+$('#nextRowParticipante').val()+'" id="PrecioLb'+$('#nextRowParticipante').val()+'" onKeyup="kgCalculo(this.value, '+$('#nextRowParticipante').val()+' )"  placeholder="0" maxlength="9" ></div> \
        <div class="col-xs-1" style="padding: 8px;"><input class="span5 ui-autocomplete-input form-control" onKeyup="calcularTotal(this.value, '+$('#nextRowParticipante').val()+')" onKeyPress="return soloNumeros(event)" type="text" name="CantidadCotizar'+$('#nextRowParticipante').val()+'" id="CantidadCotizar'+$('#nextRowParticipante').val()+'"  placeholder="0" maxlength="3" ></div>\
        <div class="col-xs-2" style="padding: 8px;"><input disabled="disabled" class="span5 ui-autocomplete-input form-control" type="text" name="TotalCotizar'+$('#nextRowParticipante').val()+'" id="TotalCotizar'+$('#nextRowParticipante').val()+'" placeholder="0" maxlength="9" ></div> \
        <div class="col-xs-1" style="padding: 8px;"><center><a class="delete" href="javascript:removeParticipante('+$('#nextRowParticipante').val()+')" data-toggle="tooltip" title="" data-original-title="Borrar"><i class="glyphicon glyphicon-trash"></i></a></center></div></div>\
        <div id="removeDetalle'+$('#nextRowParticipante').val()+'"  class="row">\
            <div class="col-xs-12" style="padding: 8px;">\
             <div class="panel-group">\
                <div class="panel panel-primary">\
                  <div class="panel-heading">\
                    <h4 class="panel-title">\
                      <a data-toggle="collapse" href="#collapse'+$('#nextRowParticipante').val()+'">Detalles</a>\
                    </h4>\
                  </div>\
                  <div id="collapse'+$('#nextRowParticipante').val()+'" class="panel-collapse collapse">\
                    <div class="panel-body">\n\
                        <div id="tablaContenido'+$('#nextRowParticipante').val()+'">\n\
                            <div class="alert alert-danger">Debe seleccionar un Servicio</div>\n\
                        </div>\n\
                    </div>\
                  </div>\
                </div>\
              </div> \
            </div>\
        </div>'  
     );
    $('#nextRowParticipante').val(parseInt($('#nextRowParticipante').val())+1);
    $('#countRowParticipante').val(parseInt($('#countRowParticipante').val())+1);
}

function tablaGasto(id_servicio, items, accion){
    
//    if(plb){
//        
//    }else{
        var peso = $('#PrecioLb'+items).val();
        var cantidad = $('#CantidadCotizar'+items).val();
        id_servicio = $('#idServicio'+items).val();

    if(id_servicio || id_servicio != ""){
        $.post("<?php echo Yii::app()->createUrl('servicio/tablaContenido') ?>",{ id_servicio:id_servicio, accion:accion, peso:peso, cantidad:cantidad, items:items  },
        function(data){
            $('#tablaContenido'+items).html(data);
            $('#TotalCotizar'+items).val($('#CostoTotal'+items).val());
            calculoFinal();
        });
    }else{
        $('#tablaContenido'+items).html('<div class="alert alert-danger">Debe seleccionar un Servicio</div>');
        $('#TotalCotizar'+items).val('0.00');
        calculoFinal();
    }
}

function calcularTotal(cantidad, items){
//    alert(cantidad);
    if(cantidad || cantidad != 0){
        var precioSugerido = $('#PrecioSugerido'+items).val();
        var costoTotal = parseInt(cantidad) * parseFloat(precioSugerido);
//        $('#TotalCotizar'+items).val(costoTotal.toFixed(2));
        tablaGasto('', items, 1);
        calculoFinal();
    }else{
//        $('#TotalCotizar'+items).val('0.00');
        tablaGasto('', items, 0);
    }

}

function soloNumeros(e)
{
    var key = window.Event ? e.which : e.keyCode
    return ((key >= 48 && key <= 57) || (key==8))
}

function removeParticipante(id) {
  var valorRestar = $('#ImpuestoCosto'+id).val();
  var gastoOperativo = $('#Servicio_gasto_operativo').val();
  gastoOperativo = parseFloat(gastoOperativo) - parseFloat(valorRestar);
  if(confirm('¿Está seguro que desea borrar este elemento?')) {
    $('#removeParticipante'+id).remove();
    $('#removeDetalle'+id).remove();
    $('#Servicio_gasto_operativo').val(gastoOperativo.toFixed(2));
    calculoPorcentajeGanancia();
    $('#countRowParticipante').val(parseInt($('#countRowParticipante').val())-1);
    calculoFinal();
    if ($('#countRowParticipante').val()==0) {
//      $('#head-table-participante').remove();
    }
  }
  
}    

function gastoOperativo(valor){
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

function calculoGastoOperativo(valor, items){
    
    if(valor){
       
        var precioNeto = $('#Servicio_precio_neto').val();
        var gastoOperativo = $('#Servicio_gasto_operativo').val();
        var porcentajeActual = (parseFloat(precioNeto)*parseFloat(valor))/parseFloat(100);
        var valorActual = parseFloat(gastoOperativo) + parseFloat(porcentajeActual);
//        $('#Servicio_gasto_operativo').val(valorActual);
        $('#ImpuestoCosto'+items).val(porcentajeActual.toFixed(2));
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
function calculoPorcentajeGanancia(valor){
    valor = parseFloat($('#Servicio_precio_sugerido').val());
    if(valor || valor != 0.00){
        var gastoOperativo = $('#Servicio_gasto_operativo').val();
        var porcentajeGanancia = (parseFloat(valor)*parseFloat(100))/parseFloat(gastoOperativo);
        porcentajeGanancia = parseFloat(porcentajeGanancia) - parseFloat(100);
        $('#Servicio_porcentaje_ganacia').val(porcentajeGanancia.toFixed(2));
    }else{
       $('#Servicio_porcentaje_ganacia').val('0.00'); 
    }
}

function NumCheck(e, field) {
  key = e.keyCode ? e.keyCode : e.which
  if (key == 8) return true
  if (key > 47 && key < 58) {
    if (field.value == "") return true
    regexp = /.[0-9]{2}$/
    return !(regexp.test(field.value))
  }
  if (key == 46) {
    if (field.value == "") return false
    regexp = /^[0-9]+$/
    return regexp.test(field.value)
  }
  return false
}

function miles_decimales(donde,caracter,campo,porcentaje, cantidadNumeroEntero, cantidadDecimales){

  if(!cantidadDecimales){
      cantidadDecimales = 2;
  }
  if(!cantidadNumeroEntero){
      cantidadNumeroEntero = 4;
  }
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
  
  
}

</script>