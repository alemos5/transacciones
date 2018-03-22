<?php
$this->breadcrumbs=array(
	'Cotizacion Detalles'=>array('index'),
	$model->id_cotizacion_detalle=>array('view','id'=>$model->id_cotizacion_detalle),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CotizacionDetalle','url'=>array('index')),
	array('label'=>'Create CotizacionDetalle','url'=>array('create')),
	array('label'=>'View CotizacionDetalle','url'=>array('view','id'=>$model->id_cotizacion_detalle)),
	array('label'=>'Manage CotizacionDetalle','url'=>array('admin')),
	);
	?>

	<h1>Update CotizacionDetalle <?php echo $model->id_cotizacion_detalle; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>