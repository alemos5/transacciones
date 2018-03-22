<?php
$this->breadcrumbs=array(
	'Cotizacion Estatuses'=>array('index'),
	$model->id_cotizacion_estatus,
);

$this->menu=array(
array('label'=>'List CotizacionEstatus','url'=>array('index')),
array('label'=>'Create CotizacionEstatus','url'=>array('create')),
array('label'=>'Update CotizacionEstatus','url'=>array('update','id'=>$model->id_cotizacion_estatus)),
array('label'=>'Delete CotizacionEstatus','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cotizacion_estatus),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CotizacionEstatus','url'=>array('admin')),
);
?>

<h1>View CotizacionEstatus #<?php echo $model->id_cotizacion_estatus; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_cotizacion_estatus',
		'cotizacion_estatus',
		'estatus',
),
)); ?>
