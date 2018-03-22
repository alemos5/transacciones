<?php
$this->breadcrumbs=array(
	'Competence Category'=>array('index'),
	$model->id_competencia_categoria=>array('view','id'=>$model->id_competencia_categoria),
	'Update',
);

	$this->menu=array(
	array('label'=>'List  Competence Category','url'=>array('index')),
	array('label'=>'Create  Competence Category','url'=>array('create')),
	array('label'=>'View  Competence Category','url'=>array('view','id'=>$model->id_competencia_categoria)),
	array('label'=>'Manage  Competence Category','url'=>array('admin')),
	);
	?>

	<h1>Update  Competence Category <?php echo $model->id_competencia_categoria; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>