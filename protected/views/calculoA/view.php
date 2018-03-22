<?php
$this->breadcrumbs=array(
	'Calculo As'=>array('index'),
	$model->id_calculo_a,
);

$this->menu=array(
array('label'=>'List CalculoA','url'=>array('index')),
array('label'=>'Create CalculoA','url'=>array('create')),
array('label'=>'Update CalculoA','url'=>array('update','id'=>$model->id_calculo_a)),
array('label'=>'Delete CalculoA','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_calculo_a),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CalculoA','url'=>array('admin')),
);
?>

<h1>View CalculoA #<?php echo $model->id_calculo_a; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_calculo_a',
		'calculo_a',
		'estatus',
),
)); ?>
