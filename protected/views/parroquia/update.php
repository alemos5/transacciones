<?php
$this->breadcrumbs=array(
	'Parish'=>array('index'),
	$model->id_parroquia=>array('view','id'=>$model->id_parroquia),
	'Update',
);

	$this->menu=array(
	array('label'=>'List parish','url'=>array('index')),
	array('label'=>'Create parish','url'=>array('create')),
	array('label'=>'View parish','url'=>array('view','id'=>$model->id_parroquia)),
	array('label'=>'Manage parish','url'=>array('admin')),
	);
	?>

	<h1>Update parish <?php echo $model->id_parroquia; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>