<?php
$this->breadcrumbs=array(
	'Competitor Pass'=>array('index'),
	$model->id_pase_competidor=>array('view','id'=>$model->id_pase_competidor),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Competitor Pass','url'=>array('index')),
	array('label'=>'Create Competitor Pass','url'=>array('create')),
	array('label'=>'View Competitor Pass','url'=>array('view','id'=>$model->id_pase_competidor)),
	array('label'=>'Manage Competitor Pass','url'=>array('admin')),
	);
	?>

	<h1>Update Competitor Pass <?php echo $model->id_pase_competidor; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>