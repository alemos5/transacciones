<?php
$this->breadcrumbs=array(
	'Competencia Categorias'=>array('index'),
	$model->id_competencia_categoria=>array('view','id'=>$model->id_competencia_categoria),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CompetenciaCategoria','url'=>array('index')),
	array('label'=>'Create CompetenciaCategoria','url'=>array('create')),
	array('label'=>'View CompetenciaCategoria','url'=>array('view','id'=>$model->id_competencia_categoria)),
	array('label'=>'Manage CompetenciaCategoria','url'=>array('admin')),
	);
	?>

	<h1>Update CompetenciaCategoria <?php echo $model->id_competencia_categoria; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>