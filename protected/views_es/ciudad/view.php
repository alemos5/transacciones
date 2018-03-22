<?php
$this->breadcrumbs=array(
	'Ciudads'=>array('index'),
	$model->id_ciudad,
);

$this->menu=array(
array('label'=>'List Ciudad','url'=>array('index')),
array('label'=>'Create Ciudad','url'=>array('create')),
array('label'=>'Update Ciudad','url'=>array('update','id'=>$model->id_ciudad)),
array('label'=>'Delete Ciudad','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_ciudad),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Ciudad','url'=>array('admin')),
);
?>

<h1>View Ciudad #<?php echo $model->id_ciudad; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_ciudad',
		'codigo_pais',
		'ciudad',
		'estatus',
),
)); ?>
