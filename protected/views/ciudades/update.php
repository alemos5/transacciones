<?php
$this->breadcrumbs=array(
	'Cities'=>array('index'),
	$model->id_ciudad=>array('view','id'=>$model->id_ciudad),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Cities','url'=>array('index')),
	array('label'=>'Create Cities','url'=>array('create')),
	array('label'=>'View Cities','url'=>array('view','id'=>$model->id_ciudad)),
	array('label'=>'Manage Cities','url'=>array('admin')),
	);
	?>

	<h1>Update Cities <?php echo $model->id_ciudad; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>