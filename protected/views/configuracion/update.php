<?php
$this->breadcrumbs=array(
	'Configuracions'=>array('index'),
	$model->id_configuracion=>array('view','id'=>$model->id_configuracion),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Configuracion','url'=>array('index')),
	array('label'=>'Create Configuracion','url'=>array('create')),
	array('label'=>'View Configuracion','url'=>array('view','id'=>$model->id_configuracion)),
	array('label'=>'Manage Configuracion','url'=>array('admin')),
	);
	?>

	<h1>Update Configuracion <?php echo $model->id_configuracion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>