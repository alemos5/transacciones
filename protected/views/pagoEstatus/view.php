<?php
$this->breadcrumbs=array(
	'Payment Status'=>array('index'),
	$model->id_pago_estatus,
);

$this->menu=array(
array('label'=>'List Payment Status','url'=>array('index')),
array('label'=>'Create Payment Status','url'=>array('create')),
array('label'=>'Update Payment Status','url'=>array('update','id'=>$model->id_pago_estatus)),
array('label'=>'Delete Payment Status','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pago_estatus),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Payment Status','url'=>array('admin')),
);
?>

<h1>View Payment Status #<?php echo $model->id_pago_estatus; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_pago_estatus',
		'pago_estatus',
		'descripcion',
		'estatus',
),
)); ?>
