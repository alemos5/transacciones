<?php
$this->breadcrumbs=array(
	'Ciudades'=>array('index'),
	$model->id_ciudad,
);

$this->menu=array(
array('label'=>'List Ciudades','url'=>array('index')),
array('label'=>'Create Ciudades','url'=>array('create')),
array('label'=>'Update Ciudades','url'=>array('update','id'=>$model->id_ciudad)),
array('label'=>'Delete Ciudades','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_ciudad),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Ciudades','url'=>array('admin')),
);
?>

<h1>View Ciudades #<?php echo $model->id_ciudad; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_ciudad',
		'id_estado',
		'ciudad',
		'capital',
),
)); ?>
