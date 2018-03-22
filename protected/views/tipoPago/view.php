<?php
$this->breadcrumbs=array(
	'Payment Method'=>array('index'),
	$model->id_tipo_pago,
);

$this->menu=array(
array('label'=>'List Payment Method','url'=>array('index')),
array('label'=>'Create Payment Method','url'=>array('create')),
array('label'=>'Update Payment Method','url'=>array('update','id'=>$model->id_tipo_pago)),
array('label'=>'Delete Payment Method','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_pago),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Payment Method','url'=>array('admin')),
);
?>

<h1>View Payment Method #<?php echo $model->id_tipo_pago; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_tipo_pago',
		'tipo_pago',
),
)); ?>
