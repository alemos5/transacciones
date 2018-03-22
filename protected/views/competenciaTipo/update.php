<?php
$this->breadcrumbs=array(
	'Competence Type'=>array('index'),
	$model->id_competencia_tipo=>array('view','id'=>$model->id_competencia_tipo),
	'Update',
);

	$this->menu=array(
	array('label'=>'List  Competence Type','url'=>array('index')),
	array('label'=>'Create  Competence Type','url'=>array('create')),
	array('label'=>'View  Competence Type','url'=>array('view','id'=>$model->id_competencia_tipo)),
	array('label'=>'Manage  Competence Type','url'=>array('admin')),
	);
	?>

	<h1>Update  Competence Type <?php echo $model->id_competencia_tipo; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>