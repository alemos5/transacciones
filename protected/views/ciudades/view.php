<?php
$this->breadcrumbs=array(
	'Cities'=>array('index'),
	$model->id_ciudad,
);

$this->menu=array(
array('label'=>'List Cities','url'=>array('index')),
array('label'=>'Create Cities','url'=>array('create')),
array('label'=>'Update Cities','url'=>array('update','id'=>$model->id_ciudad)),
array('label'=>'Delete Cities','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_ciudad),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Cities','url'=>array('admin')),
);
?>

<h1>View Cities #<?php echo $model->id_ciudad; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_ciudad',
		'id_estado',
		'ciudad',
		'capital',
),
)); ?>
