<?php
$this->breadcrumbs=array(
	'Calificacions'=>array('index'),
	$model->id_calificacion,
);

$this->menu=array(
array('label'=>'List Calificacion','url'=>array('index')),
array('label'=>'Create Calificacion','url'=>array('create')),
array('label'=>'Update Calificacion','url'=>array('update','id'=>$model->id_calificacion)),
array('label'=>'Delete Calificacion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_calificacion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Calificacion','url'=>array('admin')),
);
?>

<h1>View Calificacion #<?php echo $model->id_calificacion; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_calificacion',
		'id_categoria_item_calificacion',
		'rango_max',
		'rango_min',
),
)); ?>
