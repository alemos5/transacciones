<?php
$this->breadcrumbs=array(
	'Configuracions'=>array('index'),
	$model->id_configuracion,
);

$this->menu=array(
array('label'=>'List Configuracion','url'=>array('index')),
array('label'=>'Create Configuracion','url'=>array('create')),
array('label'=>'Update Configuracion','url'=>array('update','id'=>$model->id_configuracion)),
array('label'=>'Delete Configuracion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_configuracion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Configuracion','url'=>array('admin')),
);
?>

<h1>View Configuracion #<?php echo $model->id_configuracion; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_configuracion',
		'itemes',
		'configuracion',
		'estatus',
),
)); ?>
