<?php
$this->breadcrumbs=array(
	'Competencias'=>array('index'),
	$model->id_copetencia,
);

$this->menu=array(
array('label'=>'List Competencia','url'=>array('index')),
array('label'=>'Create Competencia','url'=>array('create')),
array('label'=>'Update Competencia','url'=>array('update','id'=>$model->id_copetencia)),
array('label'=>'Delete Competencia','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_copetencia),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Competencia','url'=>array('admin')),
);
?>

<h1>View Competencia #<?php echo $model->id_copetencia; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_copetencia',
		'visible',
		'estatus',
		'img',
		'descripcion',
		'fecha_copetencia',
		'valor_competido',
),
)); ?>
