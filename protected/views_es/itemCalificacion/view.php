<?php
$this->breadcrumbs=array(
	'Item Calificacions'=>array('index'),
	$model->id_item_calificacion,
);

$this->menu=array(
array('label'=>'List ItemCalificacion','url'=>array('index')),
array('label'=>'Create ItemCalificacion','url'=>array('create')),
array('label'=>'Update ItemCalificacion','url'=>array('update','id'=>$model->id_item_calificacion)),
array('label'=>'Delete ItemCalificacion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_item_calificacion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ItemCalificacion','url'=>array('admin')),
);
?>

<h1>View ItemCalificacion #<?php echo $model->id_item_calificacion; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_item_calificacion',
		'item_calificacion',
		'estatus',
),
)); ?>
