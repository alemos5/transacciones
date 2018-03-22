<?php
$this->breadcrumbs=array(
	'Clientes Subclientes'=>array('index'),
	$model->id_clientes_subcliente,
);

$this->menu=array(
array('label'=>'Listar Subcliente','url'=>array('index')),
array('label'=>'Crear Subcliente','url'=>array('create')),
array('label'=>'Actualizar Subcliente','url'=>array('update','id'=>$model->id_clientes_subcliente)),
array('label'=>'Eliminar Subcliente','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_clientes_subcliente),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Subcliente','url'=>array('admin')),
);
?>

<span class="ez">Detalles del Subcliente</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_clientes_subcliente',
		'id_cliente',
                array(
                    'label'=>'Cliente:',
                    'value'=>$model->idClientes->nombre,
                ),
//		'code_cliente_padre',
//		'code_cliente_hijo',
//		'code_padre_hijo',
),
)); ?>
    
    <br><br>
<?php 
//if (!$model->isNewRecord){

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

?>
    
    
    
</div>

<script>
function remove(id) {
  
  if(confirm('¿Realmente esta seguro de eliminar el Subcliente?')) {
    $('#remove'+id).remove();
    $.post("<?php echo Yii::app()->createUrl('clientesSubcliente/eliminarSubcliente') ?>",{ id:id },function(data){
    });
    
  }
  
}
</script>