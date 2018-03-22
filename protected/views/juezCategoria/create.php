<?php
$this->breadcrumbs=array(
	'Juez Categorias'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List JuezCategoria','url'=>array('index')),
array('label'=>'Manage JuezCategoria','url'=>array('admin')),
);
?>

<h1>Create JuezCategoria</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>