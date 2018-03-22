<?php
$this->breadcrumbs=array(
	'Soportes'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Soporte','url'=>array('index')),
array('label'=>'Manage Soporte','url'=>array('admin')),
);
?>

<h1>Create Soporte</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>