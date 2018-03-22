<?php
$this->breadcrumbs=array(
	'Escuelas'=>array('index'),
	$model->id_escuela,
);

$this->menu=array(
array('label'=>'List Escuela','url'=>array('index')),
array('label'=>'Create Escuela','url'=>array('create')),
array('label'=>'Update Escuela','url'=>array('update','id'=>$model->id_escuela)),
array('label'=>'Delete Escuela','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_escuela),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Escuela','url'=>array('admin')),
);
?>

<h1>View Escuela #<?php echo $model->id_escuela; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_escuela',
		'escuela',
		'estatus',
),
)); ?>
