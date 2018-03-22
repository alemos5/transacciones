<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'manifiesto-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->hiddenField($model,'vchar_nombre',array('type'=>"hidden", 'value'=>'Casillero Express LLC')); ?>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label required" for="Usuario_tipo_documento">
                Tipo de elemento
            <span class="required">*</span>
            </label>
            <select id="tipo_documento" class="span5 form-control" placeholder="Tipo Documento" name="tipo_documento">
                <!--<option value="">Seleccione</option>-->
                <option selected="selected" value="1">Orden</option>
                <option value="2">Consolidación</option>
            </select>
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">

            <label class="control-label required" for="Usuario_tipo_documento">
               N° de elemento
            <span class="required">*</span>
            </label>
            <div class="col-sm-12 bootstrap-timepicker input-group">
                
                <?php 
//                  if($model->idClientes->nombre){
//                      $socio = $model->idClientes->nombre;
//                  }
                $socio = NULL;
                ?>
                <input id="usuarioBusqueda" onblur="" class="span5 ui-autocomplete-input form-control" type="text" name="Cliente_nb_cliente" placeholder="Nombre del cliente" autocomplete="off" value="<?php echo $socio; ?>">
                <!--<input id="usuarioBusqueda"  onblur='' class="span5 ui-autocomplete-input form-control" type="text" name="Cliente_nb_cliente" placeholder="Elemento" maxlength="30" size="45" autocomplete="off" value="<?php echo $socio; ?>">-->
                <!--<input onblur='findIdentificacion(this.value)'  style=" width: 100%;" id="usuarioBusqueda" class="form-control" type="text" onblur="" placeholder="Código del elemento" name="correoBusqueda" maxlength="30" size="45">-->
<!--                <label onclick="findIdentificacion()" class="input-group-addon btn btn-primary" style="width: 10%;" onclick="">
                    <span onclick="findIdentificacion()" class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    Buscar
                </label>-->
            </div>
        </div>
    </div>
