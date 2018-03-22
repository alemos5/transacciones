<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'clientes-subcliente-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>


<?php echo $form->errorSummary($model); ?>

<div class="row">
    <div class="col-xs-12">
      <label class="control-label required" for="Afianzamiento_id_socio">
        Nombre del Cliente:
        <span class="required">*</span>
      </label>
      <?php 
        if($model->idClientes->nombre){
            $socio = $model->idClientes->nombre;
        }
      ?>
      <input id="Cliente_nb_cliente" onblur="vaciar(this.value)" class="span5 ui-autocomplete-input form-control" type="text" name="Cliente_nb_cliente" placeholder="Nombre del cliente" autocomplete="off" value="<?php echo $socio; ?>">
      <?php //echo $form->textFieldGroup($model,'id_socio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>50)))); ?>
      <?php echo $form->hiddenField($model,'id_cliente',array('type'=>"hidden", 'value'=>$model->idClientes->id_cliente)); ?>
      <br>
  </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-indent-left"></span>
                <h3 class="panel-title" style="display: inline;">Subclientes</h3>
                <div class="clearfix"></div>
            </div>
            <div id="yw0" class="panel-body">

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <?php
                //            echo CHtml::beginForm('/', 'post', ['id' => 'issue-574-checker-form']);
                            $data = CHtml::listData(Clientes::model()->findAll(), 'id_cliente', 'nombre');

                            $this->widget(
                                'booster.widgets.TbSelect2',
                                array(
                                    'name' => 'group_id_list',
                                    'data' => $data,
                                    'value' => $data2,
                                    'htmlOptions' => array(
                                        'multiple' => 'multiple',
                                        'class' => 'span5 form-control'
                                    ),
                                )
                            );
                        ?>
                        <br>
                        <?php 
                        if (!$model->isNewRecord){

                            $box = $this->beginWidget(
                                'booster.widgets.TbPanel',
                                array(
                                    'title' => 'Lista de Subclientes',
                                    'context' => 'primary',
                                    'headerIcon' => 'th-list',
                                        'padContent' => false,
                                    'htmlOptions' => array('class' => 'bootstrap-widget-table')
                                )
                            );
                        ?>
                        <div id="table-participante3" style="padding: 0 20px 20px 20px;">
                
                            <div class="row" id="head-table-participante2">
                              <div class="col-xs-4" style="padding: 8px;"><center><strong>Subcliente</strong></center></div>
                              <div class="col-xs-1" style="padding: 8px;"><center><strong>Correlativo</strong></center></div>
                              <div class="col-xs-1" style="padding: 8px;"><center><strong>Codigo</strong></center></div>
                              <div class="col-xs-4" style="padding: 8px;"><center><strong>Correo</strong></center></div>
                              <div class="col-xs-2" style="padding: 8px;"><center><strong>Acción</strong></center></div>
                            </div>

                        <?php 
//                            echo $model->id_cliente;
                            $subclientes = ClientesSubcliente::model()->findAll('id_cliente ='.$model->id_cliente.' Order by code_padre_hijo ASC');
                            foreach ($subclientes as $subcliente){
                            ?>

                                <div id="remove<?php echo $subcliente->id_clientes_subcliente; ?>" class="row"  style="border-top: 1px solid #ddd;">
                                    <div class="col-xs-4" style="padding: 8px;">
                                        <center><?php echo $subcliente->idClienteHijo->nombre; ?></center>
                                    </div>
                                    <div class="col-xs-1" style="padding: 8px;">
                                        <center><?php echo $subcliente->code_padre_hijo; ?></center>
                                    </div>
                                    <div class="col-xs-1" style="padding: 8px;">
                                        <center><?php echo $subcliente->code_cliente_hijo; ?></center>
                                    </div> 
                                    <div class="col-xs-4" style="padding: 8px;">
                                        <center><?php echo $subcliente->idClienteHijo->email; ?></center>
                                    </div>  
                                    <div class="col-xs-2" style="padding: 8px;">
                                        <center><a class="delete" data-original-title="Borrar" title="" data-toggle="tooltip" href="javascript:remove(<?php echo $subcliente->id_clientes_subcliente; ?>)">
                                        <i class="glyphicon glyphicon-trash"></i>
                                        </a></center>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                        <?php 
                        $this->endWidget(); 
                        }

                        ?>


                    </div>
                </div>
                <br><br>
            </div>
        </div>
    </div>
</div>

	<?php //echo $form->textFieldGroup($model,'id_cliente',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php //echo $form->textFieldGroup($model,'code_cliente_padre',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250)))); ?>

	<?php //echo $form->textFieldGroup($model,'code_cliente_hijo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250)))); ?>

	<?php //echo $form->textFieldGroup($model,'code_padre_hijo',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>250)))); ?>

	<?php //echo $form->textFieldGroup($model,'fecha_registro',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php //echo $form->textFieldGroup($model,'estatus',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php //echo $form->textAreaGroup($model,'descripcioon', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

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
    
function vaciar(data){
   if(!data){ 
       $('#ClientesSubcliente_id_cliente').val('');
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
    $('#ClientesSubcliente_id_cliente').val(ui.item.id);
  },
});
</script>