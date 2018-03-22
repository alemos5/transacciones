<?php
$this->breadcrumbs=array(
	'Franquiciado Aprobacions'=>array('index'),
	$model->id_franquiciado_aprobacion=>array('view','id'=>$model->id_franquiciado_aprobacion),
	'Update',
);

	$this->menu=array(
	array('label'=>'List FranquiciadoAprobacion','url'=>array('index')),
	array('label'=>'Create FranquiciadoAprobacion','url'=>array('create')),
	array('label'=>'View FranquiciadoAprobacion','url'=>array('view','id'=>$model->id_franquiciado_aprobacion)),
	array('label'=>'Manage FranquiciadoAprobacion','url'=>array('admin')),
	);
	?>

	<h1>Update FranquiciadoAprobacion <?php echo $model->id_franquiciado_aprobacion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>