<?php
$this->breadcrumbs=array(
	'Juez Item Calificacions'=>array('index'),
	$model->id_juez_item_calificacion=>array('view','id'=>$model->id_juez_item_calificacion),
	'Update',
);

	$this->menu=array(
	array('label'=>'List JuezItemCalificacion','url'=>array('index')),
	array('label'=>'Create JuezItemCalificacion','url'=>array('create')),
	array('label'=>'View JuezItemCalificacion','url'=>array('view','id'=>$model->id_juez_item_calificacion)),
	array('label'=>'Manage JuezItemCalificacion','url'=>array('admin')),
	);
	?>

	<h1>Update JuezItemCalificacion <?php echo $model->id_juez_item_calificacion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>