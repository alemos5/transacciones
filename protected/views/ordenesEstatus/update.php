<?php
$this->breadcrumbs=array(
	'Ordenes Estatuses'=>array('index'),
	$model->id_orden_estatus=>array('view','id'=>$model->id_orden_estatus),
	'Update',
);

	$this->menu=array(
	array('label'=>'List OrdenesEstatus','url'=>array('index')),
	array('label'=>'Create OrdenesEstatus','url'=>array('create')),
	array('label'=>'View OrdenesEstatus','url'=>array('view','id'=>$model->id_orden_estatus)),
	array('label'=>'Manage OrdenesEstatus','url'=>array('admin')),
	);
	?>

	<h1>Update OrdenesEstatus <?php echo $model->id_orden_estatus; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>