<?php
$this->breadcrumbs=array(
	'Estatu Inscripcions'=>array('index'),
	$model->id_estatu_inscripcion=>array('view','id'=>$model->id_estatu_inscripcion),
	'Update',
);

	$this->menu=array(
	array('label'=>'List EstatuInscripcion','url'=>array('index')),
	array('label'=>'Create EstatuInscripcion','url'=>array('create')),
	array('label'=>'View EstatuInscripcion','url'=>array('view','id'=>$model->id_estatu_inscripcion)),
	array('label'=>'Manage EstatuInscripcion','url'=>array('admin')),
	);
	?>

	<h1>Update EstatuInscripcion <?php echo $model->id_estatu_inscripcion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>