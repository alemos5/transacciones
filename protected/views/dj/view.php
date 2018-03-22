<?php
$this->breadcrumbs=array(
	'Djs'=>array('index'),
	$model->id_dj,
);

$this->menu=array(
array('label'=>'List Dj','url'=>array('index')),
array('label'=>'Create Dj','url'=>array('create')),
array('label'=>'Update Dj','url'=>array('update','id'=>$model->id_dj)),
array('label'=>'Delete Dj','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_dj),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Dj','url'=>array('admin')),
);
?>

<h1>View Dj #<?php echo $model->id_dj; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_dj',
		'opcion',
		'estatus',
),
)); ?>
