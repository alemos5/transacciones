<?php
$this->breadcrumbs=array(
	'Competencia Categorias'=>array('index'),
	$model->id_competencia_categoria,
);

$this->menu=array(
array('label'=>'List CompetenciaCategoria','url'=>array('index')),
array('label'=>'Create CompetenciaCategoria','url'=>array('create')),
array('label'=>'Update CompetenciaCategoria','url'=>array('update','id'=>$model->id_competencia_categoria)),
array('label'=>'Delete CompetenciaCategoria','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_competencia_categoria),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CompetenciaCategoria','url'=>array('admin')),
);
?>

<h1>View CompetenciaCategoria #<?php echo $model->id_competencia_categoria; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_competencia_categoria',
		'id_copetencia',
		'costo',
		'id_categoria',
),
)); ?>
