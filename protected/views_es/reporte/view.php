<?php
$this->breadcrumbs=array(
	'Reportes'=>array('index'),
	$model->id_reporte,
);

$this->menu=array(
array('label'=>'List Reporte','url'=>array('index')),
array('label'=>'Create Reporte','url'=>array('create')),
array('label'=>'Update Reporte','url'=>array('update','id'=>$model->id_reporte)),
array('label'=>'Delete Reporte','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_reporte),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Reporte','url'=>array('admin')),
);
?>

<h1>View Reporte #<?php echo $model->id_reporte; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_reporte',
		'reporte',
		'tipo',
		'estatus',
),
)); ?>
