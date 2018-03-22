<?php
$this->breadcrumbs=array(
	'Acreditados'=>array('index'),
	$model->id_acreditado,
);

$this->menu=array(
array('label'=>'List Acreditado','url'=>array('index')),
array('label'=>'Create Acreditado','url'=>array('create')),
array('label'=>'Update Acreditado','url'=>array('update','id'=>$model->id_acreditado)),
array('label'=>'Delete Acreditado','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_acreditado),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Acreditado','url'=>array('admin')),
);
?>

<h1>View Acreditado #<?php echo $model->id_acreditado; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_acreditado',
		'acreditado',
		'estatus',
),
)); ?>
