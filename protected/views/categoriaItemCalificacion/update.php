<?php
$this->breadcrumbs=array(
	'Item qualifications category'=>array('index'),
	$model->id_categoria_item_calificacion=>array('view','id'=>$model->id_categoria_item_calificacion),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Item qualifications category','url'=>array('index')),
	array('label'=>'Create Item qualifications category','url'=>array('create')),
	array('label'=>'View Item qualifications category','url'=>array('view','id'=>$model->id_categoria_item_calificacion)),
	array('label'=>'Manage Item qualifications category','url'=>array('admin')),
	);
	?>

	<h1>Update  Item qualifications category <?php echo $model->id_categoria_item_calificacion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>