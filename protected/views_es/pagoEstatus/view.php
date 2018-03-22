<?php
$this->breadcrumbs=array(
	'Pago Estatuses'=>array('index'),
	$model->id_pago_estatus,
);

$this->menu=array(
array('label'=>'List PagoEstatus','url'=>array('index')),
array('label'=>'Create PagoEstatus','url'=>array('create')),
array('label'=>'Update PagoEstatus','url'=>array('update','id'=>$model->id_pago_estatus)),
array('label'=>'Delete PagoEstatus','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pago_estatus),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage PagoEstatus','url'=>array('admin')),
);
?>

<h1>View PagoEstatus #<?php echo $model->id_pago_estatus; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_pago_estatus',
		'pago_estatus',
		'descripcion',
		'estatus',
),
)); ?>
