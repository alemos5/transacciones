<?php
$this->breadcrumbs=array(
	'Category Types'=>array('index'),
	$model->id_categoria_tipo=>array('view','id'=>$model->id_categoria_tipo),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Category Type','url'=>array('index')),
	array('label'=>'Create Category Type','url'=>array('create')),
	array('label'=>'View Category Type','url'=>array('view','id'=>$model->id_categoria_tipo)),
	array('label'=>'Manage Category Type','url'=>array('admin')),
	);
	?>

	<h1>Update Category Type <?php echo $model->id_categoria_tipo; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>