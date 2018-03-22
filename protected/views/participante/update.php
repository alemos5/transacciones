<?php
$this->breadcrumbs=array(
	'Participants'=>array('index'),
	$model->id_participante=>array('view','id'=>$model->id_participante),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Participant','url'=>array('index')),
	array('label'=>'Create Participant','url'=>array('create')),
	array('label'=>'View Participant','url'=>array('view','id'=>$model->id_participante)),
	array('label'=>'Manage Participant','url'=>array('admin')),
	);
	?>

	<h1>Update Participant <?php echo $model->id_participante; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>