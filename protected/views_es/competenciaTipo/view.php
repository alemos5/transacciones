<?php
$this->breadcrumbs=array(
	'Competencia Tipos'=>array('index'),
	$model->id_competencia_tipo,
);

$this->menu=array(
array('label'=>'List CompetenciaTipo','url'=>array('index')),
array('label'=>'Create CompetenciaTipo','url'=>array('create')),
array('label'=>'Update CompetenciaTipo','url'=>array('update','id'=>$model->id_competencia_tipo)),
array('label'=>'Delete CompetenciaTipo','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_competencia_tipo),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CompetenciaTipo','url'=>array('admin')),
);
?>

<h1>View CompetenciaTipo #<?php echo $model->id_competencia_tipo; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_competencia_tipo',
		'id_copetencia',
		'id_tipo_categoria',
		'costo',
		'estatus',
),
)); ?>
