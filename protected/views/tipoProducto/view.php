<?php
$this->breadcrumbs=array(
	'Tipo Productos'=>array('index'),
	$model->id_tipo_producto,
);

$this->menu=array(
array('label'=>'Listar TipoProducto','url'=>array('index')),
array('label'=>'Crear TipoProducto','url'=>array('create')),
array('label'=>'Actualizar TipoProducto','url'=>array('update','id'=>$model->id_tipo_producto)),
array('label'=>'Eliminar TipoProducto','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_producto),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administración de TipoProducto','url'=>array('admin')),
);
?>

<span  class="ez">Detallar TipoProducto #<?php echo $model->id_tipo_producto; ?></span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbDetailView',array(
    'data'=>$model,
    'attributes'=>array(
    	//	'id_tipo_producto',
		'tipo_producto',
		//'estatus',
        array(
            'label'=>'Estatus:',
            'value'=>$model->idEstatus->estatus_titulo,
        ),
    ),
    )); ?>
</div>