</div>
<br>
<div id="elemento"></div>
<br>
<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="panel panel-default">
        <div class="panel-heading">
            <span onclick="" class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            Ordenes Seleccionada 
            <div class="pull-right "  >
                <?php
                $countOrdenes = 0;
                if (!$model->isNewRecord){
                    $ordenesManifiestos = ManifiestoOrdenesBultoLoading::model()->findAll('id_manifiesto ='.$model->id_manifiesto.' AND id_tipo = 1');
                    $countOrdenes = count($ordenesManifiestos);
                }
                
                ?>
                Número de Ordenes: <label id="numeroOrdene"><?php echo $countOrdenes; ?></label>
            </div>
        </div>
        <div class="panel-body">
            <div style="" class="pd-inner">
            <div id="table-participante" style="padding: 0 5px 5px 5px;">
                <div style=" background-color: #ccc;" class="row" id="head-table-participante">
                  <!--<div class="col-xs-4" style="padding: 8px;"><center><strong>Identification</strong></center></div>-->
                  <div class="col-xs-4" style="padding: 5px;"><strong>Orden</strong></div>
                  <div class="col-xs-5" style="padding: 5px;"><strong>Cliente</strong></div>
                  <div class="col-xs-1" style="text-align: right; padding: 5px;"><strong>Peso</strong></div>
                  <div class="col-xs-2" style="text-align: right; padding: 5px;"><strong>Acción</strong></div>
                </div>
                <?php
                $count = 0;
                $countRowParticipante = 0;
                if (!$model->isNewRecord){
                    $ordenesManifiestos = ManifiestoOrdenesBultoLoading::model()->findAll('id_manifiesto ='.$model->id_manifiesto.' AND id_tipo = 1');
                    foreach ($ordenesManifiestos as $ordenesManifiesto){
                    ?>
                    <input type="hidden" id="id_orden<?php echo $count; ?>" value="<?php echo $ordenesManifiesto->id_orden; ?>" name="id_orden<?php echo $count; ?>">
                    <div id="removeParticipante<?php echo $count; ?>" class="row" style="border-top: 1px solid #ddd;">
                        <div class="col-xs-4" style="padding: 8px;">
                            <label><?php echo $ordenesManifiesto->idOrden->ware_reciept; ?></label>
                        </div>
                        <div class="col-xs-5" style="padding: 8px;">
                            <label><?php echo $ordenesManifiesto->idOrden->nombre_cliente; ?></label>
                        </div>
                        <div class="col-xs-1" style="padding: 8px;">
                            <label><?php echo $ordenesManifiesto->idOrden->peso; ?></label>
                            <input type="hidden" id="idOrdenPeso<?php echo $count; ?>" value="<?php echo $ordenesManifiesto->idOrden->peso; ?>" name="idOrdenPeso<?php echo $count; ?>">
                        </div>
                        <div style="text-align: right" class="col-xs-2" style="padding: 8px;">
                            <a class="delete" href="javascript:removeParticipante(<?php echo $count; ?>, 1, <?php echo $ordenesManifiesto->datos_extra; ?>)" data-toggle="tooltip" title="" data-original-title="Borrar">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </div>
                    </div>
                    <?php
                        $count++;
                        $countRowParticipante++;
                    }
                }else{
                  ?>
                  <?php

                }
                ?>
                </div>
            </div>
            <input id="countRowParticipante" type="hidden" name="countRowParticipante" value="<?php echo $countRowParticipante; ?>" />
            <input id="nextRowParticipante" type="hidden" name="nextRowParticipante" value="<?php echo $count; ?>" />
            
        </div>
        <div class="panel-footer ">
                Peso Ordenes: <label class="pull-right " id="numeroOrdeneTotal">0</label>
        </div>
    </div>
    </div>
    <div class="col-sm-12 col-md-6">
         <div class="panel panel-default">
        <div class="panel-heading">
            <span onclick="" class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
            Consolidaciones Seleccionada 
            <div class="pull-right "  >
                
                <?php
                    $countConsolidaciones = 0;
                    if (!$model->isNewRecord){
                        $consolidacionesManifiestos = ManifiestoOrdenesBultoLoading::model()->findAll('id_manifiesto ='.$model->id_manifiesto.' AND id_tipo = 2 group by id_con');
                        $countConsolidaciones = count($consolidacionesManifiestos);
                    }

                ?>
                
                Número de Consolidaciones: <label id="numeroConsolidacion"><?php echo $countConsolidaciones; ?></label>
            </div>
        </div>
        <div class="panel-body">
            <div style="" class="pd-inner">
            <div id="table-participante2" style="padding: 0 5px 5px 5px;">
                <div style=" background-color: #ccc;" class="row" id="head-table-participante">
                  <!--<div class="col-xs-4" style="padding: 8px;"><center><strong>Identification</strong></center></div>-->
                  <div class="col-xs-6" style="padding: 5px;"><strong>Consolidación</strong></div>
                  <div class="col-xs-4" style="padding: 5px;"><strong>Cliente</strong></div>
                  <div class="col-xs-1" style="text-align: right; padding: 5px;"><strong>Peso</strong></div>
                  <div class="col-xs-1" style="text-align: right; padding: 5px;"><strong>Acc.</strong></div>
                </div>
                <?php
                $count2 = 0;
                $countRowParticipante2 = 0;
                if (!$model->isNewRecord){
                    $ordenesConsolidaciones = ManifiestoOrdenesBultoLoading::model()->findAll('id_manifiesto ='.$model->id_manifiesto.' AND id_tipo = 2 group by id_con');
                    foreach ($ordenesConsolidaciones as $ordenesConsolidacion){
                    ?>
                    <input type="hidden" id="idConsolidacion<?php echo $count2; ?>" value="<?php echo $ordenesConsolidacion->id_con; ?>" name="idConsolidacion<?php echo $count2; ?>">
                    <div id="removeParticipante2<?php echo $count2; ?>" class="row" style="border-top: 1px solid #ddd;">
                        <div class="col-xs-6" style="padding: 8px;">
                            <label><?php echo $ordenesConsolidacion->idConsolidacion->ware_reciept; ?></label>
                        </div>
                        <div class="col-xs-4" style="padding: 8px;">
                            <label><?php echo $ordenesConsolidacion->idConsolidacion->idCliente->nombre; ?></label>
                        </div>
                        <div class="col-xs-1" style="padding: 8px;">
                            <label><?php echo $ordenesConsolidacion->idConsolidacion->peso; ?></label>
                            <input type="hidden" id="idConsolidacionPeso<?php echo $count2; ?>" value="<?php echo $ordenesConsolidacion->idConsolidacion->peso; ?>" name="idConsolidacionPeso<?php echo $count2; ?>">
                        </div>
                        <div style="text-align: right" class="col-xs-1" style="padding: 8px;">
                            <a class="delete" href="javascript:removeParticipante2(<?php echo $count2; ?>, 1, <?php echo $ordenesConsolidacion->id_con; ?>)" data-toggle="tooltip" title="" data-original-title="Borrar">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </div>
                    </div>
                    <?php
                        $count2++;
                        $countRowParticipante2++;
                    }
                }else{
                  ?>
                  <?php
                }
                ?>
            </div>
            </div>
            <input id="countRowParticipante2" type="hidden" name="countRowParticipante2" value="<?php echo $countRowParticipante2; ?>" />
            <input id="nextRowParticipante2" type="hidden" name="nextRowParticipante2" value="<?php echo $count2; ?>" />
        </div>
        <div class="panel-footer ">
                Peso Consolidaciones: <label class="pull-right " id="numeroConsolidacionTotal">0</label>
        </div>
    </div>
        <div class="pull-right ">
            <input id="totalElementoText" type="hidden" value="0">
            Cantidad de elementos: <label id="totalElemento">0</label>
            <br>
            Peso Total: <label id="totalPeso">0</label>
        </div>
    </div>
    
