<?php
$this->breadcrumbs=array(
	'Categoria Costos'=>array('index'),
	$model->id_categoria_costo,
);

$this->menu=array(
array('label'=>'List CategoriaCosto','url'=>array('index')),
array('label'=>'Create CategoriaCosto','url'=>array('create')),
array('label'=>'Update CategoriaCosto','url'=>array('update','id'=>$model->id_categoria_costo)),
array('label'=>'Delete CategoriaCosto','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_categoria_costo),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CategoriaCosto','url'=>array('admin')),
);
?>

<h1>View CategoriaCosto #<?php echo $model->id_categoria_costo; ?></h1>

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
