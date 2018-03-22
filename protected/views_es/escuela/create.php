<?php
$this->breadcrumbs=array(
	'Escuelas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Escuela','url'=>array('index')),
array('label'=>'Manage Escuela','url'=>array('admin')),
);
?>

<h1>Create Escuela</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>