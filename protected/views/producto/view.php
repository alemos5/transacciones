<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->id_producto,
);

$this->menu=array(
array('label'=>'Listar Producto','url'=>array('index')),
array('label'=>'Crear Producto','url'=>array('create')),
array('label'=>'Actualizar Producto','url'=>array('update','id'=>$model->id_producto)),
array('label'=>'Eliminar Producto','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_producto),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administración de Producto','url'=>array('admin')),
);
?>

<span  class="ez">Detallar Producto #<?php echo $model->id_producto; ?></span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbDetailView',array(
    'data'=>$model,
    'attributes'=>array(
    		'id_producto',
		//'id_tipo_producto',
        array(
            'label'=>'Tipo Producto:',
            'value'=>$model->idTipoProducto->tipo_producto,
        ),
		'producto',
		'descripcion',
		//'estatus',
        array(
            'label'=>'Estatus:',
            'value'=>$model->idEstatus->estatus_titulo,
        ),
		//'id_usuario_registro',
        //'fecha_registro',
        //'id_usuario_modifica',
        //'fecha_modifica',
        //'img',
    ),
    )); ?>
</div>
