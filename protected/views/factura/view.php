<?php
$this->breadcrumbs=array(
	'Facturas'=>array('index'),
	$model->id_fac,
);

$this->menu=array(
array('label'=>'List Factura','url'=>array('index')),
array('label'=>'Create Factura','url'=>array('create')),
array('label'=>'Update Factura','url'=>array('update','id'=>$model->id_fac)),
array('label'=>'Delete Factura','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_fac),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Factura','url'=>array('admin')),
);
?>

<h1>View Factura #<?php echo $model->id_fac; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_fac',
		'id_orden',
		'status',
		'tipo',
		'no_factura',
		'fecha',
		'observacion',
		'firma',
		'nombre',
		'direccion',
		'ciudad',
		'rif',
		'telefono',
),
)); ?>
