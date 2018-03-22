<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'servicio-usuario-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>

<?php echo $form->errorSummary($model); ?>
<div class="row">
    <div class="col-sm-12 col-md-4">
        <?php
//        $servicioImpuesto->id_impuesto = $ItemsCount->id_impuesto;
//        $data = CHtml::listData(Usuario::model()->findAll(array()), 'id_usuario_sistema', 'primer_nombre');
//        echo $form->dropDownListGroup($model,'id_usuario',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'name'=>'AddItemsImpuesto'.$i), 'data'=>$data), 'labelOptions'=>array('label'=>false))); ?>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
          <label class="control-label required" for="">
            Nombre del Usuario:
            <span class="required">*</span>
          </label>
          <?php 
          if($model->id_usuario){
              $usuario = Usuario::model()->find('id_usuario_sistema ='.$model->id_usuario);
              $usuario = $usuario->correo."; ".$usuario->primer_nombre;
          }
          
          ?>
          <input id="Servicio_usuario_servicio" onblur="vaciar(this.value)" class="span5 ui-autocomplete-input form-control" type="text" name="Servicio_usuario_nombre" placeholder="Nombre del Usuario" autocomplete="off" value="<?php echo $usuario; ?>">
          <?php //echo $form->textFieldGroup($model,'id_socio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
          <?php echo $form->hiddenField($model,'id_usuario',array('type'=>"hidden")); ?>
          <br>
    </div>
</div>
<div class="row">
<div class="col-sm-12 col-md-12">
    <div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span>&nbsp;&nbsp;Precios especiales por servicio</div>
      <div class="pd-inner">
            <div id="table-participante" style="padding: 0 20px 20px 20px;">
                <div class="row" id="head-table-participante">
                  <div class="col-xs-3" style="padding: 8px;"><center><strong>Empresa</strong></center></div>
                  <div class="col-xs-3" style="padding: 8px;"><center><strong>Servicio</strong></center></div>
                  <div class="col-xs-2" style="padding: 8px;"><center><strong>Precio Sugerido</strong></center></div>
                  <div class="col-xs-2" style="padding: 8px;"><center><strong>Precio Especial</strong></center></div>
                  <div class="col-xs-1" style="padding: 8px;"><center><strong>Acción</strong></center></div>
                </div>
                <?php
                $count = 0;
                $countRowParticipante = 0;
                if (!$model->isNewRecord){
                    $countRowParticipante = 1;
                    $i = 0;
                    if(isset($servicioUsuarioItemsCount)){
                        $count = count($servicioUsuarioItemsCount);
                        foreach($servicioUsuarioItemsCount as $ItemsCount){
                            ?>
                 <div id="removeParticipante<?php echo $i;?>" class="row"  style="border-top: 1px solid #ddd;">
                <!--<div class="row">-->
                    <div class="col-xs-3" style="padding: 8px;">
                        <?php
                        $model->id_empresa = $ItemsCount->id_empresa;
                        $data = CHtml::listData(Empresa::model()->findAll(array()), 'id_empresa', 'empresa');
                        echo $form->dropDownListGroup($model,'id_empresa',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'name'=>'AddItemsImpuestoEmpresa'.$i, 'onchange'=>"findServicio(this.value, ".$i.")"), 'data'=>$data), 'labelOptions'=>array('label'=>false))); ?>
                    </div>
                    <div class="col-xs-3" style="padding: 8px;">
                        <?php
                        $model->id_servicio = $ItemsCount->id_servicio;
                        $data = CHtml::listData(Servicio::model()->findAll('id_empresa ='.$model->id_empresa), 'id_servicio', 'servicio');
                        echo $form->dropDownListGroup($model,'id_servicio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'name'=>'AddItemsImpuesto'.$i, 'onchange'=>"mostrarPrecio(this.value, ".$i.")"), 'data'=>$data), 'labelOptions'=>array('label'=>false))); ?>
                    </div>
                    <div class="col-xs-2" style="padding: 8px;">
                        <?php
                        $model->costo_servicio = $ItemsCount->idServicio->precio_sugerido;
                        echo $form->textFieldGroup($model, 'costo_servicio', array('widgetOptions' => array('htmlOptions' => array('class' => 'span5', 'maxlength' => 9, 'onkeyup'=>"miles_decimales(this,this.value.charAt(this.value.length-1))",  'disabled'=>"disabled",  'name'=>'ProcentajeImpuesto'.$i)), 'labelOptions'=>array('label'=>false)));
                        ?>
                    </div>
                    <div class="col-xs-2" style="padding: 8px;">
                        <?php
                        $serviciosEspeciales = ServicioUsuario::model()->findAll('id_servicio = '.$ItemsCount->id_servicio.' AND id_usuario ='.$ItemsCount->id_usuario);
                        $costoEspecial = 0;
                        foreach ($serviciosEspeciales as $servicioEspecial){
                            $costoEspecial += $servicioEspecial->costo_especial;
                        }
                        $model->costo_especial = $costoEspecial;
                        echo $form->textFieldGroup($model, 'costo_especial', array('widgetOptions' => array('htmlOptions' => array('disabled'=>"disabled", 'class' => 'span5', 'maxlength' => 9, 'onkeypress'=>"return NumCheck(event, this)" , 'name'=>'ImpuestoCosto'.$i )), 'labelOptions'=>array('label'=>false)));
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
                
                    <div id="removeDetalle<?php echo $i; ?>"  class="row">
                        <div class="col-xs-12" style="padding: 8px;">
                            <div class="panel-group">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                          <a data-toggle="collapse" href="#collapse<?php echo $i; ?>">Gastos</a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse">
                                        <div class="panel-body">

                                            <table class="table table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <td style=" width: 33%;"><center><strong>Gastos</strong></center></td>
                                                    <td style=" width: 33%;"><center><strong>Precio</strong></center></td>
                                                    <td style=" width: 33%;"><center><strong>Precio Especial</strong></center></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count = 0;
                                                $servicioImpuestos = ServicioImpuesto::model()->findAll('id_servicio ='.$ItemsCount->id_servicio);
                                                foreach ($servicioImpuestos as $servicioImpuesto){
                                                    $servicioEspecial = ServicioUsuario::model()->find('id_servicio = '.$servicioImpuesto->id_servicio.' AND id_impuesto ="'.$servicioImpuesto->id_impuesto.'" AND id_usuario ='.$ItemsCount->id_usuario);
                                                    
                                                    
                                                    ?>
                                                    <tr>
                                                        <td><center><?php echo $servicioImpuesto->idImpuesto->impuesto; ?></center></td>
                                                        <td><center><?php echo $servicioImpuesto->precio_sugerido; ?></center></td>
                                                        <td>
                                                            <center>
                                                                <input value="<?php echo $servicioEspecial->costo_especial; ?>" 
                                                                       onkeyup="sumaPrecioSugerido(this.value, <?php echo $i; ?>, <?php echo $count ?>)" 
                                                                       onkeypress="return NumCheck(event, this)" 
                                                                       id="PrecioEspecial<?php echo $i; ?>_<?php echo $count ?>" 
                                                                       class="span5 form-control" type="text" 
                                                                       maxlength="9" placeholder="0.0" 
                                                                       name="PrecioEspecial<?php echo $i; ?>_<?php echo $count ?>">
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $count++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                        </div>
                                    </div>
                                </div>
                            </div> 
                            
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
                      'label'=>'Agregar impuesto',
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


	<?php // echo $form->textFieldGroup($model,'id_servicio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php // echo $form->textFieldGroup($model,'costo_servicio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

	<?php // echo $form->textFieldGroup($model,'costo_especial',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

	<?php // echo $form->textFieldGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
		)); ?>
