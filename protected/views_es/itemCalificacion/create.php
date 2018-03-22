<?php
$this->breadcrumbs=array(
	'Item Calificacions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ItemCalificacion','url'=>array('index')),
array('label'=>'Manage ItemCalificacion','url'=>array('admin')),
);
?>

<h1>Create ItemCalificacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>