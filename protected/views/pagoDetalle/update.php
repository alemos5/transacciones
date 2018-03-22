<?php
$this->breadcrumbs=array(
	'Payment detail'=>array('index'),
	$model->id_pago_detalle=>array('view','id'=>$model->id_pago_detalle),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Payment detail','url'=>array('index')),
	array('label'=>'Create Payment detail','url'=>array('create')),
	array('label'=>'View Payment detail','url'=>array('view','id'=>$model->id_pago_detalle)),
	array('label'=>'Manage Payment detail','url'=>array('admin')),
	);
	?>

	<h1>Update Payment detail <?php echo $model->id_pago_detalle; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>