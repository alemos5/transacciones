<?php
$this->breadcrumbs=array(
	'Ordenes Consolidaciones'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List OrdenesConsolidaciones','url'=>array('index')),
array('label'=>'Create OrdenesConsolidaciones','url'=>array('create')),
array('label'=>'Update OrdenesConsolidaciones','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete OrdenesConsolidaciones','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage OrdenesConsolidaciones','url'=>array('admin')),
);
?>

<h1>View OrdenesConsolidaciones #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'id_con',
		'id_orden',
),
)); ?>
