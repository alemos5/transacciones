<?php
$this->breadcrumbs=array(
	'Subscription status'=>array('index'),
	$model->id_estatu_inscripcion=>array('view','id'=>$model->id_estatu_inscripcion),
	'Update',
);

	$this->menu=array(
	array('label'=>'List  Subscription Status','url'=>array('index')),
	array('label'=>'Create  Subscription Status','url'=>array('create')),
	array('label'=>'View  Subscription Status','url'=>array('view','id'=>$model->id_estatu_inscripcion)),
	array('label'=>'Manage  Subscription Status','url'=>array('admin')),
	);
	?>

	<h1>Update  Subscription Status <?php echo $model->id_estatu_inscripcion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>