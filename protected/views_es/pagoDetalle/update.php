<?php
$this->breadcrumbs=array(
	'Pago Detalles'=>array('index'),
	$model->id_pago_detalle=>array('view','id'=>$model->id_pago_detalle),
	'Update',
);

	$this->menu=array(
	array('label'=>'List PagoDetalle','url'=>array('index')),
	array('label'=>'Create PagoDetalle','url'=>array('create')),
	array('label'=>'View PagoDetalle','url'=>array('view','id'=>$model->id_pago_detalle)),
	array('label'=>'Manage PagoDetalle','url'=>array('admin')),
	);
	?>

	<h1>Update PagoDetalle <?php echo $model->id_pago_detalle; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>