<?php
$this->breadcrumbs=array(
	'Categoria Item Calificacions'=>array('index'),
	$model->id_categoria_item_calificacion=>array('view','id'=>$model->id_categoria_item_calificacion),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CategoriaItemCalificacion','url'=>array('index')),
	array('label'=>'Create CategoriaItemCalificacion','url'=>array('create')),
	array('label'=>'View CategoriaItemCalificacion','url'=>array('view','id'=>$model->id_categoria_item_calificacion)),
	array('label'=>'Manage CategoriaItemCalificacion','url'=>array('admin')),
	);
	?>

	<h1>Update CategoriaItemCalificacion <?php echo $model->id_categoria_item_calificacion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>