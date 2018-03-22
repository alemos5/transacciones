<?php
$this->breadcrumbs=array(
	'Categoria Tipos'=>array('index'),
	$model->id_categoria_tipo=>array('view','id'=>$model->id_categoria_tipo),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CategoriaTipo','url'=>array('index')),
	array('label'=>'Create CategoriaTipo','url'=>array('create')),
	array('label'=>'View CategoriaTipo','url'=>array('view','id'=>$model->id_categoria_tipo)),
	array('label'=>'Manage CategoriaTipo','url'=>array('admin')),
	);
	?>

	<h1>Update CategoriaTipo <?php echo $model->id_categoria_tipo; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>