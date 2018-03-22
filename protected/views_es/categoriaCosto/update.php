<?php
$this->breadcrumbs=array(
	'Categoria Costos'=>array('index'),
	$model->id_categoria_costo=>array('view','id'=>$model->id_categoria_costo),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CategoriaCosto','url'=>array('index')),
	array('label'=>'Create CategoriaCosto','url'=>array('create')),
	array('label'=>'View CategoriaCosto','url'=>array('view','id'=>$model->id_categoria_costo)),
	array('label'=>'Manage CategoriaCosto','url'=>array('admin')),
	);
	?>

	<h1>Update CategoriaCosto <?php echo $model->id_categoria_costo; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>