<?php
$this->breadcrumbs=array(
	'Tarifa Productos'=>array('index'),
	$model->id_tarifa_producto,
);

$this->menu=array(
array('label'=>'Listar TarifaProducto','url'=>array('index')),
array('label'=>'Crear TarifaProducto','url'=>array('create')),
array('label'=>'Actualizar TarifaProducto','url'=>array('update','id'=>$model->id_tarifa_producto)),
array('label'=>'Eliminar TarifaProducto','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tarifa_producto),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administración de TarifaProducto','url'=>array('admin')),
);
?>

<span  class="ez">Detallar TarifaProducto #<?php echo $model->id_tarifa_producto; ?></span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbDetailView',array(
    'data'=>$model,
    'attributes'=>array(
        //'id_tarifa_producto',
        array(
            'label'=>'País:',
            'value'=>$model->idPais->pais,
        ),
        array(
            'label'=>'Producto:',
            'value'=>$model->idProducto->producto,
        ),
		'tarifa_producto',
        array(
            'label'=>'Estatus:',
            'value'=>$model->idEstatus->estatus_titulo,
        ),
		//'id_pais',
		//'estatus',
        //'id_usuario_registro',
        //'fecha_registro',
        //'id_usuario_modifica',
        //'fecha_modifica',
    ),
    )); ?>
</div>
