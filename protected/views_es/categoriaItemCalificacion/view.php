<?php
$this->breadcrumbs=array(
	'Categoria Item Calificacions'=>array('index'),
	$model->id_categoria_item_calificacion,
);

$this->menu=array(
array('label'=>'List CategoriaItemCalificacion','url'=>array('index')),
array('label'=>'Create CategoriaItemCalificacion','url'=>array('create')),
array('label'=>'Update CategoriaItemCalificacion','url'=>array('update','id'=>$model->id_categoria_item_calificacion)),
array('label'=>'Delete CategoriaItemCalificacion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_categoria_item_calificacion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CategoriaItemCalificacion','url'=>array('admin')),
);
?>

<h1>View CategoriaItemCalificacion #<?php echo $model->id_categoria_item_calificacion; ?></h1>

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
