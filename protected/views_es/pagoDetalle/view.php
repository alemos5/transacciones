<?php
$this->breadcrumbs=array(
	'Pago Detalles'=>array('index'),
	$model->id_pago_detalle,
);

$this->menu=array(
array('label'=>'List PagoDetalle','url'=>array('index')),
array('label'=>'Create PagoDetalle','url'=>array('create')),
array('label'=>'Update PagoDetalle','url'=>array('update','id'=>$model->id_pago_detalle)),
array('label'=>'Delete PagoDetalle','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pago_detalle),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage PagoDetalle','url'=>array('admin')),
);
?>

<h1>View PagoDetalle #<?php echo $model->id_pago_detalle; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_pago_detalle',
		'id_pago',
		'id_tipo_pago',
		'id_categoria',
		'id_competencia',
		'id_usuario',
		'items',
		'monto',
),
)); ?>