</div>




<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget();

?>
<input type="hidden" id="ordenesSeleccionadas" name="ordenesSeleccionadas" value="">
<input type="hidden" id="consolidacionSeleccionadas" name="consolidacionSeleccionadas" value="">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery-ui-no-conflict.min.js"></script>
<script>
    
function ordenes(){
    var countOrden = $('#nextRowParticipante').val();
    var OrdenesSeleccionadas = "";
    for(var i = 0; i <= countOrden; i++){
        var orden = $('#id_orden'+i).val();
        if(orden){
            OrdenesSeleccionadas = OrdenesSeleccionadas+"/"+orden;
        }
    }
    $('#ordenesSeleccionadas').val(OrdenesSeleccionadas);
} 
function consolidaciones(){
    var countConsolidaciones = $('#nextRowParticipante2').val();
    var ConsolidacionesSeleccionadas = "";
    for(var i = 0; i <= countConsolidaciones; i++){
        var consolidacion = $('#idConsolidacion'+i).val();
        if(consolidacion){
            ConsolidacionesSeleccionadas = ConsolidacionesSeleccionadas+"/"+consolidacion;
        }
    }
    $('#consolidacionSeleccionadas').val(ConsolidacionesSeleccionadas);
}    
    
function totalElemento(){


    var countOrden = $('#nextRowParticipante').val();
    var countConsolidacion = $('#nextRowParticipante2').val();
    
    //=================================//
    // Orden
    //=================================//
    var pesoOrden = 0.0;
    for(var i = 0; i <= countOrden; i++){
        var peso = $('#idOrdenPeso'+i).val();
        if(peso){
            pesoOrden = (parseFloat(pesoOrden) + parseFloat(peso));
        }
    }
    $('#numeroOrdeneTotal').html(pesoOrden.toFixed(2));
    
    //=================================//
    // Consolidaciones
    //=================================//
    var pesoConsolidaciones = 0.0;
    for(var ii = 0; ii <= countConsolidacion; ii++){
        var pesoConsolidacion = $('#idConsolidacionPeso'+ii).val();
        if(pesoConsolidacion){
            pesoConsolidaciones = (parseFloat(pesoConsolidaciones) + parseFloat(pesoConsolidacion));
        }
    }
    $('#numeroConsolidacionTotal').html(pesoConsolidaciones.toFixed(2));
    
       
    //=================================//
    // Totales
    //=================================//
    var countOrden = $('#countRowParticipante').val();
    var countConsolidacion = $('#countRowParticipante2').val();
    var totalNumero = (parseFloat(countOrden) + parseFloat(countConsolidacion));
    $('#totalElemento').html(totalNumero);
    
    
    var totalPeso = (parseFloat(pesoOrden) + parseFloat(pesoConsolidaciones));
    $('#totalPeso').html(totalPeso.toFixed(2));
    
    
    
}    
    
    
//    var tipo = $('#tipo_documento').val(); 
jQuery('#usuarioBusqueda').autocomplete({
  tipo : $('#tipo_documento').val() ,
  minLength: 3,
  source: function (request, response, tipo = $('#tipo_documento').val(), orden = $('#ordenesSeleccionadas').val(), consolidacion = $('#consolidacionSeleccionadas').val()) {
    $.ajax({
      url: '<?php echo Yii::app()->createUrl('ordenesConsolidaciones/Elemento') ?>',
      dataType: "json",
      data: {tipo: tipo, orden:orden, consolidacion:consolidacion, term: request.term},
      success: function (data) {
        if(data){  
            response($.map(data, function (item) {
              return {
                label: item.ware_reciept,
                value: item.ware_reciept,//item.id_socio,
                id: item.ware_reciept,
                name: item.ware_reciept,
              }
            }));
        }
    }
    });
  },
  select: function (event, ui) {
    findIdentificacion(ui.item.id);
  },
});    
    


