<?php
$this->breadcrumbs=array(
	'Soportes'=>array('index'),
	$model->id_soporte,
);

$this->menu=array(
array('label'=>'List Soporte','url'=>array('index')),
array('label'=>'Create Soporte','url'=>array('create')),
array('label'=>'Update Soporte','url'=>array('update','id'=>$model->id_soporte)),
array('label'=>'Delete Soporte','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_soporte),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Soporte','url'=>array('admin')),
);
?>

<h1>View Soporte #<?php echo $model->id_soporte; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_soporte',
		'enlace',
		'soporte',
		'estatus',
),
)); ?>
