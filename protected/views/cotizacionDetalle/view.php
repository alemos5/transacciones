<?php
$this->breadcrumbs=array(
	'Cotizacion Detalles'=>array('index'),
	$model->id_cotizacion_detalle,
);

$this->menu=array(
array('label'=>'List CotizacionDetalle','url'=>array('index')),
array('label'=>'Create CotizacionDetalle','url'=>array('create')),
array('label'=>'Update CotizacionDetalle','url'=>array('update','id'=>$model->id_cotizacion_detalle)),
array('label'=>'Delete CotizacionDetalle','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cotizacion_detalle),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CotizacionDetalle','url'=>array('admin')),
);
?>

<h1>View CotizacionDetalle #<?php echo $model->id_cotizacion_detalle; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_cotizacion_detalle',
		'id_cotizacion',
		'id_servicio',
		'cant_servicio',
		'precio_unitario',
		'precio_total',
		'estatus',
),
)); ?>
