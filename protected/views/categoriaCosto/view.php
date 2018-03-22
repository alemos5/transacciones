<?php
$this->breadcrumbs=array(
	'Cost Category'=>array('index'),
	$model->id_categoria_costo,
);

$this->menu=array(
array('label'=>'List Cost Category','url'=>array('index')),
array('label'=>'Create  Cost Category','url'=>array('create')),
array('label'=>'Update  Cost Category','url'=>array('update','id'=>$model->id_categoria_costo)),
array('label'=>'Delete  Cost Category','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_categoria_costo),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage  Cost Category','url'=>array('admin')),
);
?>

<h1>View Cost Category #<?php echo $model->id_categoria_costo; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_categoria_costo',
		'id_competencia_categoria',
		'fecha',
		'costo',
		'estatus',
),
)); ?>
