<?php
$this->breadcrumbs=array(
	'Categoria Tipos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CategoriaTipo','url'=>array('index')),
array('label'=>'Manage CategoriaTipo','url'=>array('admin')),
);
?>

<h1>Create CategoriaTipo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>