<?php
$this->breadcrumbs=array(
	'Competencia Tipos'=>array('index'),
	$model->id_competencia_tipo=>array('view','id'=>$model->id_competencia_tipo),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CompetenciaTipo','url'=>array('index')),
	array('label'=>'Create CompetenciaTipo','url'=>array('create')),
	array('label'=>'View CompetenciaTipo','url'=>array('view','id'=>$model->id_competencia_tipo)),
	array('label'=>'Manage CompetenciaTipo','url'=>array('admin')),
	);
	?>

	<h1>Update CompetenciaTipo <?php echo $model->id_competencia_tipo; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>