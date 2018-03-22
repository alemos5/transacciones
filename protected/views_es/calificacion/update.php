<?php
$this->breadcrumbs=array(
	'Calificacions'=>array('index'),
	$model->id_calificacion=>array('view','id'=>$model->id_calificacion),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Calificacion','url'=>array('index')),
	array('label'=>'Create Calificacion','url'=>array('create')),
	array('label'=>'View Calificacion','url'=>array('view','id'=>$model->id_calificacion)),
	array('label'=>'Manage Calificacion','url'=>array('admin')),
	);
	?>

	<h1>Update Calificacion <?php echo $model->id_calificacion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>