</div>

<?php $this->endWidget(); ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery-ui-no-conflict.min.js"></script>
<script>
function sumaPrecioSugerido(valor, items, i){

        var count = $('#countRowParticipante').val();
            count = parseInt(count)*parseInt(2);
        var sumaImpuesto = 0;
        for (var i= 0; i <= count; i++) {
            var precioSugerido = $('#PrecioEspecial'+items+'_'+i).val();
            
            if(precioSugerido === undefined){
                
            }else{
                if(precioSugerido || precioSugerido != ""){
                    sumaImpuesto = parseFloat(sumaImpuesto) + parseFloat(precioSugerido);

                }
            }
        }
        $('#ImpuestoCosto'+items).val(sumaImpuesto.toFixed(2));
        calculoPorcentajeGanancia();
}    
    
    
function findServicio(id_empresa, items){
    $.post("<?php echo Yii::app()->createUrl('empresa/findServicio') ?>",{ id_empresa:id_empresa },
    function(data){
        $('#itemsImpuesto'+items).html(data);
    });
}    
    
function mostrarPrecio(id_servicio, items){
    $.post("<?php echo Yii::app()->createUrl('servicio/findServicio') ?>",{ id_servicio:id_servicio },
    function(data){
        $('#ProcentajeImpuesto'+items).val(data);
        tablaGasto(id_servicio, items, 0);
    });
}    
    
function tablaGasto(id_servicio, items, accion){
//    alert(id_servicio+' / '+items);
    if(id_servicio || id_servicio != ""){
        $.post("<?php echo Yii::app()->createUrl('servicio/tablaContenidoUsuario') ?>",{ id_servicio:id_servicio, items:items, accion:accion },
        function(data){
            $('#tablaContenido'+items).html(data);
        });
    }else{
        $('#tablaContenido'+items).html('<div class="alert alert-danger">Debe seleccionar un Servicio</div>');
    }
    
}    
    
