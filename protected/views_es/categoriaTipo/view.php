<?php
$this->breadcrumbs=array(
	'Categoria Tipos'=>array('index'),
	$model->id_categoria_tipo,
);

$this->menu=array(
array('label'=>'List CategoriaTipo','url'=>array('index')),
array('label'=>'Create CategoriaTipo','url'=>array('create')),
array('label'=>'Update CategoriaTipo','url'=>array('update','id'=>$model->id_categoria_tipo)),
array('label'=>'Delete CategoriaTipo','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_categoria_tipo),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage CategoriaTipo','url'=>array('admin')),
);
?>

<h1>View CategoriaTipo #<?php echo $model->id_categoria_tipo; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_categoria_tipo',
		'categoria_tipo',
		'estatus',
),
)); ?>
