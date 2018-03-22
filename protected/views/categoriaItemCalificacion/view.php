<?php
$this->breadcrumbs=array(
	'Item qualifications category'=>array('index'),
	$model->id_categoria_item_calificacion,
);

$this->menu=array(
array('label'=>'List Item qualifications category','url'=>array('index')),
array('label'=>'Create  Item qualifications category','url'=>array('create')),
array('label'=>'Update  Item qualifications category','url'=>array('update','id'=>$model->id_categoria_item_calificacion)),
array('label'=>'Delete  Item qualifications category','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_categoria_item_calificacion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage  Item qualifications category','url'=>array('admin')),
);
?>

<h1>View Item qualifications categorys #<?php echo $model->id_categoria_item_calificacion; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_categoria_item_calificacion',
		'id_categoria',
		'id_item_calificacion',
		'rango_min',
		'rango_max',
		'estatus',
),
)); ?>
