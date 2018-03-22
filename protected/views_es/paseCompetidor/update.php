<?php
$this->breadcrumbs=array(
	'Pase Competidors'=>array('index'),
	$model->id_pase_competidor=>array('view','id'=>$model->id_pase_competidor),
	'Update',
);

	$this->menu=array(
	array('label'=>'List PaseCompetidor','url'=>array('index')),
	array('label'=>'Create PaseCompetidor','url'=>array('create')),
	array('label'=>'View PaseCompetidor','url'=>array('view','id'=>$model->id_pase_competidor)),
	array('label'=>'Manage PaseCompetidor','url'=>array('admin')),
	);
	?>

	<h1>Update PaseCompetidor <?php echo $model->id_pase_competidor; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>