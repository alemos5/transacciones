<?php
$this->breadcrumbs=array(
	'Acreditados'=>array('index'),
	$model->id_acreditado=>array('view','id'=>$model->id_acreditado),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Acreditado','url'=>array('index')),
	array('label'=>'Create Acreditado','url'=>array('create')),
	array('label'=>'View Acreditado','url'=>array('view','id'=>$model->id_acreditado)),
	array('label'=>'Manage Acreditado','url'=>array('admin')),
	);
	?>

	<h1>Update Acreditado <?php echo $model->id_acreditado; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>