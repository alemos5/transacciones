<?php
$this->breadcrumbs=array(
	'Configuracions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Configuracion','url'=>array('index')),
array('label'=>'Manage Configuracion','url'=>array('admin')),
);
?>

<h1>Create Configuracion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>