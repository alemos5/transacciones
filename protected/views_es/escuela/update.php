<?php
$this->breadcrumbs=array(
	'Escuelas'=>array('index'),
	$model->id_escuela=>array('view','id'=>$model->id_escuela),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Escuela','url'=>array('index')),
	array('label'=>'Create Escuela','url'=>array('create')),
	array('label'=>'View Escuela','url'=>array('view','id'=>$model->id_escuela)),
	array('label'=>'Manage Escuela','url'=>array('admin')),
	);
	?>

	<h1>Update Escuela <?php echo $model->id_escuela; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>