function findIdentificacion(id) {
  var tipo = $('#tipo_documento').val();  
  var id = id;
  $.post("<?php echo Yii::app()->createUrl('ordenesConsolidaciones/findoOrden') ?>",{ id:id, tipo:tipo },
  function(data){
     $('#elemento').html(data);
  });
}    
    
    
function remove(id) {
  
  if(confirm('¿Realmente esta seguro de eliminar la asociaón de la orden al manifiesto?')) {
    $('#remove'+id).remove();
    $.post("<?php echo Yii::app()->createUrl('manifiesto/eliminarOrden') ?>",{ id:id },function(data){
    });
    
  }
}   
function remove2(id, extra) {
  
  if(confirm('¿Realmente esta seguro de eliminar la asociaón de la consolidación al manifiesto?')) {
    $('#removeConsolidacion'+extra).remove();
    $.post("<?php echo Yii::app()->createUrl('manifiesto/eliminarConsolidacion') ?>",{ id:id },function(data){
    });
//    location.reload();
  }
}    
function consolidacion(id_consolidacion){
    alert("Aqui :"+id_consolidacion);
    $('#consolidacionPeso').html(id_consolidacion);
}

function removeParticipante(id, accion, valor) {
  
  if('¿Realmente desea eliminar la orden seleccionada') {
    $('#removeParticipante'+id).remove();
    $('#id_orden'+id).val('');  
    $('#countRowParticipante').val(parseFloat($('#countRowParticipante').val())-1);
    $('#numeroOrdene').html($('#countRowParticipante').val());
    $('#idOrdenPeso'+id).val('0');
    totalElemento();
    ordenes();
  }
  
    if(accion == 1){
        $.post("<?php echo Yii::app()->createUrl('manifiesto/eliminarOrdenManifiesto') ?>",{ valor:valor,  },function(data){});
    }
  
}    
function removeParticipante2(id, accion, valor) {
  
    if('¿Realmente desea eliminar la consolidación seleccionada') {
      $('#removeParticipante2'+id).remove();
      $('#idConsolidacion'+id).val('');  
      $('#countRowParticipante2').val(parseFloat($('#countRowParticipante2').val())-1);
      $('#numeroConsolidacion').html($('#countRowParticipante2').val());
      $('#idConsolidacionPeso'+id).val('0');
      totalElemento();
      consolidaciones();
    }
    if(accion == 1){
        $.post("<?php echo Yii::app()->createUrl('manifiesto/eliminarOrdenManifiesto2') ?>",{ valor:valor,  },function(data){});
    }
}    
    
//============================================================================//    
// Agregar participante
//============================================================================// 

