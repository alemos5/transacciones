<?php
$this->breadcrumbs=array(
	'Juez Inscripcions'=>array('index'),
	$model->id_juez_inscripcion=>array('view','id'=>$model->id_juez_inscripcion),
	'Update',
);

	$this->menu=array(
	array('label'=>'List JuezInscripcion','url'=>array('index')),
	array('label'=>'Create JuezInscripcion','url'=>array('create')),
	array('label'=>'View JuezInscripcion','url'=>array('view','id'=>$model->id_juez_inscripcion)),
	array('label'=>'Manage JuezInscripcion','url'=>array('admin')),
	);
	?>

	<h1>Update JuezInscripcion <?php echo $model->id_juez_inscripcion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>