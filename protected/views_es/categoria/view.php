<?php
$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	$model->id_categoria,
);

$this->menu=array(
array('label'=>'List Categoria','url'=>array('index')),
array('label'=>'Create Categoria','url'=>array('create')),
array('label'=>'Update Categoria','url'=>array('update','id'=>$model->id_categoria)),
array('label'=>'Delete Categoria','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_categoria),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Categoria','url'=>array('admin')),
);
?>

<h1>View Categoria #<?php echo $model->id_categoria; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_categoria',
		'categoria',
		'descripcion',
		'edad_min',
		'edad_max',
		'competidor_min',
		'competidor_max',
		'id_tipo_categoria',
		'id_bloque',
),
)); ?>
