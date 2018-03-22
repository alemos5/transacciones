<?php
$this->breadcrumbs=array(
	'Forma Pagos'=>array('index'),
	$model->id_forma_pago,
);

$this->menu=array(
array('label'=>'List FormaPago','url'=>array('index')),
array('label'=>'Create FormaPago','url'=>array('create')),
array('label'=>'Update FormaPago','url'=>array('update','id'=>$model->id_forma_pago)),
array('label'=>'Delete FormaPago','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_forma_pago),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage FormaPago','url'=>array('admin')),
);
?>

<h1>View FormaPago #<?php echo $model->id_forma_pago; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_forma_pago',
		'forma_pago',
		'estatus',
),
)); ?>
