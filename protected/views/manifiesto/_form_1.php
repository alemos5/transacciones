<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'manifiesto-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="alert alert-warning">Los campos requeridos contienen <span class="required">*</span>.</p>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->hiddenField($model,'vchar_nombre',array('type'=>"hidden", 'value'=>'Casillero Express LLC')); ?>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <label>
            Ordenes:
        </label>
        <?php
//            echo CHtml::beginForm('/', 'post', ['id' => 'issue-574-checker-form']);
//                            $data = CHtml::listData(Clientes::model()->findAll(), 'id_cliente', 'nombre');


            $criteria=new CDbCriteria;
            $criteria->join = 'LEFT JOIN `manifiesto-ordenes-bulto-loading` b ON (t.id_orden = b.id_orden) WHERE t.status = 1 AND t.instrucciones = 2 AND b.id_manifiesto is null';
            $data = CHtml::listData(Ordenes::model()->findAll($criteria), 'id_orden', 'ware_reciept');
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
                    'title' => 'Lista de Ordenes',
                    'context' => 'primary',
                    'headerIcon' => 'th-list',
                        'padContent' => false,
                    'htmlOptions' => array('class' => 'bootstrap-widget-table')
                )
            );
        ?>
        <div id="table-participante3" style="padding: 0 20px 20px 20px;">

            <div class="row" id="head-table-participante2">
              <div class="col-xs-3" style="padding: 8px;"><center><strong>id Orden</strong></center></div>
              <div class="col-xs-3" style="padding: 8px;"><center><strong>Orden</strong></center></div>
              <div class="col-xs-3" style="padding: 8px;"><center><strong>Cliente</strong></center></div>
              <div class="col-xs-3" style="padding: 8px;"><center><strong>Acción</strong></center></div>
            </div>

            <?php 
//                            echo $model->id_cliente;
            $ordenes = ManifiestoOrdenesBultoLoading::model()->findAll('id_manifiesto ='.$model->id_manifiesto.' AND id_orden is not NULL AND id_con is Null  Order by id_orden ASC');
            foreach ($ordenes as $ordene){
            ?>

                <div id="remove<?php echo $ordene->datos_extra; ?>" class="row"  style="border-top: 1px solid #ddd;">
                    <div class="col-xs-3" style="padding: 8px;">
                        <center><?php echo $ordene->id_orden; ?></center>
                    </div>
                    <div class="col-xs-3" style="padding: 8px;">
                        <center><?php echo $ordene->idOrden->ware_reciept; ?></center>
                    </div>
                    <div class="col-xs-3" style="padding: 8px;">
                        <center>
                            <?php 
                                $cliente = Clientes::model()->find("code_cliente like '".$ordene->idOrden->code_cliente."'");
                                echo $cliente->nombre; 
                            ?>
                        </center>
                    </div> 
                    <div class="col-xs-3" style="padding: 8px;">
                        <center><a class="delete" data-original-title="Borrar" title="" data-toggle="tooltip" href="javascript:remove(<?php echo $ordene->datos_extra; ?>)">
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

<div class="row">
        <div class="col-sm-12 col-md-12">
        <label>
            Consolidaciones, Peso:
            <label id="consolidacionPeso">0</label>
        </label>
        <?php
//            echo CHtml::beginForm('/', 'post', ['id' => 'issue-574-checker-form']);
//                            $data = CHtml::listData(Clientes::model()->findAll(), 'id_cliente', 'nombre');

            
            $criteria=new CDbCriteria;
            $criteria->join = 'LEFT JOIN `manifiesto-ordenes-bulto-loading` b ON (t.id_con = b.id_con) WHERE t.status = 1 AND t.instruccion = 2 AND b.id_manifiesto is null';
            $data = CHtml::listData(Consolidaciones::model()->findAll($criteria), 'id_con', 'ware_reciept');
            $this->widget(
                'booster.widgets.TbSelect2',
                array(
                    'name' => 'group_id_list2',
                    'data' => $data,
                    'value' => $data2,
                    'htmlOptions' => array(
                        'multiple' => 'multiple',
                        'class' => 'span5 form-control',
                        'onclick'=>''
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
                    'title' => 'Lista de Consolidaciones',
                    'context' => 'primary',
                    'headerIcon' => 'th-list',
                        'padContent' => false,
                    'htmlOptions' => array('class' => 'bootstrap-widget-table')
                )
            );
        ?>
        <div id="table-participante3" style="padding: 0 20px 20px 20px;">

            <div class="row" id="head-table-participante2">
              <div class="col-xs-2" style="padding: 8px;"><center><strong>id Consolidación</strong></center></div>
              <div class="col-xs-2" style="padding: 8px;"><center><strong>Consolidación</strong></center></div>
              <div class="col-xs-2" style="padding: 8px;"><center><strong>Cliente</strong></center></div>
              <div class="col-xs-2" style="padding: 8px;"><center><strong>id_orden</strong></center></div>
              <div class="col-xs-2" style="padding: 8px;"><center><strong>Orden</strong></center></div>
              <div class="col-xs-2" style="padding: 8px;"><center><strong>Acción</strong></center></div>
            </div>
            <?php 
//                            echo $model->id_cliente;
            $ordenes = ManifiestoOrdenesBultoLoading::model()->findAll('id_manifiesto ='.$model->id_manifiesto.' AND id_con is not NULL Order by id_orden ASC ');
            foreach ($ordenes as $ordene){
            ?>

                <div id="removeConsolidacion<?php echo $ordene->datos_extra; ?>" class="row"  style="border-top: 1px solid #ddd;">
                    <div class="col-xs-2" style="padding: 8px;">
                        <center><?php echo $ordene->id_con; ?></center>
                    </div>
                    <div class="col-xs-2" style="padding: 8px;">
                        <center><?php echo $ordene->idConsolidacion->ware_reciept; ?></center>
                    </div>
                    <div class="col-xs-2" style="padding: 8px;">
                        <center>
                            <?php 
                                $cliente = Clientes::model()->find("id_cliente = ".$ordene->idConsolidacion->id_cliente);
                                echo $cliente->nombre; 
                            ?>
                        </center>
                    </div>
                    <div class="col-xs-2" style="padding: 8px;">
                        <center><?php echo $ordene->id_orden; ?></center>
                    </div>
                    <div class="col-xs-2" style="padding: 8px;">
                        <center><?php echo $ordene->idOrden->ware_reciept; ?></center>
                    </div> 
                    <div class="col-xs-2" style="padding: 8px;">
                        <center><a class="delete" data-original-title="Borrar" title="" data-toggle="tooltip" href="javascript:remove2(<?php echo $ordene->id_con; ?>, <?php echo $ordene->datos_extra; ?>)">
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

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

<script>
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
</script>