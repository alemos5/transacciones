<?php
$this->breadcrumbs=array(
	'Payment detail'=>array('index'),
	$model->id_pago_detalle,
);

$this->menu=array(
array('label'=>'List Payment detail','url'=>array('index')),
array('label'=>'Create Payment detail','url'=>array('create')),
array('label'=>'Update Payment detail','url'=>array('update','id'=>$model->id_pago_detalle)),
array('label'=>'Delete Payment detail','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pago_detalle),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Payment detail','url'=>array('admin')),
);
?>

<h1>View Payment detail #<?php echo $model->id_pago_detalle; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_pago_detalle',
		'id_pago',
		'id_tipo_pago',
		'id_categoria',
		'id_competencia',
		'id_usuario',
		'items',
		'monto',
),
)); ?>
