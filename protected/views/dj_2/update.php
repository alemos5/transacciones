<?php
$this->breadcrumbs=array(
	'Djs'=>array('index'),
	$model->id_dj=>array('view','id'=>$model->id_dj),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Dj','url'=>array('index')),
	array('label'=>'Create Dj','url'=>array('create')),
	array('label'=>'View Dj','url'=>array('view','id'=>$model->id_dj)),
	array('label'=>'Manage Dj','url'=>array('admin')),
	);
	?>

	<h1>Update Dj <?php echo $model->id_dj; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>