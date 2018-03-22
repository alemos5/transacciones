<?php
$this->breadcrumbs=array(
	'Bloques'=>array('index'),
	$model->id_bloque,
);

$this->menu=array(
array('label'=>'List Bloque','url'=>array('index')),
array('label'=>'Create Bloque','url'=>array('create')),
array('label'=>'Update Bloque','url'=>array('update','id'=>$model->id_bloque)),
array('label'=>'Delete Bloque','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_bloque),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Bloque','url'=>array('admin')),
);
?>

<h1>View Bloque #<?php echo $model->id_bloque; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_bloque',
		'bloque',
		'estatus',
),
)); ?>
