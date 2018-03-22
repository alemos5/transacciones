<?php
$this->breadcrumbs=array(
	'Pago Estatuses'=>array('index'),
	$model->id_pago_estatus=>array('view','id'=>$model->id_pago_estatus),
	'Update',
);

	$this->menu=array(
	array('label'=>'List PagoEstatus','url'=>array('index')),
	array('label'=>'Create PagoEstatus','url'=>array('create')),
	array('label'=>'View PagoEstatus','url'=>array('view','id'=>$model->id_pago_estatus)),
	array('label'=>'Manage PagoEstatus','url'=>array('admin')),
	);
	?>

	<h1>Update PagoEstatus <?php echo $model->id_pago_estatus; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>