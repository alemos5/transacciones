<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'subcliente-ordenes-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>

<?php echo $form->errorSummary($model); 


?>

<div class="row">
    <div class="col-xs-3">
        <label class="control-label required" for="Afianzamiento_id_socio">
          Nombre del Cliente:
          <span class="required">*</span>
        </label>
        <?php 
//          if($model->idClientes->nombre){
              $socio = Null;
//          }
        ?>
        <input id="Cliente_nb_cliente" onblur="vaciar(this.value)" class="span5 ui-autocomplete-input form-control" type="text" name="Cliente_nb_cliente" placeholder="Nombre del cliente" autocomplete="off" value="<?php echo $socio; ?>">
        <?php //echo $form->textFieldGroup($model,'id_socio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
        <?php echo $form->hiddenField($model,'id_cliente',array('type'=>"hidden", 'value'=>'')); ?>
        <br>
    </div>
    <div class="col-xs-3">
        <?php echo $form->textFieldGroup($model,'costo_global',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10,  'required'=>"required")))); ?>
    </div>
    <div class="col-xs-3">
        <?php echo $form->textFieldGroup($model,'courier',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250,  'required'=>"required")))); ?>
    </div>
    
    <div class="col-xs-3">
        <div class="form-group">
            <label class="control-label required" for="Categoria_id_tipo_categoria">
            Cantidad por Subcliente
            <span class="required">*</span>
            </label>
        <select id="cantidadSubcliente" class="span5 form-control" name="cantidadSubcliente" placeholder="" required="required">
            <option value="0">Select...</option>
            <?php
            for($i = 1; $i<=10; $i++){
                ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php
            }
            ?>
        </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <?php echo $form->textAreaGroup($model,'descripcion', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8',  'required'=>"required")))); ?>
    </div>
</div>

<?php 
if (!$model->isNewRecord){
    $subcliente_ordenes = SubclienteOrdenes::model()->findAll('id_cliente ='.$model->id_cliente);
?>
    <div id="tablaSubclientes">
        <div class="panel panel-default">
            <div class="panel-heading">Ordenes por Subclientes</div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td style=" width: 60%"><center><strong>Subcliente</strong></center></td>
                            <td style=" width: 60%"><center><strong>Orden</strong></center></td>
                            <td style=" width: 20%"><center><strong>Peso</strong></center></td>
                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php 
}else{
?>
    <div id="tablaSubclientes"></div>
<?php 
}
?>

	<?php // echo $form->textFieldGroup($model,'id_cliente',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php // echo $form->textFieldGroup($model,'id_subcliente',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php // echo $form->textFieldGroup($model,'orden',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php // echo $form->textFieldGroup($model,'peso',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>10)))); ?>

	

	

	

	<?php // echo $form->textFieldGroup($model,'fecha_registro',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php // echo $form->textFieldGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery-ui-no-conflict.min.js"></script>
<script>
function remove(id) {
  
  if(confirm('¿Realmente esta seguro de eliminar el Subcliente?')) {
    $('#remove'+id).remove();
    $.post("<?php echo Yii::app()->createUrl('clientesSubcliente/eliminarSubcliente') ?>",{ id:id },function(data){
    });
    
  }
  
}
//=    

function tablaContenido(id_cliente){
    $.post("<?php echo Yii::app()->createUrl('subclienteOrdenes/tablaSubcliente') ?>",{ id_cliente:id_cliente },function(data){
        $('#tablaSubclientes').html(data);
    });
}

function vaciar(data){
   if(!data){ 
       $('#SubclienteOrdenes_id_cliente').val('');
       $('#tablaSubclientes').html('');
   }
}    
jQuery('#Cliente_nb_cliente').autocomplete({
  minLength: 3,
  source: function (request, response) {
    $.ajax({
      url: '<?php echo Yii::app()->createUrl('clientes/findJsonCliente') ?>',
      dataType: "json",
      data: {term: request.term},
      success: function (data) {
        if(data){  
            response($.map(data, function (item) {
              return {
                label: 'Código Cliente: ' + item.code_cliente + ', Nombre: ' + item.nombre,
                value: item.code_cliente+'; '+item.nombre,//item.id_socio,
                id: item.id_cliente,
                name: item.nombre,
              }
            }));
        }
    }
    });
  },
  select: function (event, ui) {
    $('#SubclienteOrdenes_id_cliente').val(ui.item.id);
    tablaContenido(ui.item.id);
  },
});
</script>
