<?php
$this->breadcrumbs=array(
	'Calculo Pesos'=>array('index'),
	$model->id_calculo_peso,
);

$this->menu=array(
array('label'=>'List CalculoPeso','url'=>array('index')),
array('label'=>'Create CalculoPeso','url'=>array('create')),
array('label'=>'Update CalculoPeso','url'=>array('update','id'=>$model->id_calculo_peso)),
array('label'=>'Delete CalculoPeso','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_calculo_peso),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CalculoPeso','url'=>array('admin')),
);
?>

<h1>View CalculoPeso #<?php echo $model->id_calculo_peso; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_calculo_peso',
		'calculo_peso',
		'estatus',
),
)); ?>
