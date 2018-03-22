<?php
$this->breadcrumbs=array(
	'Ordenes Estatuses'=>array('index'),
	$model->id_orden_estatus,
);

$this->menu=array(
array('label'=>'List OrdenesEstatus','url'=>array('index')),
array('label'=>'Create OrdenesEstatus','url'=>array('create')),
array('label'=>'Update OrdenesEstatus','url'=>array('update','id'=>$model->id_orden_estatus)),
array('label'=>'Delete OrdenesEstatus','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_orden_estatus),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage OrdenesEstatus','url'=>array('admin')),
);
?>

<h1>View OrdenesEstatus #<?php echo $model->id_orden_estatus; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_orden_estatus',
		'ware_reciept',
		'estatus',
		'fecha_orden',
		'tipo',
),
)); ?>
