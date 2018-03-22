<?php
$this->breadcrumbs=array(
	'Municipality'=>array('index'),
	$model->id_municipio,
);

$this->menu=array(
array('label'=>'List municipality','url'=>array('index')),
array('label'=>'Create municipality','url'=>array('create')),
array('label'=>'Update municipality','url'=>array('update','id'=>$model->id_municipio)),
array('label'=>'Delete municipality','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_municipio),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage municipality','url'=>array('admin')),
);
?>

<h1>View municipality #<?php echo $model->id_municipio; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_municipio',
		'id_estado',
		'nombre',
		'estatus',
),
)); ?>