function addNewElemento(tipo) {
    
    if(tipo == 1){
        var idOrden = $('#idOrden').val();
        var Orden = $('#Orden').val();
        var Ordenpeso = $('#Ordenpeso').val();
        var OrdenCliente = $('#OrdenCliente').val();
        $('#table-participante').append(
           '<input type="hidden" id="id_orden'+$('#nextRowParticipante').val()+'" value="'+idOrden+'" name="id_orden'+$('#nextRowParticipante').val()+'">\
            <div id="removeParticipante'+$('#nextRowParticipante').val()+'" class="row" style="border-top: 1px solid #ddd;">\
                <div class="col-xs-4" style="padding: 8px;">\n\
                    <label>'+Orden+'</label>\n\
                </div>\n\
                <div class="col-xs-5" style="padding: 8px;">\n\
                    <label>'+OrdenCliente+'</label>\n\
                </div>\n\
                <div class="col-xs-1" style="padding: 8px;">\n\
                    <label>'+Ordenpeso+'</label>\n\
                    <input type="hidden" id="idOrdenPeso'+$('#nextRowParticipante').val()+'" value="'+Ordenpeso+'" name="idOrdenPeso'+$('#nextRowParticipante').val()+'">\n\
                </div>\n\
                <div style="text-align: right" class="col-xs-2" style="padding: 8px;">\n\
                    <a class="delete" href="javascript:removeParticipante('+$('#nextRowParticipante').val()+')" data-toggle="tooltip" title="" data-original-title="Borrar">\n\
                        <i class="glyphicon glyphicon-trash"></i>\n\
                    </a>\n\
                </div>\n\
            </div>'  
         );
        $('#nextRowParticipante').val(parseFloat($('#nextRowParticipante').val())+1);
        $('#countRowParticipante').val(parseFloat($('#countRowParticipante').val())+1);
        $('#btAgregarOrden').css('display', 'none');
        $('#elemento').html('');
        $('#numeroOrdene').html($('#countRowParticipante').val()); 
        ordenes();
        $('#usuarioBusqueda').val('');
    }
    if(tipo == 2){
        var idConsolidacion = $('#idConsolidacion').val();
        var Consolidacion = $('#Consolidacion').val();
        var Consolidacionpeso = $('#Consolidacionpeso').val();
        var ConsolidacionCliente = $('#ConsolidacionCliente').val();
        $('#table-participante2').append(
           '<input type="hidden" id="idConsolidacion'+$('#nextRowParticipante2').val()+'" value="'+idConsolidacion+'" name="idConsolidacion'+$('#nextRowParticipante2').val()+'">\
            <div id="removeParticipante2'+$('#nextRowParticipante2').val()+'" class="row" style="border-top: 1px solid #ddd;">\
                <div class="col-xs-6" style="padding: 8px;">\n\
                    <label>'+Consolidacion+'</label>\n\
                </div>\n\
                <div class="col-xs-4" style="padding: 8px;">\n\
                    <label>'+ConsolidacionCliente+'</label>\n\
                </div>\n\
                <div class="col-xs-1" style="padding: 8px;">\n\
                    <label>'+Consolidacionpeso+'</label>\n\
                    <input type="hidden" id="idConsolidacionPeso'+$('#nextRowParticipante2').val()+'" value="'+Consolidacionpeso+'" name="idConsolidacionPeso'+$('#nextRowParticipante2').val()+'"> \n\
                </div>\n\
                <div style="text-align: right" class="col-xs-1" style="padding: 8px;">\n\
                    <a class="delete" href="javascript:removeParticipante2('+$('#nextRowParticipante2').val()+')" data-toggle="tooltip" title="" data-original-title="Borrar">\n\
                        <i class="glyphicon glyphicon-trash"></i>\n\
                    </a>\n\
                </div>\n\
            </div>'  
         );
        $('#nextRowParticipante2').val(parseFloat($('#nextRowParticipante2').val())+1);
        $('#countRowParticipante2').val(parseFloat($('#countRowParticipante2').val())+1);
        $('#btAgregarOrden').css('display', 'none');
        $('#numeroConsolidacion').html($('#countRowParticipante2').val());
        $('#elemento').html('');
        consolidaciones();
        $('#usuarioBusqueda').val('');
    }
    totalElemento();
}

//var tipo = $('#tipo_documento').val(); 

<?php
if (!$model->isNewRecord){
    ?>
    totalElemento();
    <?php
}
?>
</script>