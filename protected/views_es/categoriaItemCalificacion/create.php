<?php
$this->breadcrumbs=array(
	'Categoria Item Calificacions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CategoriaItemCalificacion','url'=>array('index')),
array('label'=>'Manage CategoriaItemCalificacion','url'=>array('admin')),
);
?>

<h1>Create CategoriaItemCalificacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>