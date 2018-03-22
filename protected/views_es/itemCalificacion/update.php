<?php
$this->breadcrumbs=array(
	'Item Calificacions'=>array('index'),
	$model->id_item_calificacion=>array('view','id'=>$model->id_item_calificacion),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ItemCalificacion','url'=>array('index')),
	array('label'=>'Create ItemCalificacion','url'=>array('create')),
	array('label'=>'View ItemCalificacion','url'=>array('view','id'=>$model->id_item_calificacion)),
	array('label'=>'Manage ItemCalificacion','url'=>array('admin')),
	);
	?>

	<h1>Update ItemCalificacion <?php echo $model->id_item_calificacion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>