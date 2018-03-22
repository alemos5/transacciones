<?php
$this->breadcrumbs=array(
	'Cotizacion Estatuses'=>array('index'),
	$model->id_cotizacion_estatus=>array('view','id'=>$model->id_cotizacion_estatus),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CotizacionEstatus','url'=>array('index')),
	array('label'=>'Create CotizacionEstatus','url'=>array('create')),
	array('label'=>'View CotizacionEstatus','url'=>array('view','id'=>$model->id_cotizacion_estatus)),
	array('label'=>'Manage CotizacionEstatus','url'=>array('admin')),
	);
	?>

	<h1>Update CotizacionEstatus <?php echo $model->id_cotizacion_estatus; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>