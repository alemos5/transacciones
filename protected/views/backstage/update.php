<?php
$this->breadcrumbs=array(
	'Backstages'=>array('index'),
	$model->id_backstage=>array('view','id'=>$model->id_backstage),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Backstage','url'=>array('index')),
	array('label'=>'Create Backstage','url'=>array('create')),
	array('label'=>'View Backstage','url'=>array('view','id'=>$model->id_backstage)),
	array('label'=>'Manage Backstage','url'=>array('admin')),
	);
	?>

	<h1>Update Backstage <?php echo $model->id_backstage; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>