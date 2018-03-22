<?php
$this->breadcrumbs=array(
	'Calificacions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Calificacion','url'=>array('index')),
array('label'=>'Manage Calificacion','url'=>array('admin')),
);
?>

<h1>Create Calificacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>