<?php
$this->breadcrumbs=array(
	'City'=>array('index'),
	$model->id_ciudad,
);

$this->menu=array(
array('label'=>'List City','url'=>array('index')),
array('label'=>'Create City','url'=>array('create')),
array('label'=>'Update City','url'=>array('update','id'=>$model->id_ciudad)),
array('label'=>'Delete City','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_ciudad),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage City','url'=>array('admin')),
);
?>

<h1>View City #<?php echo $model->id_ciudad; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_ciudad',
		'codigo_pais',
		'ciudad',
		'estatus',
),
)); ?>
