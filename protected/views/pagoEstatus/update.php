<?php
$this->breadcrumbs=array(
	'Payment Status'=>array('index'),
	$model->id_pago_estatus=>array('view','id'=>$model->id_pago_estatus),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Payment Status','url'=>array('index')),
	array('label'=>'Create Payment Status','url'=>array('create')),
	array('label'=>'View Payment Status','url'=>array('view','id'=>$model->id_pago_estatus)),
	array('label'=>'Manage Payment Status','url'=>array('admin')),
	);
	?>

	<h1>Update Payment Status <?php echo $model->id_pago_estatus; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>