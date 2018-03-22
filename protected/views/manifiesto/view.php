<?php
$this->breadcrumbs=array(
	'Manifiestos'=>array('index'),
	$model->id_manifiesto,
);

$this->menu=array(
array('label'=>'Listar Manifiesto','url'=>array('index')),
array('label'=>'Crear Manifiesto','url'=>array('create')),
array('label'=>'Actualizar Manifiesto','url'=>array('update','id'=>$model->id_manifiesto)),
array('label'=>'Eliminar Manifiesto','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_manifiesto),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Manifiesto','url'=>array('admin')),
);
?>

<span  class="ez">Detallar Manifiesto</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_manifiesto',
		'vchar_nombre',
		'vchar_numero',
		'float_peso',
		'id_instruccion',
		'dt_registro',
		'id_status',
		'ref',
		'vchar_comprador',
		'vchar_rif',
		'vchar_direccion',
		'vchar_telefono',
		'vchar_atencion',
		'vchar_codigoi_manifiesto',
		'status',
		'AWB',
),
)); ?>
    <br><br>
<?php 
//        if (!$model->isNewRecord){

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
              <div class="col-xs-3" style="padding: 8px;"><center><strong>Peso</strong></center></div>
              <!--<div class="col-xs-3" style="padding: 8px;"><center><strong>Acción</strong></center></div>-->
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
                        <center>
                            <?php echo $ordene->idOrden->peso; ?>
                        </center>
                    </div> 
<!--                    <div class="col-xs-3" style="padding: 8px;">
                        <center><a class="delete" data-original-title="Borrar" title="" data-toggle="tooltip" href="javascript:remove(<?php echo $ordene->datos_extra; ?>)">
                        <i class="glyphicon glyphicon-trash"></i>
                        </a></center>
                    </div>-->
                </div>

            <?php } ?>
        </div>
        <?php 
        $this->endWidget(); 
//        }

        ?>

<br>
        <?php 
//        if (!$model->isNewRecord){

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
              <div class="col-xs-2" style="padding: 8px;"><center><strong>Peso</strong></center></div>
              <!--<div class="col-xs-2" style="padding: 8px;"><center><strong>Acción</strong></center></div>-->
            </div>
            <?php 
//                            echo $model->id_cliente;
            $ordenes = ManifiestoOrdenesBultoLoading::model()->findAll('id_manifiesto ='.$model->id_manifiesto.' AND id_con is not NULL Order by id_orden ASC ');
            ?>
            
            <?php
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
                        <center><?php echo $ordene->idOrden->peso; ?></center>
                    </div> 
<!--                    <div class="col-xs-2" style="padding: 8px;">
                        <center><a class="delete" data-original-title="Borrar" title="" data-toggle="tooltip" href="javascript:remove2(<?php echo $ordene->id_con; ?>, <?php echo $ordene->datos_extra; ?>)">
                        <i class="glyphicon glyphicon-trash"></i>
                        </a></center>
                    </div>-->
                </div>

            <?php } ?>
            
        </div>
        <?php 
        $this->endWidget(); 
//        }

        ?>


</div>


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
    
</script>