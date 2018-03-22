<?php
$this->breadcrumbs=array(
	'Juez Item Calificacions'=>array('index'),
	$model->id_juez_item_calificacion,
);

$this->menu=array(
array('label'=>'List JuezItemCalificacion','url'=>array('index')),
array('label'=>'Create JuezItemCalificacion','url'=>array('create')),
array('label'=>'Update JuezItemCalificacion','url'=>array('update','id'=>$model->id_juez_item_calificacion)),
array('label'=>'Delete JuezItemCalificacion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_juez_item_calificacion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage JuezItemCalificacion','url'=>array('admin')),
);
?>

<h1>View JuezItemCalificacion #<?php echo $model->id_juez_item_calificacion; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_juez_item_calificacion',
		'id_juez',
		'id_item_calificacion',
),
)); ?>
