<?php
$this->breadcrumbs=array(
	'City'=>array('index'),
	$model->id_ciudad=>array('view','id'=>$model->id_ciudad),
	'Update',
);

	$this->menu=array(
	array('label'=>'List City','url'=>array('index')),
	array('label'=>'Create City','url'=>array('create')),
	array('label'=>'View City','url'=>array('view','id'=>$model->id_ciudad)),
	array('label'=>'Manage City','url'=>array('admin')),
	);
	?>

	<h1>Update City <?php echo $model->id_ciudad; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>