jQuery('#Servicio_usuario_servicio').autocomplete({
  minLength: 3,
  source: function (request, response) {
    $.ajax({
      url: '<?php echo Yii::app()->createUrl('usuario/findJsonUsuario') ?>',
      dataType: "json",
      data: {term: request.term},
      success: function (data) {
        if(data){  
            response($.map(data, function (item) {
              return {
                label: 'Nombre: ' + item.primer_nombre,
                value: item.correo+'; '+item.primer_nombre,//item.id_socio,
                id: item.id_usuario_sistema,
//                name: item.nombre,
//                rif: item.rif,
//                id_sector_economico: item.id_sector_economico,
//                id_actividad_economica: item.id_actividad_economica,
//                id_actividad_economica_1: item.id_actividad_economica_1,
//                id_actividad_economica_2: item.id_actividad_economica_2,
//                id_actividad_economica_3: item.id_actividad_economica_3,
//                rubro: item.rubro,
              }
            }));
        }
    }
    });
  },
  select: function (event, ui) {
  $('#ServicioUsuario_id_usuario').val(ui.item.id);
//    $('#Afianzamiento_id_socio').val(ui.item.id);
//    $("#Afianzamiento_id_sector_economico").prop('disabled', true);
//    $("#Afianzamiento_id_actividad_economica").prop('disabled', true);
//    $("#Afianzamiento_id_actividad_economica_1").prop('disabled', true);
//    $("#Afianzamiento_id_actividad_economica_2").prop('disabled', true);
//    $("#Afianzamiento_id_actividad_economica_3").prop('disabled', true);
//    $('#Afianzamiento_id_sector_economico option[value="'+ui.item.id_sector_economico+'"]').attr("selected",true);
//    $('#Afianzamiento_id_actividad_economica option[value="'+ui.item.id_actividad_economica+'"]').attr("selected",true);
//    mostrarActividadEconomica(ui.item.id_actividad_economica_1, 1);
//    mostrarActividadEconomica(ui.item.id_actividad_economica_2, 2);
//    mostrarActividadEconomica(ui.item.id_actividad_economica_3, 3);
//    $('#Afianzamiento_rubro').val(ui.item.rubro);
  },
});    
    
    
function addNewParticipante() {

    
    $('#nextRowParticipante').val(parseInt($('#nextRowParticipante').val())+1);
    $('#countRowParticipante').val(parseInt($('#countRowParticipante').val())+1);
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
    ?>
    $('#table-participante').append(
       '<div id="removeParticipante'+$('#nextRowParticipante').val()+'" class="row" style="border-top: 1px solid #ddd;">\n\
            <div class="col-xs-3" style="padding: 8px;">\n\
                <select onchange="findServicio(this.value, '+$('#nextRowParticipante').val()+')" id="AddItemsImpuestoEmpresa'+$('#nextRowParticipante').val()+'" class="span5 form-control" name="AddItemsImpuestoEmpresa'+$('#nextRowParticipante').val()+'">\n\
                    <?php echo $options; ?></select>\n\
            </div>\n\
            <div class="col-xs-3" style="padding: 8px;">\n\
                <select onchange="mostrarPrecio(this.value, '+$('#nextRowParticipante').val()+')" id="itemsImpuesto'+$('#nextRowParticipante').val()+'" class="span5 form-control" name="AddItemsImpuesto'+$('#nextRowParticipante').val()+'">\n\
                    <option value="">Seleccione ...</option>\n\
                </select>\n\
            </div>\n\
            <div class="col-xs-2" style="padding: 8px;">\n\
                <input type="text" class="span5 form-control" name="ProcentajeImpuesto'+$('#nextRowParticipante').val()+'"  id="ProcentajeImpuesto'+$('#nextRowParticipante').val()+'"  disabled="disabled"  value="" placeholder="0.0" maxlength="5" />\n\
            </div>\n\
            <div class="col-xs-2" style="padding: 8px;">\n\
                <input class="span5 ui-autocomplete-input form-control" onkeypress="return NumCheck(event, this)" type="text" name="ImpuestoCosto'+$('#nextRowParticipante').val()+'" disabled="disabled" id="ImpuestoCosto'+$('#nextRowParticipante').val()+'"  placeholder="0.0" maxlength="10" >\n\
            </div>\n\
            <div class="col-xs-1" style="padding: 8px;">\n\
                <center>\n\
                    <a class="delete" href="javascript:removeParticipante('+$('#nextRowParticipante').val()+')" data-toggle="tooltip" title="" data-original-title="Borrar">\n\
                        <i class="glyphicon glyphicon-trash"></i>\n\
                    </a>\n\
                </center>\n\
            </div>\n\
        </div>\n\
        <div id="removeDetalle'+$('#nextRowParticipante').val()+'"  class="row">\
            <div class="col-xs-12" style="padding: 8px;">\
             <div class="panel-group">\
                <div class="panel panel-primary">\
                  <div class="panel-heading">\
                    <h4 class="panel-title">\
                      <a data-toggle="collapse" href="#collapse'+$('#nextRowParticipante').val()+'">Gastos'+$('#nextRowParticipante').val()+'</a>\
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
//    $('#nextRowParticipante').val(parseInt($('#nextRowParticipante').val())-1);
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