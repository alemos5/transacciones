<?php
$this->breadcrumbs=array(
	'Tipo Pagos'=>array('index'),
	$model->id_tipo_pago,
);

$this->menu=array(
array('label'=>'List TipoPago','url'=>array('index')),
array('label'=>'Create TipoPago','url'=>array('create')),
array('label'=>'Update TipoPago','url'=>array('update','id'=>$model->id_tipo_pago)),
array('label'=>'Delete TipoPago','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_pago),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TipoPago','url'=>array('admin')),
);
?>

<h1>View TipoPago #<?php echo $model->id_tipo_pago; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_tipo_pago',
		'tipo_pago',
),
)); ?>
