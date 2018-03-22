<?php
$this->breadcrumbs=array(
	'Soportes'=>array('index'),
	$model->id_soporte=>array('view','id'=>$model->id_soporte),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Soporte','url'=>array('index')),
	array('label'=>'Create Soporte','url'=>array('create')),
	array('label'=>'View Soporte','url'=>array('view','id'=>$model->id_soporte)),
	array('label'=>'Manage Soporte','url'=>array('admin')),
	);
	?>

	<h1>Update Soporte <?php echo $model->id_soporte; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>