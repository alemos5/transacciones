<?php
$this->breadcrumbs=array(
	'Categoria Costos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CategoriaCosto','url'=>array('index')),
array('label'=>'Manage CategoriaCosto','url'=>array('admin')),
);
?>

<h1>Create CategoriaCosto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>