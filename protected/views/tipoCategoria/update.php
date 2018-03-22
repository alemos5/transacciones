<?php
$this->breadcrumbs=array(
	'Category Type'=>array('index'),
	$model->id_tipo_categoria=>array('view','id'=>$model->id_tipo_categoria),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Category Type','url'=>array('index')),
	array('label'=>'Create Category Type','url'=>array('create')),
	array('label'=>'View Category Type','url'=>array('view','id'=>$model->id_tipo_categoria)),
	array('label'=>'Manage Category Type','url'=>array('admin')),
	);
	?>

	<h1>Update Category Type <?php echo $model->id_tipo_categoria; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>