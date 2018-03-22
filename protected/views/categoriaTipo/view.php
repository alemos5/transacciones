<?php
$this->breadcrumbs=array(
	'Category Type'=>array('index'),
	$model->id_categoria_tipo,
);

$this->menu=array(
array('label'=>'List Category Type','url'=>array('index')),
array('label'=>'Create Category Type','url'=>array('create')),
array('label'=>'Update Category Type','url'=>array('update','id'=>$model->id_categoria_tipo)),
array('label'=>'Delete Category Type','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_categoria_tipo),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Category Type','url'=>array('admin')),
);
?>

<h1>View Category Type #<?php echo $model->id_categoria_tipo; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_categoria_tipo',
		'categoria_tipo',
		'estatus',
),
)); ?>
