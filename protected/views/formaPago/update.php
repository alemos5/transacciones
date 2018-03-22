<?php
$this->breadcrumbs=array(
	'Payment Method'=>array('index'),
	$model->id_forma_pago=>array('view','id'=>$model->id_forma_pago),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Payment Method','url'=>array('index')),
	array('label'=>'Create Payment Method','url'=>array('create')),
	array('label'=>'View Payment Method','url'=>array('view','id'=>$model->id_forma_pago)),
	array('label'=>'Manage Payment Method','url'=>array('admin')),
	);
	?>

	<h1>Update Payment Method <?php echo $model->id_forma_pago; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>